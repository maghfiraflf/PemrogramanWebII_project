<!-- resources/views/books/create.blade.php -->

<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Buku - Libraverse</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --main-color: #057595;
    }
    body {
      background-color: #fff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .navbar {
      background-color: var(--main-color);
    }
    .navbar-brand, .nav-link {
      color: #fff !important;
    }
    .form-container {
      margin-top: 50px;
      padding: 30px;
      background-color: #f8f9fa;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .btn-main {
      background-color: var(--main-color);
      color: #fff;
      border: none;
    }
    .btn-main:hover {
      background-color: #045f72;
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="{{ route('books.index') }}">Libraverse</a>
    </div>
  </nav>

  <div class="container">
    <div class="form-container mt-5">
      <h2 class="mb-4 text-center">Riview Buku Favoritmu!</h2>

      <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Judul Buku</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
          <label for="author" class="form-label">Penulis</label>
          <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="mb-3">
          <label for="year" class="form-label">Tahun Terbit</label>
          <input type="number" class="form-control" id="year" name="year" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Riview</label>
          <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <div class="mb-3">
           <label for="cover" class="form-label">Cover Buku</label>
           <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
        </div>


        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>

</body>
</html>
