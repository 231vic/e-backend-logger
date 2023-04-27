<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\Rekognition\RekognitionClient;
use Auth;
use DB;

class HomeController extends Controller
{
  public function __construct() {

    $this->middleware('auth');
  } 
}
