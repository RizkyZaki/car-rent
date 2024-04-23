<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.master.faq.index', [
            'title' => 'FAQ',
            'heading' => 'Data FAQ',
            'collection' => Faq::latest()->get(),
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
            'question' => 'required',
            'answer' => 'required',
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
            'answer' => $request->answer,
            'question' => $request->question,
        ];

        Faq::create($data);

        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'FAQ Added Successfully!',
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
        $cat = Faq::where('id', $id)->first();
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
            'question' => 'required',
            'answer' => 'required',
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
            'answer' => $request->answer,
            'question' => $request->question,
        ];

        Faq::find($id)->update($data);
        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'FAQ Edited!',
            'icon' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Faq::where('id', $id)->first();
        if ($cat) {
            $cat->delete();

            return response()->json([
                'status' => 'true',
                'title' => 'Success',
                'description' => 'Faq Deleted!',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'title' => 'Error',
                'description' => 'Faq Not Found',
                'icon' => 'error',
            ]);
        }
    }
}
