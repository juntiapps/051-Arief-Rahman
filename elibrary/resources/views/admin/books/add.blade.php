@extends('layout.app')

@section('title')
    Tambah Buku
@endsection

@section('content')
    <form action="" method="post">
        <div class="form-group">
            <label for="id_buku">ID Buku:</label>
            <input type="text" class="form-control" id="id_buku" name="id_buku">
        </div>
        <div class="form-group">
            <label for="nama_buku">Nama Buku:</label>
            <input type="text" class="form-control" id="nama_buku" name="nama_buku">
        </div>
        <div class="form-group">
            <label for="pengarang">Pengarang:</label>
            <input type="text" class="form-control" id="pengarang" name="pengarang">
        </div>
        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <select class="form-control" id="kategori" name="kategori[]" multiple>
                <option value="Fiksi">Fiksi</option>
                <option value="Non-Fiksi">Non-Fiksi</option>
                <option value="Komedi">Komedi</option>
                <!-- Tambahkan pilihan lainnya sesuai dengan kategori yang Anda inginkan -->
            </select>
        </div>
        <div class="form-group">
            <label for="stok">Stok:</label>
            <input type="number" class="form-control" id="stok" name="stok">
        </div>
        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

        <button type="button" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</button>
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
