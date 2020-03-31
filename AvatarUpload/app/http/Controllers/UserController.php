<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
  public function avartarupload(Request $request){
      if($request->hasFile('image')){
          $filename=$request->image->getClientOriginalName();
        $this->deleteOldImage();
          $request->image->storeAs('images',$filename,'public');
    //    User::find('1')->update(['avatar'=>$filename]);
        auth()->user()->update (['avatar'=>$filename]);
      }
      return redirect()->back();

  }
  public function deleteOldImage(){
    if(auth()->user()->avatar){
        //   dd('/public/images/'.auth()->user()->avatar);
          Storage::delete('/public/images/'.auth()->user()->avatar);
      }
  }
}
