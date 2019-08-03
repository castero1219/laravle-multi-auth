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
        $user->fill($request->all())->save();

        return redirect('user/edit')->with("success","ユーザーのプロフィール更新が完了しました。");
    }

}
