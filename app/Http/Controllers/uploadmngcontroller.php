<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class uploadmngcontroller extends Controller
{
    function upload(){
        return view("upload");
    }

    function uploadpost(Request $request){
        $file =$request->file("file");

        echo 'file name:'.$file->getclientoriginalname();
        echo'<br>';

        $destinationpath="uploads";

        if($file->move($destinationpath, $file->getclientoriginalname())){
             echo"File upload success";
            }
            else{
                echo "Failed to Upload";
            }
    }

}

