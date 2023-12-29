@section('isi_content')
    @extends('Cert/layout')

    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Data Akun Admin</h5>
                    <a href="{{ route('BuatAkun') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Buat Akun
                    </a>
                </div>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop through your data and populate the table rows --}}
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $akun)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $akun['name'] }}</td>
                                <td>{{ $akun['email'] }}</td>
                                <td>{{ $akun['role'] }}</td>
                                <td>
                                    {{-- Add your options (buttons, links, etc.) here --}}
                                    <a href="/vAdmin/edit/{{ $akun['id'] }}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="/vAdmin/delete/{{ $akun['id'] }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links('pagination::Bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
