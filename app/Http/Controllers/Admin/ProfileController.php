<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;
use App\ProfileHistory;
use Carbon\Carbon;

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

      $profile = new Profile;
      $form = $request->all();

      unset($form['token']);
      //データベースに保存する
      $profile->fill($form);
      $profile->save();

      // admin/profile/createにリダイレクトする
      return redirect('admin/profile/create');
    }

    public function edit(Request $request)
    {
      //Profile Modelからデータを取得する
      $profile = Profile::orderBy('created_at', 'desc')->first();

      $profilehistory = ProfileHistory::all();

      return view('admin.profile.edit', ['profile_form' => $profile, 'profilehistory' => $profilehistory]);
    }

    public function update(Request $request)
    {
      //Validationをかける
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      //送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      unset($profile_form['_token']);

      //該当するデータを上書きして保存する
      $profile->fill($profile_form)->save();

      $Profilehistory = new ProfileHistory;
      $Profilehistory->profile_id = $profile->id;
      $Profilehistory->edited_at = Carbon::now();
      $Profilehistory->save();

      return redirect('admin/profile/edit');
    }
}
