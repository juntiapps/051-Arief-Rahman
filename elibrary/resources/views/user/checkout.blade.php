@extends('layout.app2')

@section('title')
    Check Out
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
    <form action="{{ route('user.sendcheckout') }}" method="post" onsubmit="return confirmDelete()">
        @csrf
        <input type="hidden" name='order_id' value="{{ $order_id }}">
        <input type="hidden" name='tr_id' value="{{ $tr_id }}">
        <div class="p-1 m-1">
            <h4>Order ID: #{{ $order_id }}</h4>
        </div>
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Tahun</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['title'] }}</td>
                            <td>{{ $item['author'] }}</td>
                            <td>{{ $item['year'] }}</td>
                            <td>{{ $item['jumlah'] }}</td>
                        <tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-right">Jumlah</th>
                        <th id='jumlah'>{{ count($carts) }}</th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">Lama Pinjam</th>
                        <th>
                            <div class="row align-items-center">
                                <input type="number" name='hari' value='2' style="width: 50px;" class="hari mr-2"
                                    min="2" />hari
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">Total</th>
                        <th>
                            <div class="row ">
                                <div id='total'></div>
                                <div class="mx-2">x Rp.</div>
                                <div id='harga'>{{ $harga }}</div>
                                <div class="mx-2">= Rp. </div>
                                <div id='grandtotal' class="font-weight-bold"></div>
                            </div>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-cart-plus"></i> Kirim</button>

    </form>
    {{-- {{var_dump($user_id)}} --}}
    {{-- <button type="button" class="btn btn-success"><i class="fas fa-arrow-left"></i> Kembali</button> --}}
    {{-- <form action="{{ route('user.addtocart') }}" method="post" onsubmit="return confirmDelete()">
    @csrf
    <input type="hidden" value="{{$book->id}}" name="book_id"/>
    <input type="hidden" value="{{$user_id}}" name="user_id"/>
<a type="button" class="btn btn-secondary" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Kembali</a>
<button type="submit" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Tambahkan ke Keranjang</button>
</form> --}}
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


        $(document).ready(function() {
            // let jumlah = $("#jumlah").text()
            // let hari = $(".hari").val()
            // let harga = $("#harga").text()
            // $("#total").text(jumlah * hari)
            // $("#grandtotal").text(jumlah * hari *harga)
            calculate()

            $(".hari").change(function() {
                calculate();
                // let jumlah = $("#jumlah").text()
                // let hari = $(".hari").val()
                // let harga = $("#harga").text()
                // $("#total").text(jumlah * hari)
                // $("#grandtotal").text(jumlah * hari *harga)
            });
        });

        function calculate() {
            let jumlah = $("#jumlah").text()
            let hari = $(".hari").val()
            let harga = $("#harga").text()
            $("#total").text(jumlah * hari)
            $("#grandtotal").text(jumlah * hari * harga)
        }
    </script>
@endpush
