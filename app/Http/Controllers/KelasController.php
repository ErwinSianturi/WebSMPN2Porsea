<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();

        return view('kelas.kelas', [
            'kelas' => $kelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.kelas-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_kelas' => 'required|string',
                'jumlah_siswa' => 'required|integer',
            ]);

            Kelas::create($request->all());

            Alert::success('Success', 'Kelas has been saved!');
            return redirect('/kelas');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to save Kelas: ' . $ex->getMessage());
            return redirect('/kelas/create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_kelas)
    {
        $kelas = Kelas::findOrFail($id_kelas);

        return view('kelas.kelas-edit', [
            'kelas' => $kelas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
{
    try {
        $request->validate([
            'nama_kelas' => 'required|string',
            'jumlah_siswa' => 'required|integer',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->jumlah_siswa = $request->jumlah_siswa;
        $kelas->save();

        
        return redirect('/kelas')->with('success', 'Kelas has been updated!');
    } catch (Exception $ex) {
        Alert::error('Error', 'Failed to update Kelas: ' . $ex->getMessage());
        return redirect('/kelas/' . $id . '/edit');
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_kelas)
    {
        try {
            $deletedKelas = Kelas::findOrFail($id_kelas);
            $deletedKelas->delete();

            Alert::success('Success', 'Kelas has been deleted!');
            return redirect('/kelas');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Kelas could not be deleted because it has data tied to it!');
            return redirect('/kelas');
        }
    }
}
