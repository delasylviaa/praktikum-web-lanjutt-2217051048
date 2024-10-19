<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasModel;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }

    public function index(){
        $data = [
            'title' => 'Create User',
            'users' => $this->userModel->getUser(),
            'kelas' => $this->userModel->getUser(),
        ];

        return view ('list_user', $data);

    }

    public function create(){

        $kelasModel = new KelasModel();

        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    // public function create(){
    //     return view('create_user', [
    //         'kelas' => KelasModel::all(),
    //     ]);
    // }

    public function store(Request $request){
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'kelas_id' => 'required',
            'npm' => 'required',
            'foto' => 'image|file|max:2048',
        ]);

        // Proses upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('upload', $filename, 'public');

            // Simpan data user ke database
            $this->userModel->create([
                'nama' => $request->input('nama'),
                'kelas_id' => $request->input('kelas_id'),
                'npm' => $request->input('npm'),
                'foto' => $filename,
            ]);
        }

        // return redirect()->to('/user/list');

        return redirect()->route('user.list')->with('success', 'User berhasil ditambahkan');

        // $user = UserModel::create($validatedData);

        // $user->load ('kelas');

        // return view('profile', [
        //     'nama' => $user->nama,
        //     'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        //     'npm' => $user->npm,
        // ]);
    }

    public function show($id)
    {
        $user = $this->userModel->getUser($id); // Metode ini sudah memuat data foto?

        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User tidak ditemukan');
        }

        $data = [
            'title' => 'Profile',
            'nama' => $user->nama,
            'nama_kelas' => $user->nama_kelas,
            'npm' => $user->npm,
            'user' => $user,
            'foto' => $user->foto // Pastikan 'foto' terambil dengan benar
        ];

        return view('profile', $data);
    }


    public function edit($id){
        $user = UserModel::findOrFail($id);
        $kelasModel = new KelasModel();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id){
        $user = UserModel::findOrFail($id);

        $user->nama = $request->nama;
        $user->kelas_id = $request->kelas_id;
        $user->npm = $request->npm;

        if ($request->hasFile('foto')) {
            $oldFilename = $user->foto;

            // Hapus foto lama jika ada
            if ($oldFilename) {
                $oldFilePath = public_path('storage/upload/' . $oldFilename);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath); 
                }
            }

            $file = $request->file('foto');
            $newFilename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('upload', $newFilename, 'public'); // Menyimpan file ke folder uploads dalam storage/public

            // Update nama file di database
            $user->foto = $newFilename;
        }

        // Simpan perubahan pada user
        $user->save();

        return redirect()->route('user.list')->with('success', 'User updated successfully');

    }

    public function destroy($id){
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->route('user.list')->with('success', 'User deleted successfully');

    }

}
