<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name', 'slug',];

    /**
     * Get all of the post for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function post(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}