<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SIDUMAS</title>
  
  <style>
    .thead{
    background-color: #FEB139;
    color: #ffffff;
    
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="title text-center mb-5">
      <h2>Laporan Pengaduan SIDUMAS</h2>
    </div>
    <table class="table table-bordered">
      <thead class="thead">
        <tr class="">
          <th scope="col">No</th>
          <th scope="col">Username</th>
          <th scope="col">Pengaduan</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Tingkatan</th>
          <th scope="col">Status</th>
          <th scope="col">Penindaklanjut</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach($pengaduan as $item)
          
        <tr>
          <td>{{ $item->id }} </td>
          <td>{{ $item->user->username }}</td>
          <td>{{ $item->description }}</td>
          <td>{{ $item->created_at->format('l, d F Y') }}</td>
          <td>{{ $item->tingkatan->keterangan }}</td>
          <td>{{ $item->status }}</td>
          @if ($item->status !='Belum di Proses')
          <td>{{ $item->bidang->nama_bidang }}</td>
          @endif

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>