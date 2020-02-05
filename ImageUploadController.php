<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\ImageUpload;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;

class ImageUploadController extends Controller
{
    //
    public function index(){
        $imageuploads=ImageUpload::all();
        return view('imageupload.index',compact('imageuploads'));
    }
    public function uploadimage(Request $request){
        $uploadimage= new ImageUpload();
        $uploadimage->upload_image=$request->input('upload_image');
        $uploadimage->name=$request->input('name');
        // $uploadimage->updated_at=$request->input('updated_at');


        // Image::make(request()->file('upload_image'))->resize(100, 60)->save('public2');
        // ImageUpload::insert([
        //     'created_at'=>$request->created_at,
        //     'updated_at'=>$request->updated_at,
        // ]);
        if($request->hasFile('upload_image')){
            $file=$request->file('upload_image');

             $extension=$file->getClientOriginalExtension();


            $filename=time().'.'.$extension;
            //  dd($filename);
            // $file->move('public2',$filename);
            // dd(public_path('public2/new/'));
            Image::make($file)->resize(300,150)->save(public_path('public2/'.$filename) );
            // Image::make(request()->file('upload_image'))->resize(100, 60)->save('public2');

          $uploadimage->upload_image=$filename;


        }else{
           return $request;
           $uploadimage->upload_image='';
        }
    //     dd($uploadimage);
    //    dd($uploadimage->save());
    $uploadimage->save();

    //    return view('imageupload.index')->with('uploadimage',$uploadimage);
    return back();


    }
    public function editimage($id){
        $imageuploads=ImageUpload::find($id);
        return view('imageedit.index')->with('image',$imageuploads);
    }

    public function updateimage(Request $request, $id){
        $uploadimage= ImageUpload::find($id);

        $uploadimage->upload_image=$request->input('upload_image');
        $uploadimage->name=$request->input('name');

        if($request->hasFile('upload_image')){
            $file=$request->file('upload_image');

             $extension=$file->getClientOriginalExtension();


            $filename=time().'.'.$extension;

            Image::make($file)->resize(300,150)->save(public_path('public2/'.$filename) );

          $uploadimage->upload_image=$filename;


        }

    $uploadimage->save();

    return redirect('/imageupload')->with('uploadimage',$uploadimage);




    }
     public function deleteimage($id){
        ImageUpload::find($id)->delete();
        return redirect('/imageupload');

    }
    public function deleteallimage($id){
        ImageUpload::truncate();
        return redirect('/imageupload');
    }
}
}
