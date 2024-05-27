@extends('layout.app2')

@section('title')
    Daftar Buku
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        @foreach ($books as $index => $book)
            <div class="col-md-3 mb-4">
                <a href="{{ route('user.detail', $book['id']) }}">
                    <img src="{{ $book['cover'] }}" alt="{{ $book['cover'] }}" class="img-thumbnail" loading='lazy'
                        width="210" height="290">
                    <div class="ellipsis px-2">
                        {{ $book['title'] }}
                    </div>
                    <div class="elipsis text-secondary px-2">
                        {{ $book['author'] }}
                    </div>
                </a>
            </div>
            @if (($index + 1) % 4 == 0)
    </div>
    <div class="row">
        @endif
        @endforeach
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}">
    <style>
        .ellipsis {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 210px
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
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this user?');
        }
    </script>
@endpush
