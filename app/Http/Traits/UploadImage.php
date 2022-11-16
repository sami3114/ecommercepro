<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait UploadImage
{
    public function upload(Request $request,$fieldname='image',$directory='images')
    {
        if( $request->hasFile( $fieldname ) ) {

            if (!$request->file($fieldname)->isValid()) {

                flash('Invalid Image!')->error()->important();

                return redirect()->back()->withInput();

            }
            $filePath = $request->file($fieldname)->store($directory, 'public');
            return $filePath;
        }
    }

}
