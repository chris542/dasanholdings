<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
   protected $fillable = [ 'title', 'description', 'bgImg' ]; 

    public static function uploadFile($reqFile, $url){
        $tempFile = $reqFile;
        $filename= $tempFile->getClientOriginalName();
        $ext = $tempFile->guessClientExtension();
        $tempFile->storeAs($url, "$filename");
        return $filename;
    }

}
