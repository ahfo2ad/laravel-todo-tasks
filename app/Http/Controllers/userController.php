<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{

    public function uploadAvatar(Request $request) {

        if($request->hasFile('image')) {

            User::uploadAvatar($request->image);
            // $request->session()->flash('message', 'image uploaded successfully');
            return redirect()->back()->with('message', 'image uploaded successfully');
        }

        // $request->session()->flash('error', 'image not uploaded');
        return redirect()->back()->with('error', 'image not uploaded');
    }

    // protected function deleteOldAvatar() {

    //     if(auth()->user()->avatar) {
    //         Storage::delete('/public/images/' . auth()->user()->avatar);
    //     }
    // }

    public function index()
    {

        // first way of database

                // to insert or create data
        // $user = new User();
        // $user->name         = 'mo';
        // $user->email        = 'mo@hotm.com';
        // $user->password     = 'mofouad';
        // $user->password     = bcrypt('mofouad');          to incrypt password
        // $user->save();

        // $data = [
        //     'name'      => 'osos',
        //     'email'     => 'osos@mio.com',
        //     'password'  => 'osos'
        // ];
        // User::create($data);

                // to select data
        // $user = User::all();
        // return $user;

                // to delete
        // User::where('id', 2)->delete();

                // to update

        // User::where('id', 3)->update(['name'=>'hello']);

        // $user = User::all();
        // return $user;

        /* ===================================================================================
         second way of database */

        // DB::insert('insert into users (id, name, email, password)
        // values (?, ?, ?, ?)',
        // [1, 'ahmed', 'ahmed@gmail.com', 'ahmed']);

        // $user = DB::select('select * from users');
        // return $user;

        // DB::update('update users set name = ? where id = 1',['mohamed']);

        // DB::delete('delete from users where name = ?', ['ahmed']);

        // $user = DB::select('select * from users');
        // return $user;

        return view('home');

    }
}
