<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Auth;

class ModelImage extends Model
{

    public function loadImage($request)
    {
        $user = Auth::user();
        $user_id = $user->id;

        if($request->file('img')){

            $name_img = time().'-0.jpg';

            $file = $request->file('img');
            $file->move(public_path() . '/path',$name_img);

            DB::table('images')->insert(['name_image' => $name_img,
                'user_id' => $user_id,
            ]);
        }
    }

    public function getImagesUser($user_id){
        $images = DB::table('images')->where('user_id', $user_id)->get();
        return $images;
    }

}
