<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.inform.profile.index', [
            'title' => 'Profile',
            'heading' => 'Data Profile',
            'collection' => Profile::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => $errors[0],
                'icon' => 'error'
            ]);
        }

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ];

        Profile::create($data);

        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'Profile Added Successfully!',
            'icon' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $cat = Profile::where('slug', $slug)->first();
        if ($cat) {
            return response()->json([
                'status' => 'true',
                'data' => $cat
            ]);
        } else {
            return response()->json([
                'status' => 'false'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => $errors[0],
                'icon' => 'error'
            ]);
        }
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ];

        Profile::find($id)->update($data);
        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'Profile Edited!',
            'icon' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $cat = Profile::where('slug', $slug)->first();
        if ($cat) {
            $cat->delete();

            return response()->json([
                'status' => 'true',
                'title' => 'Success',
                'description' => 'Profile Deleted!',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => 'Profile Not Found',
                'icon' => 'error',
            ]);
        }
    }
}
