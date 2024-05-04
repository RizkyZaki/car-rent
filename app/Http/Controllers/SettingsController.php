<?php

namespace App\Http\Controllers;

use App\Models\Settings;
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
        $validatedData = $request->validate([
            'name' => 'required|string',
            'keyword' => 'required|string',
            'description' => 'required|string',
            'overrage_text' => 'required|string',
            'phone' => 'required|string',
            'contact_phone' => 'required|string',
            'email' => 'required|email',
            'text_copyright' => 'required|string',
            'benefit' => 'required', // Jika Anda ingin memastikan benefit adalah array
            // Anda mungkin perlu menambahkan validasi tambahan untuk file-file tergantung kebutuhan
        ]);

        // Ambil data dari request
        $data = $request->only([
            'name', 'keyword', 'description', 'overrage_text',
            'phone', 'contact_phone', 'email', 'text_copyright'
        ]);

        // Simpan file logo jika ada
        if ($request->hasFile('logo')) {
            $hashLogo = md5($request->logo);
            $eks =  $request->logo->getClientOriginalExtension();
            $request->logo->storeAs('assets/image', $hashLogo . '.' . $eks);
            $data['logo'] = $hashLogo . '.' . $eks;
        }

        // Simpan file overrage_image jika ada
        $benefitData = [];
        $benefits = explode(',', $validatedData['benefit']);
        foreach ($benefits as $index => $value) {
            $benefitData['benefit' . ($index + 1)] = $value;
        }
        $data['benefit'] = json_encode($benefitData);


        // Konversi data benefit menjadi format JSON
        $data['benefit'] = json_encode($benefitData);
        $settings = Settings::first();

        // Isi data baru
        $settings->fill($data);

        $settings->save();

        return response()->json([
            'status' => 'true',
            'title' => 'Success',
            'description' => 'Settings saved successfully.',
            'icon' => 'success',
        ]);
    }
}
