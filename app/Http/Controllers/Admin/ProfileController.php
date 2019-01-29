<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

class ProfileController extends Controller
{
    public function add()
    {
       return view('admin.profile.create');
    }

    public function create(Request $request)
    {
      //Varidationを行う
      $this->validate($request, Profile::$rules);

      $profiles = new Profile;
      $form = $request->all();

      //データベースに保存する
      $profiles->fill($form);
      $profiles->save();

      // admin/profile/editにリダイレクトする
      return redirect('admin/profile/create');
    }
}
