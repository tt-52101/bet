<?php 
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class OddMapping extends Model {
    protected $connection = 'mongodb';
    protected $collection = 'odds_mapping';

}