<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Posting extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'postings';

    protected $fillable = 
    [   
        'title',
        'content',
        'slug',
        'meta_description',
        'post_by',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
