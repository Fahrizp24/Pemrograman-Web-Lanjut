<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // tambah data user dengan Eloquent Model
        // $data = [
        //     'username' => 'customer-3',
        //     'nama' => 'pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        // UserModel::insert($data); // tambahkan data ke tabel m_user

        // $data=[
        //     'level_id'=> 2,
        //     'username'=>'manager_lima',
        //     'nama'=>'manager 5',
        //     'password'=>Hash::make('12345')
        // ];
        // UserModel::create($data);

        // $user = UserModel::findOr(20,['username','nama'],function(){
        //     abort(404);
        // }); 

        // $user = UserModel::findOrFail(100);
        // $user = UserModel::where('username','manager9')-> firstOrFail();
        $user = UserModel::where('level_id','2')-> count();
        // dd($user);
        return view('user', ['data' => $user]);
    }
}
