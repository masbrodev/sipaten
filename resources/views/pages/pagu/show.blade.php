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
                        <h3 class="card-title">Pagu {{ $pagu->kode_pagu }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Uraian</label>
                                    <input type="text" class="form-control" name="uraian" id="uraian" disabled value="{{ $pagu->uraian }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Kode</label>
                                    <input type="text" class="form-control" name="kode_pagu" id="kode_pagu" disabled value="{{ $pagu->kode_pagu }}">
                                </div>
                                <div class="col-sm-6">
                                    <label>Jenis Volume (singkatan)</label>
                                    <input type="text" class="form-control" name="jenis_volume" id="jenis_volume" disabled value="{{ $pagu->jenis_volume }}">
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Jumlah Volume</label>
                                    <input type="text" class="form-control" name="jumlah_volume" id="jumlah_volume" disabled value="{{ $pagu->jumlah_volume }}">
                                </div>
                                <div class="col-sm-6">
                                    <label>Nilai (satuan)</label>
                                    <input type="text" class="form-control" name="nilai" id="nilai" disabled value="{{ $pagu->nilai }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Pagu Anggaran</label>
                                    <input type="text" class="form-control" name="pagu_anggaran" id="pagu_anggaran" disabled value="{{ $pagu->pagu_anggaran }}">
                                </div>
                                <div class="col-sm-6">
                                    <label>Sisa</label>
                                    <input type="text" class="form-control" name="sisa" id="sisa" disabled value="{{ $pagu->sisa }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('pagu.destroy', $pagu->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="text-right">
                                <div class="btn-group">
                                    <a class="btn btn-outline-success" href="{{ route('pagu.edit', $pagu->id) }}"><i class="fa fa-cog"></i> Edit</a>
                                    <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i> Hapus</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title"> Data Transaksi </h3>
                        <button type="button" class="btn btn-sm btn-outline-danger float-right" data-toggle="modal" data-target="#tambah-agenda">Tambah</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover display table-sm" id="pagu">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kode Transaksi</th>
                                        <th>Kode Pagu</th>
                                        <th>Dari</th>
                                        <th>Jenis</th>
                                        <th>Status</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transaksi as $a)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a->kode_transaksi }}</td>
                                        <td>{{ $a->kode_pagu }}</td>
                                        <td>{{ $a->user->name }}</td>
                                        <td>{{ $a->jenis }}</td>
                                        <td>{{ $a->status }}</td>
                                        <td>{{ $a->nilai }}</td>
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
