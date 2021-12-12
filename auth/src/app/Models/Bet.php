<?php 
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model;

class Bet extends Model {
    protected $connection = 'mongodb';
    protected $collection = 'bets';
    protected $primaryKey = 'id';

}