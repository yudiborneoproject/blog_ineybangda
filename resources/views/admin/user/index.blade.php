@extends('template_backend.home')
@section('sub-judul','User')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('user.create') }}" class="btn btn-info btn-sm my-3">Tambah User</a>

<!-- Menarik data dari database -->
<table class="table table-striped table-sm table-bordered">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama User</th>
            <th scope="col">Email</th>
            <th scope="col">Type</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user as $result => $nomor)
        <tr>
            <td>{{$result + $user->firstitem()}}</td>
            <td>{{$nomor->name}}</td>
            <td>{{$nomor->email}}</td>
            <td>
                @if ($nomor->type)
                <span class="badge badge-warning">Administrator</span>
                    @else
                    <span class="badge badge-dark">Author</span>
                @endif
            </td>
        <td>
        <form action="{{ route('user.destroy', $nomor->id) }}" method="POST">
                @csrf
                @method('delete')
                <a href="{{ route('user.edit', $nomor->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$user->links()}}

@endsection