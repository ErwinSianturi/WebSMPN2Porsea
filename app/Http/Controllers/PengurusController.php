<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Tambahkan ini
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengurus = Guru::where('jabatan','!=','Guru')->orderBy('nama_lengkap', 'asc')->get();

        return view('pengurus.pengurus', [
            'pengurus' => $pengurus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengurus.pengurus-add');
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
                'alamat' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'jabatan' => 'required|string',
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

            Alert::success('Success', 'Pengurus has been saved!');
            return redirect('/pengurus');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to save Pengurus: ' . $ex->getMessage());
            // return redirect('/pengurus/create');
            // back
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_pengurus)
    {
        $pengurus = Guru::findOrFail($id_pengurus);

        return view('pengurus.pengurus-edit', [
            'pengurus' => $pengurus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $pengurus)
    {
        // dd($request->all(), $pengurus);
        $pengurus = Guru::findOrFail($request->id);
        try {
            $request->validate([
                'nip' => 'required|string|unique:gurus,nip,' . $pengurus->id,
                'nama_lengkap' => 'required|string',
                'jenis_kelamin' => 'required|string',
                'tanggal_lahir' => 'required|date',
                'alamat' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'jabatan' => 'required|string',
                'mata_pelajaran' => 'nullable|string',
                'sambutan' => 'nullable|string',
            ]);

            $input = $request->all();

            if ($request->hasFile('foto')) {
                if ($pengurus->foto) {
                    $fotoPath = public_path('foto/' . $pengurus->foto); // Path ke foto lama
                    if (File::exists($fotoPath)) {
                        unlink($fotoPath); // Menghapus file gambar lama
                    }
                }
                $destinationPath = public_path('foto'); // Path ke subfolder foto di dalam direktori public
                $profileImage = date('YmdHis') . "." . $request->file('foto')->getClientOriginalExtension();
                $request->file('foto')->move($destinationPath, $profileImage);
                $input['foto'] = $profileImage;
            }

            $pengurus->update($input);

            Alert::success('Success', 'Pengurus has been updated!');
            return redirect('/pengurus');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to update Pengurus: ' . $ex->getMessage());
            return redirect('/pengurus/' . $pengurus->id . '/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_pengurus)
    {
        try {
            $pengurus = Guru::findOrFail($id_pengurus);

            // Hapus gambar terkait dari penyimpanan jika ada
            if ($pengurus->foto) {
                $destinationPath = public_path('foto');
                $fotoPath = $destinationPath . '/' . $pengurus->foto;
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            // Hapus record Guru dari database
            $pengurus->delete();

            Alert::success('Success', 'Pengurus has been deleted!');
            return redirect('/pengurus');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Pengurus could not be deleted because it has data tied to it!');
            return redirect('/pengurus');
        }
    }
}
