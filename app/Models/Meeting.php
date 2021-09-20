<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'country',
        'status',
        'date',
        'course',
        'races',
        'revision'
    ];

    /**
     * @inherit
     */
    protected $table = "horseracing_meetings";

    /**
     * @inherit
     */
    protected $autoincrement = false;

    /**
     * Get the races for the meeting.
     */
    public function races()
    {
        return $this->hasMany(Race::class);
    }
}
