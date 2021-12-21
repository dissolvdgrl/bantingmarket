<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Recipe extends Model
{
    use HasTrixRichText;
    protected $table = 'recipes';

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
