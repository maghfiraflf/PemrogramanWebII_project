@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Buku</h2>
    
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 

        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title) }}" required>
        </div>

        <div class="form-group">
            <label for="author">Penulis</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $book->author) }}" required>
        </div>

        <div class="form-group">
            <label for="year">Tahun</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $book->year) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $book->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="cover">Cover (Opsional)</label>
            <input type="file" name="cover" id="cover" class="form-control">
            @if ($book->cover)
                <img src="{{ asset('storage/covers/' . $book->cover) }}" alt="Cover Buku" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Buku</button>
    </form>
</div>
@endsection
