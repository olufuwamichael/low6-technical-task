<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'bred',
        'status',
        'cloth_number',
        'jockey',
        'trainer',
        'weight_units',
        'weight_value',
        'weight_text',
        'jockey_id',
        'trainer_id',
    ];

    /**
     * @inherit
     */
    protected $table = "horseracing_horses";

    /**
     * @inherit
     */
    protected $autoincrement = false;

    /**
     * The races the horse is running
     */
    public function races()
    {
        return $this->belongsToMany(Race::class, 'horseracing_horse_race');
    }

    /**
     * The jockey for this horse
     */
    public function jockey()
    {
        return $this->belongsTo(Jockey::class);
    }

    /**
     * The trainer for this horse
     */
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
