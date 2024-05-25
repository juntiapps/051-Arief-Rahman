@extends('layout.app')

@section('title')
    Detail Kategori
@endsection

@section('content')
    <table class="table">
        <tbody>
            <tr>
                <th>ID Kategori</th>
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <th>Nama Kategori</th>
                <td>{{ $category->name }}</td>
            </tr>
        </tbody>
    </table>
    <a type="button" class="btn btn-success" href="{{url()->previous() }}"><i class="fas fa-arrow-left"></i> Kembali</a>
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
