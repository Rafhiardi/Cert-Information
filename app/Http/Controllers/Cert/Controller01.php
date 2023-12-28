<?php

namespace App\Http\Controllers\Cert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Cert\ModelCert;
use Illuminate\Support\Str;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Storage;

//Controller01 = admin
class Controller01 extends Controller
{

    public function indexCert()
    {
        $getData = ModelCert::paginate(5);
        return view("Cert/Admin/index", ["data" => $getData]);
    }

    public function cariData(Request $request,)
    {
        $keyword = $request->cari;
        $getData = ModelCert::where('nama', 'like', "%" . $keyword . "%")
            ->orWhere('skema', 'like', "%" . $keyword . "%")
            ->orWhere('nomor_sertifikat', 'like', "%" . $keyword . "%")
            ->orWhere('masa_aktif', 'like', "%" . $keyword . "%")
            ->paginate(5);
        return view('Cert/Admin/index', ['data' => $getData]);
    }

    public function FormDataBaru()
    {
        return view("Cert/Admin/Form/add");
    }
    public function tambahData(Request $request)
    {

        $token = Str::uuid();
        // Validasi file
        $this->validate($request, [
            'file' => 'file|mimes:pdf',
        ]);

        // Simpan file
        $file = $request->file('fileCert');
        $fileName1 = "$token.pdf";
        if ($file) {
            // Pindahkan file ke direktori tujuan
            $file->move('softcopy-sertifikat', $fileName1);
        } else {
            $fileName1 = null;
        }
        $data = new ModelCert();
        $data->token = $token;
        $data->nama = $request->nama;
        $data->skema = $request->skema;
        $data->nomor_sertifikat = $request->nomorCert;
        $data->masa_aktif = $request->masaAktif;
        $data->file_cert = $fileName1;
        $data->save();

        return redirect("/test-1");
    }
    public function detailCert($token)
    {
        $detailData = ModelCert::where('token', $token)->firstOrFail();

        return view('Cert/Admin/Form/detailCert', ['data' => $detailData]);
    }
    public function editData(Request $request, $token)
    {
        $dataEdit = ModelCert::where('token', $token)->firstOrFail();
        return view('Cert/Admin/Form/edit', ['data' => $dataEdit]);
    }
    public function updateData(Request $request, $token)
    {
        $updateData = ModelCert::where('token', $token)->firstOrfail();
        $fileOld = $updateData->file_cert;
        //dd($request->fileCert);
        if ($fileOld == null) {
            $this->validate($request, [
                'file' => 'file|mimes:pdf',
            ]);

            // Simpan file
            $file = $request->file('fileCert');
            $fileName1 = "$updateData->token.pdf";
            if ($file) {
                // Pindahkan file ke direktori tujuan
                $file->move('softcopy-sertifikat', $fileName1);
            } else {
                $fileName1 = null;
            }
            $updateData->token = $token;
            $updateData->nama = $request->nama;
            $updateData->skema = $request->skema;
            $updateData->nomor_sertifikat = $request->nomorCert;
            $updateData->masa_aktif = $request->masaAktif;
            $updateData->file_cert = $fileName1;
            $updateData->update();

            return redirect("/test-1");
        } else {
            $updateData = ModelCert::where('token', $token)->firstOrfail();
            //dd($request->fileCert);


            // Hapus file lama dari penyimpanan
            if ($fileOld) {
                unlink('softcopy-sertifikat/' . $fileOld);
            }

            $this->validate($request, [
                'file' => 'file|mimes:pdf',
            ]);

            // Simpan file
            $file = $request->file('fileCert');
            $fileName1 = "$updateData->token.pdf";
            if ($file) {
                $file->move('softcopy-sertifikat', $fileName1); //ini di simpan di publik/softcopy-sertifikat
            }

            $updateData->nama = $request->nama;
            $updateData->skema = $request->skema;
            $updateData->nomor_sertifikat = $request->nomorCert;
            $updateData->masa_aktif = $request->masaAktif;
            $updateData->file_cert = $fileName1;
            $updateData->update();

            return redirect('/test-1');
        }
    }
    public function hapusData(Request $request, $token)
    {
        $hapusData = ModelCert::where('token', $token)->firstOrFail();

        // Dapatkan nama file dari model
        $fileName = $hapusData->file_cert;  // Asumsi kolom file_name menyimpan nama file

        // Hapus file dari penyimpanan
        if ($fileName) {
            unlink('softcopy-sertifikat/' . $fileName);
        }
        // Hapus data dari database
        $hapusData->delete();
        //return response()->delete($filepath);
        return redirect('/test-1');
    }
    public function viewCert($file)
    {
        $filepath = public_path('softcopy-sertifikat/' . $file);
        return response()->file($filepath, ['Content-Type' => 'application/pdf']);
    }
    public function chart()
    {
        $model = ModelCert::all();
        $dataChart = [
            "GRCCP" => $model->where('skema', 'GRCCP')->count(),
            "GRCCM" => $model->where('skema', 'GRCCM')->count(),
            "GRCCA" => $model->where('skema', 'GRCCA')->count(),
            "GRCCE" => $model->where('skema', 'GRCCE')->count()

        ];
        return response()->json($dataChart);

        //dd($dataChart);
    }
    public function viewChart()
    {
        $model = ModelCert::paginate(5);
        return view('Cert/Admin/Dashboard', ['data'=> $model]);
    }
}
