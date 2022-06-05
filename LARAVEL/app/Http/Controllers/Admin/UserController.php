<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  TAMPIL DAFTAR USER
    public function index()
    {
        $users = User::all();

        return view('admin.user.daftar', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  BUKA HALAMAN create
    public function create()
    {
        return view('admin.user.create');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.user.edit', compact('data'));
    }

    public function hapus($id)
    {
        $data = User::find($id);

        $data->delete();
        return redirect()->route('admin.daftar.user')->with('success', 'User Berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);

        $request->validate([
            'email' => 'required',
            'name' => 'required',
        ]);

        $data->update([
            'email' => $request->email,
            'name' => $request->name,
        ]);


        return redirect()->route('admin.daftar.user')->with('success', 'User Berhasil Diupdate');
    }


    // Menyimpan Data dari halaman Create
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
