<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Beranda extends Controller
{
    public function index()
    {
        return view(
            'dashboard',
            [
                'titles' => 'Dashboard',
                'ml' => Member::class::ml(),
                'pubgm' => Member::class::pubgm(),
                'dota2' => Member::class::dota2(),
                'valo' => Member::class::valo(),
                'user' => Auth::user(),
            ],
        );
    }
}
