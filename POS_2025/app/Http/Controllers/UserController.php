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
        // $user = UserModel::where('level_id','2')-> count();
        // dd($user);

        // $user = UserModel::firstOrNew(
        //     [
        //         'username'=>'manager333',
        //         'nama'=>'Manager Tiga Tiga Tiga',
        //         'password'=>Hash::make('12345'),
        //         'level_id'=>2
        //     ],
        // );
        // $user->save();

        // $user = UserModel::create(
        //     [
        //         'username' => 'manager55',
        //         'nama' => 'Manager55',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // $user->username = 'Manager57';


        // $user->isDirty();//true
        // $user->isDirty('username');//true
        // $user->isDirty('nama');//false
        // $user->isDirty(['nama', 'username']);//true

        // $user->isClean();//false
        // $user->isClean('username');//tfalse
        // $user->isClean('nama');//true
        // $user->isClean(['nama', 'username']);//false

        // $user = UserModel::create(
        //     [
        //         'username' => 'manager11',
        //         'nama' => 'Manager11',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // $user->username = 'Manager12';

        // $user->save();

        // $user->wasChanged();//true
        // $user->wasChanged('username');//true
        // $user->wasChanged('nama');//false
        // $user->wasChanged(['nama', 'username']);//false
        // dd($user->wasChanged());

        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        $user = UserModel::with('level')->get();
        return view ('user',['data'=>$user]);
    }

    public function tambah()
    {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        UserModel::create(
            [
                'username' => $request->username,
                'nama' => $request->nama,
                'password' => Hash::make('$request->password'),
                'level_id' => $request->level_id
            ]
        );
        return redirect('/user');
    }
    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }
    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->password');
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }

    public function hapus($id) {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }

}
