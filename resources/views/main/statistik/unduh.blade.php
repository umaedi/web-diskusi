<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Unduh topik diskusi</title>
  </head>
  <body>
    <div class="card">
      <div class="card-body">
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Topik diskusi</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Konten</th>
                  <th scope="col">View</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($diskusi as $key => $item)
                <tr>
                  <th scope="row">{{ $key + 1 }}</th>
                  <td>{{ $item->judul }}</td>
                  <td>{{ $item->kategori->nama_kategori }}</td>
                  <td>{{ $item->konten }}</td>
                  <td>{{ $item->view }}</td>
                </tr>
                @endforeach
              </tbody>
          </table>
      </div>
  </div>
  <script type="text/javascript">
    window.print();
  </script>
</body>
</html>