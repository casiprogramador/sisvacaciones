<?php

namespace App\Http\Controllers;

use App\Worker;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    public function __construct()
    {

    }

    public function state(Request $request){
        $worker = Worker::find($request['id']);
        $worker->state = 0;
        $worker->save();
        return response()->json(['response' => 'updated']);
    }
}
