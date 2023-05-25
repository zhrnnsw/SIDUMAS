<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Pengaduan;

// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;


class AdminController extends Controller
{
    public function __invoke()
    {

    }

    public function index($id) {

        $item = Pengaduan::with([
            'details', 'user'
        ])->findOrFail($id);

        return view('pages.admin.pengaduan.detail',[
        'item' => $item
        ]);
    }

    
}
