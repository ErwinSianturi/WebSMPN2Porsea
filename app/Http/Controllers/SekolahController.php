<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sekolah = Sekolah::orderBy('nama_sekolah', 'asc')->get();

        return view('sekolah.sekolah', [
            'sekolah' => $sekolah
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sekolah.sekolah-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_sekolah' => 'required|string',
                'alamat_sekolah' => 'required|string',
                'no_telp' => 'required|string',
                'email' => 'required|email',
                'visi' => 'required|string',
                'misi' => 'required|string',
                'profil_sekolah' => 'required|string',
                'tujuan_sekolah' => 'required|string',
                'filosofi_sekolah' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // Menambahkan validasi untuk foto
            ]);

            $input = $request->all();

            if ($image = $request->file('foto')) {
                $destinationPath = public_path('foto');
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $input['foto'] = $profileImage;
                $image->move($destinationPath, $profileImage);
            }

            Sekolah::create($input);

            Alert::success('Success', 'Sekolah has been saved!');
            return redirect('/sekolah');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to save Sekolah: ' . $ex->getMessage());
            return redirect('/sekolah/create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_sekolah)
    {
        $sekolah = Sekolah::findOrFail($id_sekolah);

        return view('sekolah.sekolah-edit', [
            'sekolah' => $sekolah,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sekolah $sekolah)
    {
        try {
            $request->validate([
                'nama_sekolah' => 'required|string',
                'alamat_sekolah' => 'required|string',
                'no_telp' => 'required|string',
                'email' => 'required|email',
                'visi' => 'required|string',
                'misi' => 'required|string',
                'profil_sekolah' => 'required|string',
                'tujuan_sekolah' => 'required|string',
                'filosofi_sekolah' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // Menambahkan validasi untuk foto
            ]);

            $input = $request->all();

            if ($image = $request->file('foto')) {
                if ($sekolah->foto) {
                    $fotoPath = public_path('foto/' . $sekolah->foto);
                    if (file_exists($fotoPath)) {
                        unlink($fotoPath);
                    }
                }
                $destinationPath = public_path('foto');
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $input['foto'] = $profileImage;
                $image->move($destinationPath, $profileImage);
            }

            $sekolah->update($input);

            Alert::success('Success', 'Sekolah has been saved!');
            return redirect('/sekolah');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to save Sekolah: ' . $ex->getMessage());
            return redirect('/sekolah/create');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_sekolah)
    {
        try {
            $deletedSekolah = Sekolah::findOrFail($id_sekolah);

            // Hapus foto terkait jika ada
            if ($deletedSekolah->foto) {
                $fotoPath = public_path('foto/' . $deletedSekolah->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            $deletedSekolah->delete();

            Alert::success('Success', 'Sekolah has been deleted!');
            return redirect('/sekolah');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to delete Sekolah: ' . $ex->getMessage());
            return redirect('/sekolah');
        }
    }
}
