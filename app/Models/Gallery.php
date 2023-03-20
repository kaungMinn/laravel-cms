<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['image'];

    public $uploads = '/images/posts/';

    protected function image() :Attribute
    {
        return Attribute::make(
            get: fn($image) => $this->uploads . $image
        );
    }
}


