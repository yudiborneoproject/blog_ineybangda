@extends('template_backend.home')
@section('sub-judul','Tambah User')
@section('content')


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ Route('user.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label>Nama User</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama user" name="name">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control @error('name') is-invalid @enderror" placeholder="Email" name="email">
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>Type User</label>
        <select class="form-control" name="type">
            <option value="" holder>Pilih Type User</option>
            <option value="1" holder>Administrator</option>
            <option value="0" holder>Author</option>
        </select>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password">
        
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Simpan User</button>
    </div>
</form>



@endsection