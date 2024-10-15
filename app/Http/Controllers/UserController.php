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

    public function store(Request $request)
    {
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),     
        ]);

        return redirect()->to('/user');
        // $validatedData = $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'npm' => 'required|string|max:255',
        //     'kelas_id' => 'required|exists:kelas,id',
        // ]);

        // $user = UserModel::create($validatedData);

        // $user->load ('kelas');

        // return view('profile', [
        //     'nama' => $user->nama,
        //     'npm' => $user->npm,
        //     'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        // ]);
        // $data = [
        //     'nama' => $request->input('nama'),
        //     'kelas' => $request->input('kelas'),
        //     'npm' => $request->input('npm'),
        // ];
        // return view('profile', $data);
    }

    // public function profile($nama = "", $kelas = "", $npm = "")
    // {
    //     $data = [
    //         'nama' => $nama,
    //         'kelas' => $kelas,
    //         'npm' => $npm
    //     ];
        
    //     return view('profile', $data);
    // }
}
