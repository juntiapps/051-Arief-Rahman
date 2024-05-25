@extends('layout.app')

@section('title')
    Daftar Kategori
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a type="button" class="btn btn-primary" href="{{route('admin.categories.create')}}"><i class="fas fa-plus"></i> Tambah</a>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('admin.categories.show', $category->id) }}" type="button" class="btn btn-secondary"><i
                                class="fas fa-eye"></i> Tampilkan</a>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" type="button" class="btn btn-warning"><i
                                class="fas fa-edit"></i> Edit</a>

                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;"
                            onsubmit="return confirmDelete()">
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
                <th>Kategori</th>
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
            return confirm('Are you sure you want to delete this user?');
        }
    </script>
@endpush
