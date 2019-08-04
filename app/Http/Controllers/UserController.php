<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    //

    public function edit(){

        $user = User::find(Auth::id());

        return view('user.edit', ['user'=>$user]);
    }

    public function update(Request $request){

        $user = User::find(Auth::id());

        //画像名と拡張子を取得
        //調べたい人はvar_dump($request->file('profile_image'))するとよいです
        $file_name = $request->file('profile_image')->getClientOriginalName();
        $file_type = null;
        if($file_type["type"] == "image/png"){
            $file_type = ".png";
        }elseif($file_type["type"] == "image/jpng"){
            $file_type = ".jpg";
        }

        //画像を保存
        $filePath = $request->file("profile_image")->storeAs('public/uploaded_image', $file_name . $file_type);
        $user->profile_image = str_replace('public/', '', $filePath);

        //画像以外を保存
        $user->fill($request->except("profile_image"))->save();

        return redirect('user/edit')->with("success","ユーザーのプロフィール更新が完了しました。");
    }

}
