@extends('layouts.app')

@section('content_header')
@stop

@section('content')

<br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Data Usulan</h3>
                        <button type="button" class="btn btn-sm btn-outline-danger float-right" data-toggle="modal" data-target="#tambah-agenda">Tambah</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover display table-sm" id="tiket">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kode BMN</th>
                                        <th>Kode Usulan</th>
                                        <th>Dari</th>
                                        <th>Nota Dinas</th>
                                        <th>Nilai</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($us as $a)
                                    <tr onclick="window.location.href=`{{ route('usulan.show', $a->id) }}`">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a->bmn->kode_barang }}</td>
                                        <td>{{ $a->kode_usulan }}</td>
                                        <td>{{ $a->user->name }}</td>
                                        <td>{{ $a->nota_dinas }}</td>
                                        <td>{{ $a->nilai }}</td>
                                        <td>{{ $a->keterangan }}</td>
                                        <td>{{ $a->status }}</td>
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
