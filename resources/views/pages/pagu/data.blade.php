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
                        <h3 class="card-title"> Data Pagu</h3>
                        <button type="button" class="btn btn-sm btn-outline-danger float-right" data-toggle="modal" data-target="#tambah-agenda">Tambah</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover display table-sm" id="sp">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kode Pagu</th>
                                        <th>Uraian</th>
                                        <th>QTY</th>
                                        <th>Jenis</th>
                                        <th>Nilai</th>
                                        <th>Pagu</th>
                                        <th>Realisasi</th>
                                        <th>Sisa</th>
                                        <th>Diperbaharui</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pagu as $a)
                                    <tr onclick="window.location.href=`{{ route('pagu.show',$a['id']) }}`">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a['kode_pagu'] }}</td>
                                        <td>{{ $a['uraian'] }}</td>
                                        <td>{!! $a['jumlah_volume'] == $a['jumlah_bmn'] ? $a['jumlah_volume'] : $a['jumlah_volume'] ."||". "<i class='fas fa-exclamation-circle' style='color: red;'></i>".$a['jumlah_bmn'] !!}</td>
                                        <td>{{ $a['jenis_volume'] }}</td>
                                        <td>@rp( $a['nilai'] )</td>
                                        <td>@rp( $a['pagu_anggaran'] )</td>
                                        <td>@rp( $a['realisasi'] )</td>
                                        <td>@rp( $a['sisa'] )</td>
                                        <td>{{ $a['diperbaharui'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="right" colspan="5"></td>
                                        <td class="right" colspan=""><b>Total:</b></td>
                                        <td class="right"><b>@rp($total_pagu)</b></td>
                                        <td class="right"><b>@rp($total_realisasi)</b></td>
                                        <td class="right"><b>@rp($total_pagu - $total_realisasi)</b></td>
                                        <td class="right"></td>
                                    </tr>
                                </tfoot>
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

</script>
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
