<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jockey extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name'
    ];

    /**
     * @inherit
     */
    protected $table = "horseracing_jockeys";

    /**
     * @inherit
     */
    protected $autoincrement = false;

    /**
     * Get the comments for the blog post.
     */
    public function horses()
    {
        return $this->hasMany(Horse::class);
    }
}
