<?php

namespace App\Graphql\Mutations;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use \Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\{Meeting, Race, Jockey, Trainer, Horse};

class ImportXmlData
{
    /**
     * @var Request
     */
    private $request;

    private $faker;

    protected $attributes = [
        'name' => 'importXmlData',
    ];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function resolve($root, $args)
    {
        // Instantiate the horse id array
        $horseIds = [];

        // Get data from xml
        $data = $this->xmlToArray(($args['file'])->get());

        // dd($data);

        // Create or Update the Meeting model by mapping attributes from xml: Creates if ID exists, updates if it doesn't
        $meeting = Meeting::updateOrCreate(
            ['id' => $data['Meeting']['@attributes']['id']], 
            $data['Meeting']['@attributes']
        );

        // Create or Update the Race model; attach it to the meeting model
        $race = Race::updateOrCreate(
            ['id' => $data['Meeting']['Race']['@attributes']['id']], 
            array_merge(
                $data['Meeting']['Race']['@attributes'],
                ['meeting_id' => $meeting->id ]
            )
        );

        // Create or Update the Horses models and attach to relevant models
        foreach ($data['Meeting']['Race']['Horse'] as $key => $horseData) {
            $jockey = Jockey::updateOrCreate(
                ['id' => $horseData['Jockey']['@attributes']['id']], 
                $horseData['Jockey']['@attributes']
            );
            $trainer = Trainer::updateOrCreate(
                ['id' => $horseData['Trainer']['@attributes']['id']], 
                $horseData['Trainer']['@attributes']);
            $horse = Horse::updateOrCreate(
                ['id' => $horseData['@attributes']['id']], 
                array_merge(
                    $horseData['@attributes'], 
                    [
                        'jockey_id' => $jockey->id,
                        'trainer_id' => $trainer->id,
                        'cloth_number' => $horseData['Cloth']['@attributes']['number'],
                        'weight_units' => $horseData['Weight']['@attributes']['units'],
                        'weight_value' => $horseData['Weight']['@attributes']['value'],
                        'weight_text' => $horseData['Weight']['@attributes']['text'],
                    ])
            );
            array_push($horseIds, $horse->id);
        }

        $race->horses()->attach($horseIds);
        $race->save();
    }

    /**
     * @var string
     * 
     * @return array
     */
    public function xmlToArray($xmlstring): array
    {
        $xml = \simplexml_load_string($xmlstring, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
      
        return $array;
    }
}

