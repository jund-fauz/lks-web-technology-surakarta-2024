<?php

namespace App\Http\Controllers;

use App\Models\Ormas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrmasController extends Controller
{
    public function index() {
        $ormas = Ormas::all();
        return response()->json($ormas);
    }

    public function register(Request $request) {
        $request->validate([
            "nama_ormas"=> "required",
            "status_legalitas"=> "required",
            "alamat_kesekretariatan"=> "required",
            "id_kecamatan"=> "required",
            "id_kelurahan"=> "required",
            "nama_ketua"=> "required|max:50",
            "no_hp_ketua"=> "required|max:20",
            "surat_permohonan"=> "required|max:50"
        ]);

        $request['id_user'] = explode('|', str_replace('Bearer ', '', $request->header('Authorization')))[0];
        $request['status'] = 'Daftar';

        $ormas = Ormas::create($request->all());

        if ($ormas) {
            return response()->json(['status'=> 'success','message'=> 'Registrasi Berhasil']);
        } else {
            return response()->json(['status'=> 'failed','message'=> 'Registrasi Gagal'], 400);
        }
    }

    public function update(Request $request, $id) {
        $request->validate([
            "nama_ormas"=> "required",
            "status_legalitas"=> "required",
            "alamat_kesekretariatan"=> "required",
            "id_kecamatan"=> "required",
            "id_kelurahan"=> "required",
            "nama_ketua"=> "required|max:50",
            "no_hp_ketua"=> "required|max:20",
            "surat_permohonan"=> "required|max:50"
        ]);

        $ormas = Ormas::findOrFail($id);
        if ($ormas->update($request->all())) {
            return response()->json(['status'=> 'success','message'=> 'Data Ormas Berhasil Di Update']);
        } else {
            return response()->json(['status'=> 'failed','message'=> 'Data Ormas Gagal Di Update'], 400);
        }
    }

    public function destroy($id) {
        $ormas = Ormas::findOrFail($id);
        if ($ormas->delete()) {
            return response()->json(['status'=> 'success','message'=> 'Data Ormas Berhasil Dihapus']);
        } else {
            return response()->json(['status'=> 'failed','message'=> 'Data Ormas Gagal Dihapus'], 400);
        }
    }
}
