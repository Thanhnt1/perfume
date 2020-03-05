<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Dropbox\Client;
use Dropbox\WriteMode;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dasboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.auth.login');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadImagesProduct(Request $request)
    {
        if($request->hasFile('file')) {
            // store file to storage
            // $path = storage_path('app/public/products');

            // if (!file_exists($path)) {
            //     mkdir($path, 0777, true);
            // }

            // $file = $request->file('file');

            // $name = uniqid() . '_' . trim($file->getClientOriginalName());

            // $file->move($path, $name);

            // store file to dropbox
            $file_src = $request->file("file"); //file src
            $is_file_uploaded = Storage::disk('dropbox')->putFile('',$file_src); // if u want create small folder in dropbox, let change '' => 'xxx'
            $name = uniqid() . '_' . trim($file_src->getClientOriginalName());

            return response()->json([
                'name'          => $name,
                'original_name' => $file_src->getClientOriginalName(),
                'hash_name'     => $file_src->hashName()
            ]);
        }
        return response()->json([
            'status' => 404,
            'msg' => "Not Images Available",
            'data' => null
        ], 404);
    }

    public function uploadToDropbox(){
            return View::make('admin.dropbox');
    }

    // public function uploadToDropboxFile(Request $RequestInput){
    //     $file_src=$RequestInput->file("upload_file"); //file src
    //     $is_file_uploaded = Storage::disk('dropbox')->putFile('',$file_src); // if u want create small folder in dropbox, let change '' => 'xxx'
    //     // header("Content-type: image/jpeg");
    //     // echo Storage::disk('dropbox')->get($file_src->hashName());
    //     $image = Storage::disk('dropbox')->get($file_src->hashName());
    //     // $image = str_replace('data:image/png;base64,', '', $image);
    //     // $image = str_replace(' ', '+', $image);
    //     // dd('data:image/jpeg;base64, '.base64_encode($image));
    //     // dd($file_src->getClientOriginalName());
    //     // dd(Storage::allDirectories('App/'));
    //     return view('admin.dropbox', [
    //         'image1' => 'data:image/jpeg;base64, '.base64_encode($image),
    //     ]);
    //     if($is_file_uploaded){
    //         return Redirect::back()->withErrors(['msg'=>'Succesfuly file uploaded to dropbox']);
    //     } else {
    //         return Redirect::back()->withErrors(['msg'=>'file failed to uploaded on dropbox']);
    //     }
    // }
}
