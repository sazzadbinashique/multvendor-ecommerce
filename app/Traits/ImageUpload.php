<?php

namespace App\Traits;

/*use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;*/
use Illuminate\Http\Request;

trait imageTrait {


    public function userImageUpload($query){

        $image_name = str_random(20);
        $ext = strtolower($query->getClientOriginalExtension());
//        $ext =  time() . $image_name->getClientOriginalName();
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'uploads/users';
        $image_url = $upload_path.$image_full_name;
        $success = $query->move($upload_path,$image_full_name);

        return $image_url;

    }
}
