<?php


namespace App\Http\Services\Upload;


class UploadFile 
{
    public function upload($file, string $address)
    {
        // upload file :)
        return time().$file->getClientOriginalName();
    }
}

