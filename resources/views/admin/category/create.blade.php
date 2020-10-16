@extends('template_backend.home')
@section('sub-judul','Tambah Kategori')
@section('content')


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ Route('category.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label>Kategori</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Kategori" name="name">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block">Simpan Kategori</button>
    </div>
</form>



@endsection