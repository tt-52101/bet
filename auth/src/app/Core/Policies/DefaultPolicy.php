<?php
namespace App\Core\Policies;

use App\Core\Models\Table;
use Illuminate\Support\Facades\Auth;

class DefaultPolicy {

    protected $table_name = '';

    public function __construct($table_name)
    {
        $this->table_name = $table_name;
    }

    public function canUser($action, $user_field = 0, $enrty_field = 0){
        $user = Auth::user();

        $table = Table::where('name', $this->table_name)->first();

        if (!$table) {
            return false;
        }

        $policies = $table->userPolicies($user);

        foreach($policies as $policy){
            if ($policy[$action] == 1 && $policy['own']){
                return  $user_field == $enrty_field;
            } else if ($policy[$action] == 1) {
                return true;
            }
        }
    }

}
