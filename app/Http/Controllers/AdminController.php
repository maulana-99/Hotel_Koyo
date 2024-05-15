<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        echo "Dashboard admin";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='/logout'> Logout </a>";
    }
    function resepsionis()
    {
        echo "Dashboard resepsionis";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='/logout'> Logout </a>";
    }
    function tamu()
    {
        echo "Dashboard tamu";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='/logout'> Logout </a>";
    }
}
