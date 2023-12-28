@extends('Cert/layout')

@section('isi_content')

    <title>Bar Chart Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Tambahkan gaya CSS jika diperlukan */

    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card shadow-lg">
              <div class="card-header">
                <h5 class="card-title mb-0">Data Statistik Sertifikat</h5>
              </div>
              <div class="card-body">
                <canvas id="myChart"></canvas>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card shadow-lg">
              <div class="card-header">
                <h5 class="card-title mb-0">System Notifikasi</h5>
              </div>
              <div class="card-body">
                <p>Maaf saat ini kami sedang mengembangkan sistem . Mungkin ada gangguan sementara. Kami berusaha keras untuk memperbaikinya. Terima kasih atas kesabaran Anda.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="card shadow-lg mt-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Data Informasi Sertifikat</h5>
            <a href="/FormDataBaru" class="btn btn-success">Data Baru</a>
          </div>

          <div class="card-body">
            <div class="row">
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

            <table class="table table-sm table-hover table-bordered">
              <thead class="">
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
                    <a href="/detailCert/{{ $item['token'] }}" class="btn btn-warning">Lihat Detail</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

            {{ $data->links('pagination::bootstrap-5') }}
          </div>
        </div>
      </div>

<!-- end -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Deklarasikan variabel ctx seperti pada skrip Anda
        const ctx = document.getElementById('myChart');

        fetch('/chart-1')
            .then(response => response.json())
            .then(data => {
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: Object.keys(data), // Gunakan keys dari JSON sebagai labels
                        datasets: [{
                            data: Object.values(data), // Gunakan values dari JSON sebagai data
                            borderWidth: 1,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                            ],
                            borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                            ],
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                                y: {
                                    beginAtZero: true,
                                    precision: 0, // Menetapkan jumlah digit desimal pada sumbu y menjadi 0
                                }
                            },
                        plugins: {
                            legend: {
                                position: 'top',
                                display: false,
                            },
                            title: {
                                display: true,
                                text: 'Statistik Sertifikat yang diterbitkan'
                            }


                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>
</body>

</html>
@endsection
