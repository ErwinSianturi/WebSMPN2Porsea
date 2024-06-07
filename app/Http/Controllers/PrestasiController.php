<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestasis = Prestasi::orderBy('created_at', 'desc')->get();
        return view('prestasi.prestasi', compact('prestasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prestasi.prestasi-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_siswa' => 'required|string',
                'keterangan' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $input = $request->all();

            if ($image = $request->file('foto')) {
                $destinationPath = public_path('foto');
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $input['foto'] = $profileImage;
                $image->move($destinationPath, $profileImage);
            }

            Prestasi::create($input);

            Alert::success('Success', 'Prestasi has been saved!');
            return redirect('/prestasi');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to save Prestasi: ' . $ex->getMessage());
            return redirect('/prestasi/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function show(Prestasi $prestasi)
    {
        return view('prestasi.show', compact('prestasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestasi $prestasi)
    {
        return view('prestasi.prestasi-edit', compact('prestasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        try {
            $request->validate([
                'nama_siswa' => 'required|string',
                'keterangan' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $input = $request->all();

            if ($image = $request->file('foto')) {
                $destinationPath = public_path('foto');
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $input['foto'] = $profileImage;
                $image->move($destinationPath, $profileImage);

                // Hapus foto lama jika ada
                if ($prestasi->foto) {
                    $fotoPath = public_path('foto/' . $prestasi->foto);
                    if (file_exists($fotoPath)) {
                        unlink($fotoPath);
                    }
                }
            }

            $prestasi->update($input);
            
            Alert::success('Success', 'Prestasi has been updated!');
            return redirect('/prestasi');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to update Prestasi: ' . $ex->getMessage());
            return redirect('/prestasi/' . $prestasi->id . '/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestasi $prestasi)
    {
        try {
            // Hapus foto terkait jika ada
            if ($prestasi->foto) {
                $fotoPath = public_path('foto/' . $prestasi->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            // Hapus data prestasi dari database
            $prestasi->delete();

            Alert::success('Success', 'Prestasi has been deleted!');
            return redirect('/prestasi');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Prestasi could not be deleted because it has data tied to it!');
            return redirect('/prestasi');
        }
    }
}
