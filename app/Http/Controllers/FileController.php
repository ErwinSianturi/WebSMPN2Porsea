<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class FileController extends Controller
{
    public function uploadFile(Request $request)
    {
        $request->validate([
            'upload' => 'required|file|max:2048', // Sesuaikan validasi dengan kebutuhan Anda
        ]);

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename); // Simpan file ke direktori 'storage/app/public/uploads'

            // Konstruksi URL file yang diunggah
            $url = asset('storage/uploads/' . $filename);

            // Format respons JSON yang diharapkan oleh CKEditor
            $response = [
                'url' => $url,
                'uploaded' => 1,
            ];

            return response()->json($response);
        }

        // Jika tidak ada file yang diunggah, kembalikan respons kosong atau pesan kesalahan
        return response()->json(['uploaded' => 0]);
    }}