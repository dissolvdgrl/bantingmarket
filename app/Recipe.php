<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
