@extends('template_backend.home')
@section('sub-judul','Post dihapus')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<!-- Menarik data dari database -->
<table class="table table-striped table-sm table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Post</th>
            <th>Kategori</th>
            <th>Tags</th>
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
                    <li>{{ $tag->name }}</li>
                </ul>
                @endforeach
            </td>
        <td><img src="{{ asset( $nomor->gambar )}}" class="img-fluid" style="width:100px"></td>
            <td>
            <form action="{{route('post.kill', $nomor->id)}}" method="POST">
                    @csrf
                    @method('delete')
            <a href="{{ route('post.restore', $nomor->id)}}" class="btn btn-info btn-sm">Restore</a>
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$post->links()}}

@endsection