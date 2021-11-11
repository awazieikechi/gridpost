<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use DataTables;



class BlogController extends Controller
{
    //

    public function showPosts()
    {
        // dd('working');

        return view('user.blog');
    }

    public function getPosts(Request $request)
    {
        //fetch all blog posts from DB
        if ($request->ajax()) {
            $posts = Blog::where('user_id', Auth::id())->get();
            return Datatables::of($posts)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="./post/edit/' . $row->id . '" class="edit btn btn-success btn-sm">Edit</a>
                    <form action="./post/delete" method="POST">
                    ' . csrf_field() . '
                    <input type="hidden" value="' . $row->id . '" name="id">
                   
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')"
                        >Delete</a>
                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {

        return view('user.createpost');
    }


    public function createPost(Request $request)
    {
        /** Create a Post */
        // dd($request->image);
        $this->validatePost($request);
        $this->store($request);
        return redirect('/blog')->with('success', 'Blog Post Successfully Created!');
    }

    public function edit(Request $request)
    {
        /** Edit a Post */

        $blog = Blog::find($request->id);

        return view('user.edit', compact('blog'));
    }

    public function delete(Request $request)
    {

        Blog::find($request->id)->delete();
        return redirect('/blog')->with('success', 'Blog Post has been deleted ');
    }

    public function update(Request $request)
    {

        /**Update a Post */
        $this->validatePost($request);

        $this->store($request);

        return redirect('/blog')->with('success', 'Blog Post has been Successfully Updated!');
    }

    private function validatePost(Request $request)
    {

        //validate a post

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['string', 'max:255',],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg,'],
            'description' => ['string', 'max:255'],

        ]);

        if ($validator->fails()) {

            return redirect('/createblog')
                ->withErrors($validator);
        }
    }

    private function store(Request $request)
    {

        //store a new post or update Post
        $image =   $this->uploadBlogImage($request);


        return Blog::updateorCreate(
            [
                'id' => $request->id ?? $request->input('id'),

            ],

            [

                'title' => $request->title,
                'image' => $image,
                'category' => $request->category,
                'description' => $request->description,
                'user_id' => Auth::id()
            ]
        );
    }

    private function uploadBlogImage(Request $request)
    {
        // Upload Blog Image

        if ($request->hasFile('image')) {

            $photo =  $request->file('image');
            $imagename = $request->title . '-image' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/uploads', $imagename);
            return $imagename;
        }
        $blogImage = Blog::find($request->id);
        if ($blogImage == null) {
            return null;
        }
        $imagename =  $blogImage->image;
        return $imagename ?? null;
    }
}
