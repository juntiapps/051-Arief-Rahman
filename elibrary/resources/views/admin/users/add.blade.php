@extends('layout.app')

@section('title')
    Tambah Anggota
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.users.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="nama_buku">Nama :</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="pengarang">Email:</label>
            <input type="text" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label for="kategori">Role:</label>
            <select class="form-control" name="role" required>
                <option value="0">Admin</option>
                <option value="1">User</option>
                <!-- Tambahkan pilihan lainnya sesuai dengan kategori yang Anda inginkan -->
            </select>
        </div>

        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
        <a type="button" class="btn btn-danger" href="{{ url()->previous() }}"><i class="fas fa-times"></i> Batal</a>
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
