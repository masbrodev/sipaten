@extends('layouts.app')

@section('content_header')
@stop

@section('content')
@section('plugins.Datatables', true)
<br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Data BMN</h3>
                        <button type="button" class="btn btn-sm btn-outline-danger float-right" data-toggle="modal" data-target="#tambah-agenda">Tambah</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover display table-sm" id="sp">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kode Pagu</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk / Type </th>
                                        <th>Tahun Peroleh</th>
                                        <th>Kondisi</th>
                                        <th>Lokasi</th>
                                        <th>Pengurus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bmn as $a)
                                    <tr onclick="window.location.href=`{{ route('bmn.show', $a->id) }}`">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a->kode_pagu }}</td>
                                        <td>{{ $a->kode_barang }}</td>
                                        <td>{{ $a->nama_barang }}</td>
                                        <td>{{ $a->merk_type }}</td>
                                        <td>{{ $a->tahun_peroleh }}</td>
                                        <td>{{ $a->kondisi }}</td>
                                        <td>{{ $a->lokasi }}</td>
                                        <td>{{ $a->pengurus }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('adminlte_js')
<script>
    $(function() {
        $("#sp").DataTable({
            language: {
                search: 'Cari:',
                previous: 'Cari:',
                lengthMenu: 'Tampilkan _MENU_ baris',
                zeroRecords: 'Data Tidak Ditemukan',
                info: 'Total data _MAX_',
                infoEmpty: 'Data Kosong',
                infoFiltered: '(filtered from _MAX_ total records)'
            },
        });
    });
</script>
@endsection
