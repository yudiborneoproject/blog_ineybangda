@extends('template_backend.home')
@section('sub-judul','Edit Tag')
@section('content')


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ Route('tag.update', $tags->id)}}" method="POST">
    @csrf
    @method('patch')
    <div class="form-group">
        <label>Edit Tag</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Tag" name="name" value="{{ $tags->name }}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block">Updata Tag</button>
    </div>
</form>



@endsection