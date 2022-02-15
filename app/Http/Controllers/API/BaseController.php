<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($result, $message){
        $response = [
            "succes"=>true,
            "data"=>$result,
            "message"=>$message
        ];

        return response()->json($response,200);
    }
    public function sendError($error,$errorMessages=[]){
        $response =[
            "succes"=>false,
            "message"=>$error
        ];

        if(!empty($errorMessages)){
            $response["data"]=$errorMessages;
        }
        return response()->json($response,404);
    }
}
