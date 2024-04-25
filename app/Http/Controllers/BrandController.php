<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.inform.brand.index', [
            'title' => 'Brand',
            'heading' => 'Data Brand',
            'collection' => Brand::latest()->get(),
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

        $hashImg = md5($request->image);
        $eks =  $request->image->getClientOriginalExtension();
        $request->image->storeAs('assets/image', $hashImg . '.' . $eks);

        $data = [
            'name' => $request->name,
            'image' => $hashImg,
        ];

        Brand::create($data);

        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'Brand Added Successfully!',
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
    public function edit(string $id)
    {
        $cat = Brand::where('id', $id)->first();
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
        $br = Brand::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        $data = [
            'name' => $request->name,
        ];
        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => $errors[0],
                'icon' => 'error'
            ]);
        }
        if ($request->image) {
            Storage::delete('assets/image/' . $br->image);
            $hashImg = md5($request->image);
            $eks =  $request->image->getClientOriginalExtension();
            $request->image->storeAs('assets/image', $hashImg . '.' . $eks);
        }
        $br->update($data);
        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'Brand Updated Successfully!',
            'icon' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Brand::where('id', $id)->first();

        if ($article) {
            if ($article->image) {
                Storage::delete('assets/image/' . $article->image);
            }
            $article->delete();

            return response()->json([
                'status' => 'true',
                'title' => 'Success',
                'description' => 'Brand Deleted.',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => 'Brand Not Found.',
                'icon' => 'error',
            ]);
        }
    }
}
