<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cv;

use App\Http\Requests;

class CvpageController extends Controller
{
    public function indexTitul(){
        $cv=Cv::find(1);
        return view("welcomeCV",["cv"=>$cv]);
    }

    public function indexInfo(){
        $cv=Cv::find(1);
        return view("info",["cv"=>$cv]);
    }
}
