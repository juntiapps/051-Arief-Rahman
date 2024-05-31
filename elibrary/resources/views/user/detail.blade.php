@extends('layout.app2')

@section('title')
    Detail Buku
@endsection

@section('content')
<div class="row">
    <div class="col-auto"> <img src="{{ $book['cover'] }}" alt="{{ $book['cover'] }}" class="img-thumbnail" loading='lazy' width="210" height="290"></div>
    <div class="col">
        <table class="table">
            <tbody>
                <tr>
                    <th>ID Buku</th>
                    <td>{{ $book['id'] }}</td>
                </tr>
                <tr>
                    <th>Judul Buku</th>
                    <td>{{ $book['title'] }}</td>
                </tr>
                <tr>
                    <th>Sinopsis</th>
                    <td>{{ $book['synopsis'] }}</td>
                </tr>
                <tr>
                    <th>Pengarang</th>
                    <td>{{ $book['author'] }}</td>
                </tr>
                <tr>
                    <th>Tahun</th>
                    <td>{{ $book['year'] }}</td>
                </tr>
                <tr>
                    <th>Penerbit</th>
                    <td>{{ $book['publisher'] }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $book['category'] }}</td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td>{{ $book['stock'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- {{var_dump($user_id)}} --}}
{{-- <button type="button" class="btn btn-success"><i class="fas fa-arrow-left"></i> Kembali</button> --}}
<form action="{{ route('user.addtocart') }}" method="post" onsubmit="return confirmDelete()">
    @csrf
    <input type="hidden" value="{{$book->id}}" name="book_id"/>
    <input type="hidden" value="{{$user_id}}" name="user_id"/>
<a type="button" class="btn btn-secondary" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Kembali</a>
<button type="submit" class="btn btn-primary" @disabled($book['stock']==0)><i class="fas fa-cart-plus" ></i> Tambahkan ke Keranjang</button>
</form>

@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}">
@endpush

@push('js')
    {{-- <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
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
    </script> --}}
    <script>
        function confirmDelete() {
            return confirm('Apakah anda yakin?');
        }
    </script>
@endpush
