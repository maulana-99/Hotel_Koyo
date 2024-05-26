<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravolt\Avatar\Facade as Avatar;

class DashboardController extends Controller
{
    public function index()
    {
        if ($user = auth()->user()) {
            $avatar = Avatar::create($user->name)->toBase64();

            return view('dashboard_guest', compact('user', 'avatar'));
        }

        return view('dashboard_guest');
    }
}
