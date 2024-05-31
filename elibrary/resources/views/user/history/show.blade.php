@extends('layout.app2')

@section('title')
    Detail Riwayat
@endsection

@section('content')
    @php
        $color = '';
        $status = '';
        switch ($data['status']) {
            case 1:
                $status = 'UNVERIFIED';
                $color = 'warning';
                break;
            case 2:
                $status = 'VERIFIED';
                $color = 'success';
                break;
            case 3:
                $status = 'COMPLETED';
                $color = 'danger';
                break;
            default:
                # code...
                break;
        }
    @endphp
    <div class="p-1 m-1">
        <h4>Order ID: #{{ $data['order_id'] }}</h4>
        <h5>Order Status: <span class="badge badge-{{ $color }}">{{ $status }}</span></h5>
        <h5>Borrow - Return: {{$data['start']}} - {{$data['finish']}}</h5>
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
                @foreach ($data['data'] as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['author'] }}</td>
                        <td>{{ $item['year'] }}</td>
                        <td>1</td>
                    <tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-right">Jumlah</th>
                    <th id='jumlah'>{{ count($data['data']) }}</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Lama Pinjam</th>
                    <th>
                        <div class="row align-items-center">
                            <input type="number" name='hari' value={{ $data['days'] }} style="width: 50px;"
                                class="hari mr-2" min="2" disabled />hari
                        </div>
                    </th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Total</th>
                    <th>
                        <div class="row ">
                            <div id='total'></div>
                            <div class="mx-2">x Rp.</div>
                            <div id='harga'>{{ $data['harga'] }}</div>
                            <div class="mx-2">= Rp. </div>
                            <div id='grandtotal' class="font-weight-bold"></div>
                        </div>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
    <a type="button" class="btn btn-secondary" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i>
        Kembali</a>
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
