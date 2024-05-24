@extends('layout.app')

@section('title')
    Hapus Buku
@endsection

@section('content')
    <h1>Apakah Anda Yakin</h1>

    <button type="button" class="btn btn-danger"><i class="fas fa-times"></i> Hapus</button>
    <button type="button" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Batal</button>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}">
    <style>
        .tabb {
            display: inline-block;
            width: :200px
        }
    </style>
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
