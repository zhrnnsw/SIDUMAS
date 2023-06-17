<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

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
        //
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
        //
    }

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

    public function masyarakat()
    {
        $data = User::where('roles','=', 0)->paginate(5);

        return view('pages.admin.masyarakat', [
            'data' => $data
        ]);
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
