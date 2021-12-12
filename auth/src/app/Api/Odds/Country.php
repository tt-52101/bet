<?php 
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Country extends Model {
    protected $connection = 'mongodb';
    protected $collection = 'countries';
}