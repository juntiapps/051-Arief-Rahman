@extends('layout.app2')

@section('title')
    Riwayat
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-12 table-responsive">
        <table class="table table-striped" id="example1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Order ID</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><a href="{{ route('user.history.detail', $item['order_id']) }}">{{ $item['order_id'] }}</a></td>
                        @php
                            $color = '';
                            $status = '';
                            switch ($item['status']) {
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
                        <td>
                            <div class="badge badge-{{ $color }}">
                                {{ $status }}</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a type="button" class="btn btn-secondary" href="{{ route('user.home') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
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
