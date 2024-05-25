@extends('layout.app')

@section('title')
    Edit Buku
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
    <form action="{{ route('admin.books.update', $book->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_buku">ID Buku:</label>
            <input type="text" class="form-control" name="id" value="{{$book->id}}" disabled>
        </div>
        <div class="form-group">
            <label for="nama_buku">Judul:</label>
            <input type="text" class="form-control" id="nama_buku" name="title" value="{{$book->title}}" required>
        </div>
        <div class="form-group">
            <label for="pengarang">Pengarang:</label>
            <input type="text" class="form-control" id="pengarang" name="author" value="{{$book->author}}" required>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <div class="row">
                @foreach ($categories as $index => $category)
                    <div class="col-md-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" @checked(in_array($category->id,$cat_checked))>
                            <label class="form-check-label">
                                {{ $category->name }}
                            </label>
                        </div>
                    </div>
                    @if (($index + 1) % 6 == 0)
            </div>
            <div class="row">
                @endif
                @endforeach
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" class="form-control" id="stok" name="stock" value="{{$book->stock}}" required>
            </div>
            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
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
