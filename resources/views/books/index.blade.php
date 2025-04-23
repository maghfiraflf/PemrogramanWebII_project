<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Libraverse</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --main-color: #057595;
    }
    body {
      background-color: #fff;
      color: #333;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .navbar {
      background-color: var(--main-color);
    }
    .navbar-brand, .nav-link {
      color: #fff !important;
    }
    /* Hero Section - Menambah ukuran gambar agar lebih panjang */
    .hero {
      padding: 100px 50px;
      background: url('img/image1.png') no-repeat center center;
      background-size: cover;
      text-align: center;
      color: white;
      position: relative;
      z-index: 1;
      height: 95vh; /* Menentukan tinggi gambar sesuai rasio 16:9 */
    }
    .hero::before {
      content: '';
      position: absolute;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5); /* Gelapin biar teks lebih terbaca */
      z-index: -1;
    }
    .hero h1 {
      font-size: 3rem;
      font-weight: bold;
    }
    .btn-main {
      background-color: var(--main-color);
      color: #fff;
      border: none;
    }
    .btn-main:hover {
      background-color: #045f72;
    }
    /* Footer - Menambahkan margin agar footer lebih kebawah */
    footer {
      background-color: #f1f1f1;
      padding: 20px 0;
      text-align: center;
      color: #777;
      margin-top: 10px; /* Menambah margin agar footer tidak terlalu dekat dengan konten */
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">Libraverse</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <a class="nav-link" href="{{ route('books.riview') }}">Riviewmu</a>

          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h1>Selamat Datang di Libraverse</h1>
      <p class="lead">Riview buku favoritmu secara online dengan cepat dan mudah.</p>
      <a class="btn btn-primary btn-xl" href="{{ route('books.create') }}">Tambah buku favoritmu!</a>

      

    </div>
  </section>

  <div id="book-list" class="container mt-5" style="display: none;">
  <h2 class="text-center mb-4">Daftar Buku</h2>
  <div class="row">
    @forelse ($books as $book)
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          @if ($book->cover)
            <img src="{{ asset('storage/covers/' . $book->cover) }}" class="card-img-top" alt="Cover Buku">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <p class="card-text"><strong>Penulis:</strong> {{ $book->author }}</p>
            <p class="card-text"><strong>Tahun:</strong> {{ $book->year }}</p>
            <p class="card-text">{{ $book->description }}</p>
          </div>
        </div>
      </div>
    @empty
      <p class="text-center">Belum ada buku yang ditambahkan.</p>
    @endforelse
  </div>
</div>


  <!-- Footer -->
  <footer>
    <div class="container">
      &copy; 2025 Maghfira Fiolife - 22552011229.
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
  function showBooks() {
    document.getElementById('book-list').style.display = 'block';
    window.scrollTo({ top: document.getElementById('book-list').offsetTop, behavior: 'smooth' });
  }
</script>

</body>
</html>
