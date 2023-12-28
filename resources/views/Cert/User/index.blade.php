@extends('Cert/layout')

@section('isi_content')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
        </ol>
    </nav>

    <div class="card shadow-lg">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title mb-0">Data Informasi Sertifikat</h4>
            </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <form action="/search" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="cari" class="form-control" placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Skema</th>
                        <th>Nomor Sertifikat</th>
                        <th>Masa Aktif</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item['nama'] }}</td>
                            <td>{{ $item['skema'] }}</td>
                            <td>{{ $item['nomor_sertifikat'] }}</td>
                            <td>{{ $item['masa_aktif'] }}</td>
                            <td class="text-center">
                                <a href="/user/detailCert/{{ $item['token'] }}" class="btn btn-warning">Lihat Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $data->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@endsection
