<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Article extends Model
{
    protected $collection = 'articles';
    public $timestamps = false;

}
