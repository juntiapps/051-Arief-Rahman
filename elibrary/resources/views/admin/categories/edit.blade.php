@extends('layout.app')

@section('title')
    Edit Kategori
@endsection

@section('content')
    <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_buku">ID Kategori:</label>
            <input type="text" class="form-control" name="id" value="{{$category->id}}" disabled>
        </div>
        <div class="form-group">
            <label for="nama_buku">Nama Kategori:</label>
            <input type="text" class="form-control" name="name" value="{{$category->name}}" required>
        </div>

        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
        <a type="button" class="btn btn-danger" href="{{url()->previous()}}"><i class="fas fa-times"></i> Batal</a>
    </form>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            })
        });
    </script>
@endpush
