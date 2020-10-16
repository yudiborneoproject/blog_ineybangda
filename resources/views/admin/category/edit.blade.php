@extends('template_backend.home')
@section('sub-judul','Edit Kategori')
@section('content')


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ Route('category.update', $category->id)}}" method="POST">
    @csrf
    @method('patch')
    <div class="form-group">
        <label>Edit Kategori</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Kategori" name="name" value="{{ $category->name }}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block">Update Kategori</button>
    </div>
</form>



@endsection