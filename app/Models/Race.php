<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'date',
        'time',
        'runners',
        'horses',
        'handicap',
        'showcase',
        'trifecta',
        'stewards',
        'status',
        'revision',
        'meeting_id'
    ];

    /**
     * @inherit
     */
    protected $table = "horseracing_races";

    /**
     * @inherit
     */
    protected $autoincrement = false;

    /**
     * Get the post that owns the comment.
     */
    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }

    /**
     * The horses in the race
     */
    public function horses()
    {
        return $this->belongsToMany(Horse::class, 'horseracing_horse_race');
    }

    public function setHandicapAttribute($value)
    {
        $this->attributes['handicap'] = (\strtolower($value) == 'yes');
    }

    public function setShowcaseAttribute($value)
    {
        $this->attributes['showcase'] = (\strtolower($value) == 'yes');
    }

    public function setTrifectaAttribute($value)
    {
        $this->attributes['trifecta'] = (\strtolower($value) == 'yes');
    }
}
