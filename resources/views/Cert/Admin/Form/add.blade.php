@extends('Cert/layout')

@section('isi_content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel</a></li>
                <li class="breadcrumb-item active" aria-current="page">New Record</li>
            </ol>
        </nav>

        <div class="card shadow-lg">
            <div class="card-header">
                <h4 class="card-title mb-0">Input Informasi Sertifikat</h4>
            </div>

            <div class="card-body">
                <form action="/tambahData" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan nama">
                            <div class="mt-2"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="skema" class="form-label">Skema:</label>
                            <select class="form-control" id="skema" name="skema">
                                <option value="GRCCP">GRCCP</option>
                                <option value="GRCCM">GRCCM</option>
                                <option value="GRCCA">GRCCA</option>
                                <option value="GRCCE">GRCCE</option>
                            </select>
                            <div class="mt-2"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="nomorCert" class="form-label">Nomor Sertifikat:</label>
                            <input type="text" class="form-control" id="nomorCert" name="nomorCert"
                                placeholder="Masukkan nomor sertifikat">
                            <div class="mt-2"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="masaAktif" class="form-label">Masa Aktif:</label>
                            <input type="text" class="form-control" id="masaAktif" name="masaAktif"
                                placeholder="Masukkan masa aktif">
                            <div class="mt-2"></div>
                        </div>
                        <div class="col-md-12">
                            <label for="fileCert" class="form-label">File Sertifikat (Optional):</label>
                            <input class="custom-file" type="file" id="fileCert" name="fileCert">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
