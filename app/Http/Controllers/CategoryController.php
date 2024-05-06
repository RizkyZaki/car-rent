<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.master.category.index', [
            'title' => 'Category',
            'heading' => 'Data Category',
            'collection' => Category::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|image',
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
        $eks =  $request->image->getClientOriginalExtension();
        $hashImg = md5($request->image)  . '.' . $eks;
        $request->image->storeAs('assets/image', $hashImg);
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $hashImg,
        ];

        Category::create($data);

        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'Category Added Successfully!',
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
        $cat = Category::where('slug', $slug)->first();
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
        $cr = Category::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
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
        ];
        if ($request->image) {
            Storage::delete('assets/image/' . $cr->image);
            $hashImg = md5($request->image);
            $eks =  $request->image->getClientOriginalExtension();
            $request->image->storeAs('assets/image', $hashImg . '.' . $eks);
            $data['image'] = $hashImg . '.' . $eks;
        }


        $cr->update($data);
        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'Category Edited!',
            'icon' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $cat = Category::where('slug', $slug)->first();
        if ($cat) {
            if ($cat->image) {
                Storage::delete('assets/image/' . $cat->image);
            }
            $cat->delete();

            return response()->json([
                'status' => 'true',
                'title' => 'Success',
                'description' => 'Category Deleted!',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => 'Category Not Found',
                'icon' => 'error',
            ]);
        }
    }
}
