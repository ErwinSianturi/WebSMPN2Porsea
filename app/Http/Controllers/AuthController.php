<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kegiatan;
use App\Models\Kelas;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Sekolah;
use App\Models\Galeri;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::latest()->first();
$guru = Guru::where('jabatan', 'Kepala Sekolah')->first();
$tatausaha = Guru::where('jabatan', '!=', 'Guru')
                 ->orWhere('jabatan', 'Kepala Sekolah')
                 ->get();

$jumlah_kelas = Kelas::count();
$jumlah_siswas = Kelas::sum('jumlah_siswa');
$jumlah_guru = Guru::whereNotIn('jabatan', ['Tata Usaha', 'Kepala Sekolah'])->count();

return view('template/index', compact('sekolah', 'guru', 'jumlah_kelas', 'tatausaha', 'jumlah_guru', 'jumlah_siswas'));

    }
    public function program()
    {
        $sekolah = Sekolah::latest()->first();
        $guru = Guru::whereNotIn('jabatan', ['Tata Usaha', 'Kepala Sekolah'])->get();
        $tatausaha = Guru::where('jabatan', 'Tata Usaha')->get();
        $jumlah_kelas = Kelas::count();
        $prestasi = Prestasi::get();
        $kegiatan = Kegiatan::get();
        // $jumlah_siswa = Siswa::count();
        return view('template/program', compact('sekolah', 'guru','jumlah_kelas','tatausaha','prestasi','kegiatan'));
    }
    public function berita()
    {
        $sekolah = Sekolah::latest()->first();
        $guru = Guru::whereNotIn('jabatan', ['Tata Usaha', 'Kepala Sekolah'])->get();
        $tatausaha = Guru::where('jabatan', 'Tata Usaha')->get();
        $jumlah_kelas = Kelas::count();
        $pengumuman = Pengumuman::where('kategori', 'umum')->get();
        $pengumuman1 = Pengumuman::where('kategori', 'psb')->get();
        $kegiatan = Kegiatan::get();
        // $jumlah_siswa = Siswa::count();
        return view('template/berita', compact('sekolah', 'guru','jumlah_kelas','tatausaha','pengumuman','pengumuman1','kegiatan'));
    }
    public function galerii()
{
    $sekolah = Sekolah::latest()->first();
    $galeri = Galeri::latest()->get();
    return view('template/galeri', compact('sekolah','galeri'));
}

public function show($id)
{
    // Mendapatkan data pengumuman dengan ID yang diberikan
    $sekolah = Sekolah::latest()->first();
    $guru = Guru::where('jabatan', 'Kepala Sekolah')->first();
    $tatausaha = Guru::where('jabatan', 'Tata Usaha')->get();
    $jumlah_kelas = Kelas::count();
    $jumlah_siswas = Kelas::sum('jumlah_siswa');
    $jumlah_guru = Guru::whereNotIn('jabatan', ['Tata Usaha', 'Kepala Sekolah'])->count();
    $pengumuman = Pengumuman::findOrFail($id);

    return view('template/show', compact('sekolah', 'guru', 'jumlah_kelas', 'tatausaha', 'jumlah_guru', 'jumlah_siswas', 'pengumuman'));
}






    public function login()
    {

        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        User::where('email', $credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            Alert::success('Success', 'Login success !');
            return redirect()->intended('/dashboard');
        } else {
            Alert::error('Error', 'Login failed !');
            return redirect('/login');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::success('Success', 'Log out success !');
        return redirect('/login');
    }
}
