<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.pages.settings.index', [
            'title' => 'Settings Website',
            'heading' => 'Data Settings Website',
        ]);
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
}
