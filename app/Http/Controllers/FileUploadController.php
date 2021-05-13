<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileUploadController extends Controller
{
    public function createForm(){
        return view('file-upload', compact('records'));
    }

    public function fileUpload(Request $req){
        $req->validate([
            'file' => 'required|mimes:mp3'
        ]);

        $fileModel = new File;

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }

    public function getAudio()
    {
        $records = File::all();
        $image = \Storage::disk('public')->url('/img/car.jpg');

        return view('layouts.landing-page', compact('image', 'records'));
    }
}