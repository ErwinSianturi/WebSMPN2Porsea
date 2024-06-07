<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengumuman = Pengumuman::orderBy('created_at', 'desc')->get();

        return view('pengumuman.pengumuman', [
            'pengumuman' => $pengumuman
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengumuman.pengumuman-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|string',
                'isi' => 'required|string',
                'kategori' => 'required|in:umum,psb',
                'foto' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
                'file' => 'nullable|mimes:doc,docx,xls,xlsx,pdf',
            ]);

            $input = $request->all();

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path('foto'), $profileImage);
                $input['foto'] = $profileImage;
            }

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path('files'), $fileName);
                $input['file'] = $fileName;
            }

            Pengumuman::create($input);

            Alert::success('Success', 'Pengumuman has been saved!');
            return redirect('/pengumuman');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to save Pengumuman: ' . $ex->getMessage());
            return redirect('/pengumuman/create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return view('pengumuman.pengumuman-edit', [
            'pengumuman' => $pengumuman,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'judul' => 'required|string',
                'isi' => 'required|string',
                'kategori' => 'required|in:umum,psb',
                'foto' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
                'file' => 'nullable|mimes:doc,docx,xls,xlsx,pdf',
            ]);

            $pengumuman = Pengumuman::findOrFail($id);
            $input = $request->all();

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path('foto'), $profileImage);
                if ($pengumuman->foto) {
                    // Hapus foto lama jika ada
                    unlink(public_path('foto/' . $pengumuman->foto));
                }
                $input['foto'] = $profileImage;
            }

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path('files'), $fileName);
                if ($pengumuman->file) {
                    // Hapus file lama jika ada
                    unlink(public_path('files/' . $pengumuman->file));
                }
                $input['file'] = $fileName;
            }

            $pengumuman->update($input);

            Alert::success('Success', 'Pengumuman has been updated!');
            return redirect('/pengumuman');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to update Pengumuman: ' . $ex->getMessage());
            return redirect('/pengumuman/' . $id . '/edit');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $pengumuman = Pengumuman::findOrFail($id);

            // Hapus foto terkait jika ada
            if ($pengumuman->foto) {
                $fotoPath = public_path('foto/' . $pengumuman->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            // Hapus file terkait jika ada
            if ($pengumuman->file) {
                $filePath = public_path('files/' . $pengumuman->file);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Hapus pengumuman dari database
            $pengumuman->delete();

            Alert::success('Success', 'Pengumuman has been deleted!');
            return redirect('/pengumuman');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Pengumuman could not be deleted because it has data tied to it!');
            return redirect('/pengumuman');
        }
    }
}
