<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.home',[
            'pengaduan' => Pengaduan::all()->count(),
            'user' => User::where('roles','=', 0)->count(),
            'admin' => User::where('roles', '=', 1)->count(),
            'pending' => Pengaduan::where('status', 'Belum di Proses')->count(),
            'process' => Pengaduan::where('status', 'Sedang di Proses')->count(),
            'success' => Pengaduan::where('status', 'Selesai')->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
    public function edit($id)
    {
        $user = User::find($id);
        return view(('pages.admin.editUser'),['user' => $user],compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        DB::table('users')->where('id', $id)->update([
            'roles'=> $request->roles,
        ]);
        Alert::success('Berhasil', 'Pengaduan berhasil ditanggapi');
        return view('pages.admin.editUser',['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Alert::success('Berhasil', 'Pengaduan telah di hapus');
        return redirect('admin/masyarakat');
    }

    public function masyarakat()
    {
        $data = User::where('roles','=', 0)->paginate(5);

        return view('pages.admin.masyarakat', ['data' => $data]);
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = User::where('username', 'like', "%" . $keyword . "%")->paginate(5);
        return view('pages.admin.masyarakat', ['data' => $data])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function laporan() {

        $pengaduan = Pengaduan::all();

        return view('pages.admin.laporan',[
            'pengaduan' => $pengaduan
        ]);
    }

    public function cetak_laporan() {

        $pengaduan = Pengaduan::all();

        $pdf = PDF::loadview('pages.admin.pdf_laporan',['pengaduan' => $pengaduan]);
        return ($pdf->download('laporan.pdf'));
        
    }
}
