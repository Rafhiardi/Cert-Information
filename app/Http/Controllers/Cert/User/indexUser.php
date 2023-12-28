<?php

namespace App\Http\Controllers\Cert\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cert\ModelCert;

class indexUser extends Controller
{

    public function index(){
        $data = ModelCert::paginate(10);
        return view('Cert/User/Index', ['data' => $data]);
    }
    public function UserDetailCert(Request $request, $token){
        $detailData = ModelCert::where('token', $token)->firstOrFail();

        return view('Cert/User/detailCert', ['data' => $detailData]);
    }
    public function UserCari(Request $request){
        $keyword = $request->cari;
        $getData = ModelCert::where('nama', 'like', "%" . $keyword . "%")
            ->orWhere('skema', 'like', "%" . $keyword . "%")
            ->orWhere('nomor_sertifikat', 'like', "%" . $keyword . "%")
            ->orWhere('masa_aktif', 'like', "%" . $keyword . "%")
            ->paginate(5);
        return view('Cert/User/index', ['data' => $getData]);
    }
    public function viewCert($file)
    {
        $filepath = public_path('softcopy-sertifikat/' . $file);
        return response()->file($filepath, ['Content-Type' => 'application/pdf']);
    }
}
