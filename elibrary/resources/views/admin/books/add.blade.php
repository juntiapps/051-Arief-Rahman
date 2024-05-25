@extends('layout.app')

@section('title')
    Tambah Buku
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
    <form action="{{ route('admin.books.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nama_buku">Judul:</label>
            <input type="text" class="form-control" id="nama_buku" name="title" required>
        </div>
        <div class="form-group">
            <label for="pengarang">Pengarang:</label>
            <input type="text" class="form-control" id="pengarang" name="author" required>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori:</label>
            {{-- <select class="form-control" id="kategori" name="kategori[]" multiple>
                <option value="Fiksi">Fiksi</option>
                <option value="Non-Fiksi">Non-Fiksi</option>
                <option value="Komedi">Komedi</option>
                <!-- Tambahkan pilihan lainnya sesuai dengan kategori yang Anda inginkan -->
            </select> --}}
            <div class="row">
                @foreach ($categories as $index => $category)
                    <div class="col-md-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}">
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
                <input type="number" class="form-control" id="stok" name="stock" required>
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
