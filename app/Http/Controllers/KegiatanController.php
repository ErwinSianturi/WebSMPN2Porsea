<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatans = Kegiatan::orderBy('created_at', 'desc')->get();

        return view('kegiatan.kegiatan', compact('kegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kegiatan.kegiatan-add');
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
                'nama_kegiatan' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'video' => 'nullable',
                'keterangan' => 'required',
            ]);

            $input = $request->all();

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path('foto'), $imageName);
                $input['foto'] = $imageName;
            }

            if ($request->hasFile('video')) {
                $image = $request->file('video');
                $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path('video'), $imageName);
                $input['video'] = $imageName;
            }

            Kegiatan::create($input);

            Alert::success('Success', 'Kegiatan has been saved!');
            return redirect('/kegiatan');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to save Kegiatan: ' . $ex->getMessage());
            return redirect('/kegiatan/create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        return view('kegiatan.kegiatan-edit', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama_kegiatan' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'video' => 'nullable',
                'keterangan' => 'required',
            ]);

            $kegiatan = Kegiatan::findOrFail($id);
            $input = $request->all();

            if ($request->hasFile('foto')) {
                if ($kegiatan->foto && file_exists(public_path('foto/' . $kegiatan->foto))) {
                    unlink(public_path('foto/' . $kegiatan->foto));
                }
                $destinationPath = public_path('foto');
                $profileImage = date('YmdHis') . "." . $request->file('foto')->getClientOriginalExtension();
                $request->file('foto')->move($destinationPath, $profileImage);
                $input['foto'] = $profileImage;
            }
            if ($request->hasFile('video')) {
                if ($kegiatan->foto && file_exists(public_path('video/' . $kegiatan->foto))) {
                    unlink(public_path('video/' . $kegiatan->foto));
                }
                $destinationPath = public_path('video');
                $profileImage = date('YmdHis') . "." . $request->file('video')->getClientOriginalExtension();
                $request->file('video')->move($destinationPath, $profileImage);
                $input['video'] = $profileImage;
            }

            $kegiatan->update($input);

            Alert::success('Success', 'Kegiatan has been updated!');
            return redirect('/kegiatan');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to update Kegiatan: ' . $ex->getMessage());
            return redirect('/kegiatan/' . $id . '/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $kegiatan = Kegiatan::findOrFail($id);

            if ($kegiatan->foto && file_exists(public_path('foto/' . $kegiatan->foto))) {
                unlink(public_path('foto/' . $kegiatan->foto));
            }

            $kegiatan->delete();

            Alert::success('Success', 'Kegiatan has been deleted!');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Kegiatan could not be deleted because it has data tied to it!');
        }

        return redirect('/kegiatan');
    }
}
