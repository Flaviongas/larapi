<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Books extends Model
{
    protected $connection = 'mongodb';
}
