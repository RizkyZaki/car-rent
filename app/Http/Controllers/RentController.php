<?php

namespace App\Http\Controllers;

use App\Models\PostCar;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'rent' => 'required',
            'fee' => 'required',
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
            'fee' => $request->fee,
            'rent' => $request->rent,
            'id_post_car' => $request->id_post_car,
        ];

        Rent::create($data);

        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'Rent Added Successfully!',
            'icon' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $p = PostCar::where('slug', $slug)->first();
        return view('admin.pages.inform.post.rent', [
            'title' => 'Rent',
            'heading' => 'Data rent',
            'collection' => $p->rent
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cat = Rent::where('id', $id)->first();
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
            'rent' => 'required',
            'fee' => 'required',
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
            'fee' => $request->fee,
            'rent' => $request->rent,
        ];

        Rent::find($id)->update($data);
        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'Rent Edited!',
            'icon' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Rent::where('id', $id)->first();
        if ($cat) {
            $cat->delete();

            return response()->json([
                'status' => 'true',
                'title' => 'Success',
                'description' => 'Rent Deleted!',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => 'Rent Not Found',
                'icon' => 'error',
            ]);
        }
    }
}
