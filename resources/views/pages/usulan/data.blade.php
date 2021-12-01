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
                                        <th>Kode</th>
                                        <th>Nota Dinas</th>
                                        <th>Pagu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($us as $a)
                                    <tr data-toggle="modal" data-target="#edit-bmn{{$a->id}}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a->kode }}</td>
                                        <td>{{ $a->nota_dinas }}</td>
                                        <td>{{ $a->pagu }}</td>
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
