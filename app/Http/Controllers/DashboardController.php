<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Avatar\Facade as Avatar;

class DashboardController extends Controller
{
    function index(){
        return view('dashboard_guest');
    }

    public function show()
    {
        $user = auth()->user();
        $avatar = Avatar::create($user->name)->toBase64();

        return view('dashboard_guest', compact('user', 'avatar'));
    }
}
