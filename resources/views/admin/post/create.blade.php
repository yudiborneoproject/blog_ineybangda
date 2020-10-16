@extends('template_backend.home')
@section('sub-judul','Tambah Post')
@section('content')


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ Route('post.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Judul</label>
        <input type="text" class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan Judul" name="judul">
        @error('judul')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
            <option value="" holder>Pilih Kategori</option>
            @foreach ($category as $result)
        <option value="{{ $result->id }}">{{ $result->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Pilih Tags</label>
        <select class="form-control select2" multiple="" name="tags[]">
            @foreach ($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Konten</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content"></textarea>
        @error('content')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Thumbnail</label>
        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
        @error('gambar')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block">Simpan Post</button>
    </div>
</form>



@endsection