<?php
namespace App\Http\Controllers;

use App\Models\Literature;
use App\Models\User;
use Illuminate\Http\Request;

class LiteratureController extends Controller
{
    public function index()
    {
        // Mengambil literatur dengan relasi type dan category
        $literatures = Literature::with(['type', 'category'])->get();

        return view('literatures.index', compact('literatures'));
    }

    // Tambah dan fungsi lain bisa ditambahkan di sini
}
