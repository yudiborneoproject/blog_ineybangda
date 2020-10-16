@extends('template_backend.home')
@section('sub-judul','Edit User')
@section('content')


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ Route('user.update', $user->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nama User</label>
    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="{{ $user->email }}"readonly>
    </div>
    <div class="form-group">
        <label>Type User</label>
        <select class="form-control" name="type">
            <option value="" holder>Pilih Type User</option>
            <option value="1" 
            @if ($user->type == 1)
                selected
            @endif>Administrator</option>
            <option value="0" 
            @if ($user->type == 0)
            selected
            @endif>
            >Author</option>
        </select>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password">
        
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Update User</button>
    </div>
</form>



@endsection