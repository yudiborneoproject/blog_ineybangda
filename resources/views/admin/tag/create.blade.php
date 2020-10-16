@extends('template_backend.home')
@section('sub-judul','Tambah Tag')
@section('content')


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ Route('tag.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label>Tag</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Tag" name="name">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block">Simpan Tag</button>
    </div>
</form>



@endsection