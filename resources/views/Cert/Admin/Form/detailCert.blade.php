@extends('Cert/layout')

@section('isi_content')

<div class="container-fluid">
  <div class="card shadow-lg">
    <div class="card-header">
      <h4 class="card-title mb-0">Informasi Pemilik Sertifikat</h4>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-3">
          <h5 class="mb-3">Nomor Sertifikat</h5>
          <p class="text-muted">{{ $data['nomor_sertifikat'] }}</p>
        </div>
        <div class="col-md-3">
          <h5 class="mb-3">Nama</h5>
          <p class="text-muted">{{ $data['nama'] }}</p>
        </div>
        <div class="col-md-3">
          <h5 class="mb-3">Skema</h5>
          <p class="text-muted">{{ $data['skema'] }}</p>
        </div>
        <div class="col-md-3">
          <h5 class="mb-3">Masa Aktif</h5>
          <p class="text-muted">{{ $data['masa_aktif'] }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <a href="/detailCert/{{ $data['token'] }}/edit" class="btn btn-primary">Edit</a>
          <a href="/hapusData/{{ $data['token'] }}" class="btn btn-secondary">Hapus</a>
          <a href="/lihatPDF/{{ $data['file_cert'] }}" target="_blank" class="btn btn-success float-right">Download Sertifikat (PDF)</a>

        </div>


      </div>
    </div>
  </div>
</div>

@endsection
