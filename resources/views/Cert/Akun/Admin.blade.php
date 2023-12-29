@extends('Cert/layout')
@section('isi_content')

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Input Akun Admin</h5>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Buat Akun</button>
                </form>
            </div>
        </div>
    </div>
@endsection
