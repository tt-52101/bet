<?php 
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Odd extends Model {
    protected $connection = 'mongodb';
    protected $collection = 'odds';
}