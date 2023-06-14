<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tingkatan;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tingkatan = Tingkatan::all();
        return view('pages.user.home',['tingkatan'=> $tingkatan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tingkatan = Tingkatan::all();
        return view('pages.user.home',['tingkatan'=> $tingkatan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'image' => 'required',
            'tingkatan_id' => 'required'
            ]);
    
            $id = Auth::user()->id;
            
    
            /*$data = $request->all();
            $data['user_id']=$id;
            $data['image'] = $request->file('image')->store('assets/laporan', 'public');
            $data['tingkatan_id'] = $request->get('tingkatan_id');
    
            Pengaduan::create($data);*/

            $data = new Pengaduan();
            $data -> user_id = $id;
            $data -> description = $request->get('description');
            $data -> image = $request->file('image')->store('assets/laporan', 'public');
            $data -> tingkatan_id = $request->get('tingkatan_id');
            $data->save();
            alert()->success('Berhasil', 'Pengaduan terkirim');

            return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);
        $user_id = $pengaduan->user_id;
        $user = User::find($user_id);
        return view('pages.user.pengaduan',['pengaduan' => $pengaduan,'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        //
    }

    public function lihat()
    {
        $pengaduan = Pengaduan::all();
        return view('pages.user.pengaduanAll',['pengaduan' => $pengaduan]);
    }

}
