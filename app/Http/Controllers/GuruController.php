<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Tambahkan ini
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::where('jabatan', 'Guru')->orderBy('nama_lengkap', 'asc')->get();

        return view('guru.guru', [
            'guru' => $guru
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.guru-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nip' => 'required|string|unique:gurus',
                'nama_lengkap' => 'required|string',
                'jenis_kelamin' => 'required|string',
                'tanggal_lahir' => 'required|date',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'jabatan' => 'required|string',
                'mata_pelajaran' => 'nullable|string',
                'sambutan' => 'nullable|string',
            ]);

            $input = $request->all();

            if ($request->hasFile('foto')) {
                $destinationPath = public_path('foto'); // Path ke subfolder foto di dalam direktori public
                $profileImage = date('YmdHis') . "." . $request->file('foto')->getClientOriginalExtension();
                $request->file('foto')->move($destinationPath, $profileImage);
                $input['foto'] = $profileImage;
            }

            Guru::create($input);

            Alert::success('Success', 'Guru has been saved!');
            return redirect('/guru');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to save Guru: ' . $ex->getMessage());
            return redirect('/guru/create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_guru)
    {
        $guru = Guru::findOrFail($id_guru);

        return view('guru.guru-edit', [
            'guru' => $guru,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        try {
            $request->validate([
                'nip' => 'required|string|unique:gurus,nip,' . $guru->id,
                'nama_lengkap' => 'required|string',
                'jenis_kelamin' => 'required|string',
                'tanggal_lahir' => 'required|date',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'jabatan' => 'required|string',
                'mata_pelajaran' => 'nullable|string',
                'sambutan' => 'nullable|string',
            ]);

            $input = $request->all();

            if ($request->hasFile('foto')) {
                if ($guru->foto) {
                    $fotoPath = public_path('foto/' . $guru->foto); // Path ke foto lama
                    if (File::exists($fotoPath)) {
                        unlink($fotoPath); // Menghapus file gambar lama
                    }
                }
                $destinationPath = public_path('foto'); // Path ke subfolder foto di dalam direktori public
                $profileImage = date('YmdHis') . "." . $request->file('foto')->getClientOriginalExtension();
                $request->file('foto')->move($destinationPath, $profileImage);
                $input['foto'] = $profileImage;
            }

            $guru->update($input);

            Alert::success('Success', 'Guru has been updated!');
            return redirect('/guru');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to update Guru: ' . $ex->getMessage());
            return redirect('/guru/' . $guru->id . '/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_guru)
    {
        try {
            $guru = Guru::findOrFail($id_guru);

            // Hapus gambar terkait dari penyimpanan jika ada
            if ($guru->foto) {
                $destinationPath = public_path('foto');
                $fotoPath = $destinationPath . '/' . $guru->foto;
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            // Hapus record Guru dari database
            $guru->delete();

            Alert::success('Success', 'Guru has been deleted!');
            return redirect('/guru');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Guru could not be deleted because it has data tied to it!');
            return redirect('/guru');
        }
    }
}
