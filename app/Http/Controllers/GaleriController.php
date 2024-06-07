<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::all();

        return view('galeri.galeri', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galeri.galeri-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'judul' => 'required|string',
                'deskripsi' => 'nullable|string',
            ]);

            $input = $request->all();

            if ($image = $request->file('foto')) {
                $destinationPath = public_path('foto'); // Path ke subfolder foto di dalam direktori public
                $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $imageName);
                $input['foto'] = $imageName;
            }

            Galeri::create($input);

            Alert::success('Success', 'Galeri has been saved!');
            return redirect('/galeri');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to save Galeri: ' . $ex->getMessage());
            return redirect('/galeri/create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $galeri)
    {
        return view('galeri.show', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        return view('galeri.galeri-edit', ['gambar' => $galeri]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        try {
            $request->validate([
                'judul' => 'required|string',
                'deskripsi' => 'nullable|string',
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $input = $request->except('_token', '_method');

            // Check if a new image is uploaded
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();

                // Move the new image to the destination folder
                $image->move(public_path('foto'), $imageName);

                // Delete the old image if it exists
                if ($galeri->foto && file_exists(public_path('foto/' . $galeri->foto))) {
                    unlink(public_path('foto/' . $galeri->foto));
                }

                // Update the image name in the input array
                $input['foto'] = $imageName;
            }

            // Update other fields
            $galeri->update($input);

            Alert::success('Success', 'Galeri has been updated!');
            return redirect('/galeri');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to update Galeri: ' . $ex->getMessage());
            return redirect('/galeri/' . $galeri->id . '/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        try {
            // Hapus gambar terkait dari penyimpanan
            if ($galeri->foto) {
                $destinationPath = public_path('foto');
                if (file_exists($destinationPath . '/' . $galeri->foto)) {
                    unlink($destinationPath . '/' . $galeri->foto); // Menghapus file gambar
                }
            }

            // Hapus record Galeri dari database
            $galeri->delete();

            Alert::success('Success', 'Galeri has been deleted!');
            return redirect()->route('galeri.index');
        } catch (Exception $ex) {
            Alert::error('Error', 'Failed to delete Galeri: ' . $ex->getMessage());
            return redirect()->route('galeri.index');
        }
    }
}
