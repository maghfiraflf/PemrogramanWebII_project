<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Riviewmu - Libraverse</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">Libraverse</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('books.riview') }}">Riviewmu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <div class="container mt-5">
    <h2 class="mb-4 text-center">Riview Buku Favoritmu</h2>
    
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
      <thead class="table-primary">
        <tr>
          <th>Cover</th>
          <th>Judul</th>
          <th>Penulis</th>
          <th>Tahun</th>
          <th>Riview</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($books as $book)
          <tr>
            <td>
              @if($book->cover)
                <img src="{{ asset('storage/covers/' . $book->cover) }}" width="80">
              @endif
            </td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->year }}</td>
            <td>{{ $book->description }}</td>
            <td>
              <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning">Edit</a>
              <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center">Belum ada riview.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</body>
</html>
