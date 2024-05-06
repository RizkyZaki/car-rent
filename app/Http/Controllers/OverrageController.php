<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Overrage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OverrageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.inform.overrage.index', [
            'title' => 'Overrage',
            'heading' => 'Data Overrage',
            'collection' => Overrage::latest()->get(),
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
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required|image',
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

        $eks =  $request->icon->getClientOriginalExtension();
        $hashImg = md5($request->icon) . '.' . $eks;
        $request->icon->storeAs('assets/image', $hashImg);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $hashImg,
        ];

        Overrage::create($data);

        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'Overrage Added Successfully!',
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
        $cat = Overrage::where('id', $id)->first();
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
        $br = Overrage::find($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
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
            'title' => $request->title,
            'description' => $request->description,
        ];
        if ($request->icon) {
            Storage::delete('assets/image/' . $br->icon);
            $hashImg = md5($request->icon);
            $eks =  $request->icon->getClientOriginalExtension();
            $request->icon->storeAs('assets/image', $hashImg . '.' . $eks);
            $data['icon'] = $hashImg . '.' . $eks;
        }
        $br->update($data);
        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'Overrage Updated Successfully!',
            'icon' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Overrage::where('id', $id)->first();

        if ($article) {
            if ($article->image) {
                Storage::delete('assets/image/' . $article->image);
            }
            $article->delete();

            return response()->json([
                'status' => 'true',
                'title' => 'Success',
                'description' => 'Overrage Deleted.',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => 'Overrage Not Found.',
                'icon' => 'error',
            ]);
        }
    }
}
