<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendors';

    protected $statuses = array(
        '1' => 'active',
        '0' => 'inactive'
    );

    public function getStatusAttribute($value)
    {
        return $this->statuses[$value];
    }
}
