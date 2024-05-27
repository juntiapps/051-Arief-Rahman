@extends('layout.app')

@section('title')
    Daftar Buku
@endsection

@section('content')
    {{-- {{var_dump($categories->a}} --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('admin.books.create') }}" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Tahun</th>
                <th>Penerbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author}}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        <a href="{{ route('admin.books.show', $book->id) }}" type="button" class="btn btn-secondary"><i
                                class="fas fa-eye"></i> Tampilkan</a>
                        <a href="{{ route('admin.books.edit', $book->id) }}" type="button" class="btn btn-warning"><i
                                class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST"
                            style="display:inline;" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Tahun</th>
                <th>Penerbit</th>
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
    <script>
        function confirmDelete() {
            return confirm('Apakah anda yakin?');
        }
    </script>
@endpush
