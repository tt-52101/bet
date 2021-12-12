<?php 
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Team extends Model {
    protected $connection = 'mongodb';
    protected $collection = 'teams';
}