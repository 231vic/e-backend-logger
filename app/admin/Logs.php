<?php
namespace App\admin;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Logs extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'logs';
    
    protected $fillable = [
        'application_id', 'type','priority','path','message','request','response','created_at','updated_at','status'
    ];

    public function getAll()
    {
        return Logs::all();
    }

    public function addLogs($request)
    {
        $logs = new Logs;
        $logs->application_id = $request->input('application_id')!="" ? $request->input('application_id') : "";
      	$logs->type = $request->input('type')!="" ? $request->input('type') : "";
      	$logs->priority = $request->input('priority')!="" ? $request->input('priority') : "";
      	$logs->path = $request->input('path')!="" ? $request->input('path') : "";
      	$logs->message = $request->input('message')!="" ? $request->input('message') : "";
      	$logs->request = $request->input('request')!="" ? $request->input('request') : "";
      	$logs->response = $request->input('response')!="" ? $request->input('response') : "";
      	$logs->created_at = date('Y-m-d H:i:s');
      	$logs->status = 1;
        $logs->save();
        return $logs;
    }

    public function deleteLog($request)
    {
        $log = Logs::find($request->id);
        $log->delete();
        return $log;
    }
    public function updateLog($request)
    {
        $log = Logs::find($request->id);
        if(count($log)){
            $log->application_id = $request->input('application_id')!="" ? $request->input('application_id') : "";
            $log->type = $request->input('type')!="" ? $request->input('type') : "";
            $log->priority = $request->input('priority')!="" ? $request->input('priority') : "";
            $log->path = $request->input('path')!="" ? $request->input('path') : "";
            $log->message = $request->input('message')!="" ? $request->input('message') : "";
            $log->request = $request->input('request')!="" ? $request->input('request') : "";
            $log->response = $request->input('response')!="" ? $request->input('response') : "";
            $log->updated_at = date('Y-m-d H:i:s');
            $log->status = $request->input('status')!="" ? $request->input('status') : "";
            $log->save();
            return $log;
        }else{
            return false;
        }
    }
}
