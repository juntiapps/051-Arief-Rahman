@extends('layout.app')

@section('title')
    Daftar Buku
@endsection

@section('content')
    <a href="/books/add" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->index + 1}}</td>
                    <td>{{ $book['id'] }}</td>
                    <td>{{ $book['title'] }}</td>
                    <td>{{ $book['author'] }}</td>
                    <td>{{ $book['stock'] }}</td>
                    <td>{{ $book['category'] }}</td>
                    <td>
                        <a href="/books/show" type="button" class="btn btn-secondary"><i class="fas fa-eye"></i> Tampilkan</a>
                        <a href="/books/edit" type="button" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <a href="/books/delete" type="button" class="btn btn-danger"><i class="fas fa-times"></i> Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
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
