@extends('template_backend.home')
@section('sub-judul','Post')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('post.create') }}" class="btn btn-info btn-sm my-3">Tambah Post</a>

<!-- Menarik data dari database -->
<table class="table table-striped table-sm table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Post</th>
            <th>Kategori</th>
            <th>Daftar Tags</th>
            <th>Penulis</th>
            <th>Thumbnail</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($post as $result => $nomor)
        <tr>
            <td>{{$result + $post->firstitem()}}</td>
            <td>{{ $nomor->judul }}</td>
            <td>{{ $nomor->category->name}}</td>
            <td>@foreach ($nomor->tags as $tag)
                <ul>
                    <h6><span class="badge badge-info">{{ $tag->name }}</span></h6> 
                </ul>
                @endforeach
            </td>
        <td>{{$nomor->users->name}}</td>
        <td><img src="{{ asset( $nomor->gambar )}}" class="img-fluid" style="width:100px"></td>
            <td>
            <form action="{{ route('post.destroy', $nomor->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('post.edit', $nomor->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$post->links()}}

@endsection