<?php

namespace App\Core\Controllers;

use App\Http\Controllers\Controller;

class ApiController extends Controller {

    protected $status_code = 200;

    public function getStatusCode(){
        return $this->status_code;
    }

    public function setStatusCode($statusCode)
    {
        $this->status_code = $statusCode;
        return $this;
    }

    public function respond($data = [], $headers = []){
        return response($data, $this->getStatusCode(), $headers);
    }

    public function respondForbidden($message = "Action Forbidden!"){
        return $this->setStatusCode(403)->respond([
            'status' => 'Forbidden',
            'message' => $message,
            'errors' => [
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }
}
