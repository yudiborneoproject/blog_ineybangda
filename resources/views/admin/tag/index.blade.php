@extends('template_backend.home')
@section('sub-judul','Tag')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('tag.create') }}" class="btn btn-info btn-sm my-3">Tambah Tag</a>

<!-- Menarik data dari database -->
<table class="table table-striped table-sm table-bordered">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama tag</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tag as $result => $nomor)
        <tr>
            <td>{{$result + $tag->firstitem()}}</td>
            <td>{{$nomor->name}}</td>
        <td>
        <form action="{{ route('tag.destroy', $nomor->id) }}" method="POST">
                @csrf
                @method('delete')
                <a href="{{ route('tag.edit', $nomor->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$tag->links()}}

@endsection