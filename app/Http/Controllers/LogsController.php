<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Logs;
use DB;
use Illuminate\Support\Facades\Input;
use Session;
use Auth;

class LogsController extends Controller
{
    
    protected $connection = 'mongodb' ;
    protected $collection = 'log';

    public function index(Request $request)
    {
    //    // pagination per page
       $logs = new \App\admin\Logs;
       $data = $logs->getAll();
       return response()->json($data, 200);
    }

    public function create(Request $request)
    {
        // 'application_id', 'type','priority','path','message','request','response','created_at','updated_at','status'
        $validate = $this->validate($request, [
            'application_id' => 'required|numeric',
            'type' => 'required|in:"error", "info", "warning"',
            'priority' => 'required|in:"lowest", "low", "medium", "high", "highest"',
            'path' => 'required|string|min:3|max:250',
            'message' => 'required|string|min:3|max:250',
            'request' => 'required|string|min:3|max:100',
            'response' => 'required|string|min:3|max:500'
        ]);
        if($validate){
            $logs = new \App\admin\Logs;
            $data = $logs->addLogs($request);
            return response()->json($data, 200);
        }
    }

    public function delete(Request $request)
    {
        $validate = $this->validate($request,[
            'id' => 'required|string'
        ]);
        if($validate){
            $logs = new \App\admin\Logs;
            $data = $logs->deleteLog($request);
            return response()->json(['msj'=>'Log eliminado','id'=>$request->id], 200);
        }
    }

    public function update(Request $request)
    {
        $validate = $this->validate($request, [
            'id'=> 'required|string',
            'application_id' => 'required|numeric',
            'type' => 'required|in:"error", "info", "warning"',
            'priority' => 'required|in:"lowest", "low", "medium", "high", "highest"',
            'path' => 'required|string|min:3|max:250',
            'message' => 'required|string|min:3|max:250',
            'request' => 'required|string|min:3|max:100',
            'response' => 'required|string|min:3|max:500'
        ]);
        if($validate){
            $logs = new \App\admin\Logs;
            $data = $logs->updateLog($request);
            if($data){
                return response()->json($data, 200);
            }else{
                return response()->json(["message"=>"Producto no encontrado"],404);
            }
        }
    }

}
