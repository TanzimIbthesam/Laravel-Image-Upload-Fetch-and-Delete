<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\ImageUpload;
use Storage;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;

class ImageUploadController extends Controller
{
    //
    public function index(){

        $images=ImageUpload::all();
        // return view('imageupload.index',compact('images'));
        return view('imageupload.index')->with('images',$images);

    }
    public function uploadimage(Request $request){
        $data=request()->validate([
            'name'=>'required|min:5',
            'upload_image'=>'image|required|max:2000',
            // 'upload_image'=>'required|max:2000|mimes:doc,docx,pdf',
        ]);
        // $image= new ImageUpload;
        // $image->name=$request->name;
        // $image->upload_image=$request->upload_image;
        $image= new ImageUpload;
        // dd($image);
        $image->name=$request->input('name');
        if($request->hasFile('upload_image')){
         $imagename=$request->file('upload_image');

         $file_name=time().'.'.$imagename->getClientOriginalExtension();
        //   dd($file_name);
        $location=public_path('public2/'. $file_name);
        // dd($location);

        Image::make($imagename)->resize(300,150)->save($location);




        $image->upload_image=$file_name;





        }
        $image->save();
        return back();

        // }else{
        //     return $request;
        // }

        //  $image->save();


    //    return view('imageupload.index')->with('image',$image);
    // return back();


    }
    public function editimage($id){
        $imageuploads=ImageUpload::find($id);
        return view('imageedit.index')->with('imageuploads',$imageuploads);
    }

    public function updateimage(Request $request, $id){
        // $uploadimage= ImageUpload::find($id);
        // $uploadimage->name=$request->input('name');
        // $uploadimage->upload_image=$request->file('upload_image');

        $image= ImageUpload::find($id);
        // dd($image);
        $image->name=$request->input('name');
        if($request->hasFile('upload_image')){
         $imagename=$request->file('upload_image');

         $file_name=time().'.'.$imagename->getClientOriginalExtension();
        //  dd($file_name);
        $location=public_path('public2/'. $file_name);
        // dd($location);
        Image::make($imagename)->resize(300,150)->save($location);
        //    $oldfilename=$image->upload_image;

           $image->upload_image=$file_name;









        }
        $image->save();
        return redirect('/imageupload');
    //     if($request->hasFile('upload_image')){
    //         $image=$request->file('upload_image');
    //         $file_name=time().'.'.$image->getClientOriginalExtension();
    //        //  dd($file_name);
    //        Image::make($image)->resize(300,150)->save(public_path('public2/'.$file_name) );
    //        $uploadimage= ImageUpload::find($id);

    //     $uploadimage->upload_image=$request->input('upload_image');
    //     $uploadimage->name=$request->input('name');

    // $uploadimage->save();

    return back();

    // return redirect('/imageupload')->with('uploadimage',$uploadimage);

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

