<?php 
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Bookmakers extends Model {
    protected $connection = 'mongodb';
    protected $collection = 'bookmakers';
    protected $primaryKey = 'id';

}