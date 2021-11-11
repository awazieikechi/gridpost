<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DataTables;


class UserController extends Controller
{

    public function index()

    {

        if (!Auth::check()) {
            return redirect('/login');
        }
        return view('user.blog');
    }


    public function destroy()

    {
        Auth::logout();

        return redirect('/login');
    }
}
