<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Http\Requests\StorePengaduanRequest;
use App\Http\Requests\UpdatePengaduanRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Pengaduan::all();//->where('status','!=','Belum di Proses');
       
        return view('pages.admin.pengaduan',['pengaduan' => $pengaduan,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePengaduanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengaduanRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);
        $user = User::find($pengaduan->user_id);
        return view('pages.admin.detail',[
            'pengaduan' => $pengaduan,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::find($id);
        $user = User::find($pengaduan->user_id);
        return view(('pages.admin.edit'),['pengaduan'=>$pengaduan,'user' => $user],compact('pengaduan','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengaduanRequest  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::all();
        DB::table('pengaduan')->where('id', $id)->update([
            'status'=> $request->status,
            'bidang_id' => $request->bidang_id
        ]);
        $pengaduans = Pengaduan::where('id',$id)->first();
        /*$pengaduan -> id = $request->get('id');
        $pengaduan -> description = $request->get('description');
        $pengaduan -> image = $request->get('image');
        $pengaduan -> status = $request->get('status');
        $pengaduan -> user_id = $request->get('user_id');
        $pengaduan -> tingkatan_id = $request->get('tingkatan_id');*/
        $pengaduans -> status = $request->get('status');
        $pengaduans -> bidang_id = $request->get('bidang_id');
        $pengaduans -> save();
        Alert::success('Berhasil', 'Pengaduan berhasil ditanggapi');
        return view('pages.admin.pengaduan',['pengaduan' => $pengaduan,]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->delete();

        Alert::success('Berhasil', 'Pengaduan telah di hapus');
        return redirect('admin/pengaduan');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $pengaduan = Pengaduan::where('id', 'like', "%" . $keyword . "%")->paginate(5);
        return view('pages.admin.pengaduan', ['pengaduan' => $pengaduan])->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Summary of cetak_pengaduan
     * @param mixed $id
     * @return \Illuminate\Http\Response
     */
    public function cetak_pengaduan($id) {

        $pengaduan = Pengaduan::find($id);

        $pdf = PDF::loadview('pages.admin.pdf_pengaduan', compact('pengaduan'))->setPaper('a4');
        return $pdf->download('pengaduan.pdf');
    }
}
