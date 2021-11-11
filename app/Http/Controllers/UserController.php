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
        return redirect('/blog');
    }


    public function destroy()

    {
        Auth::logout();

        return redirect('/');
    }

    public function showDashboard()
    {

        if (auth()->user()->is_admin) {
            return view('dashboard.index');
        }

        return redirect('/blog')->with('error', 'You do not have the required permission to access this resource');
    }

    public function getPosts(Request $request)
    {
        //fetch all blog posts from DB
        if ($request->ajax()) {
            $posts = Blog::where('user_id', Auth::id())->all();
            return Datatables::of($posts)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>
                    <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
