@extends('layouts.app')

@section('content_header')
@stop

@section('content')

<br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Data Pagu</h3>
                        <button type="button" class="btn btn-sm btn-outline-danger float-right" data-toggle="modal" data-target="#tambah-agenda">Tambah</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover display table-sm" id="pagu">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kode</th>
                                        <th>Uraian</th>
                                        <th>J/V</th>
                                        <th>nilai</th>
                                        <th>Pagu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pagu as $a)
                                    <tr data-toggle="modal" data-target="#edit-bmn{{$a->id}}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a->kode_pagu }}</td>
                                        <td>{{ $a->uraian }}</td>
                                        <td>{{ $a->jumlah_volume }}</td>
                                        <td>@rp( $a->nilai )</td>
                                        <td>@rp( $a->pagu_anggaran )</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="right" colspan="5">Total:</td>
                                        <td class="right">@rp($total)</td>
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