@extends('layout.app')

@section('title')
    Daftar Peminjaman
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{-- <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button> --}}
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Order ID</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($histories as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['order_id'] }}</td>
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
                    <td>
                        <a href="{{ route('admin.transactions.show', $item['order_id']) }}" type="button"
                            class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Tampilkan</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Order ID</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
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
