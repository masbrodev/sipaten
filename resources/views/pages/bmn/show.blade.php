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
                        <h3 class="card-title">Data BMN {{ $bmn->kode_barang }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Kode Barang</label>
                                    <input type="text" class="form-control" value="{{ $bmn->kode_barang }}" name="kode_barang" id="kode_barang" disabled>
                                </div>
                                <div class="col-sm-6">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" value="{{ $bmn->nama_barang }}" name="nama_barang" id="nama_barang" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Merk / Type</label>
                                    <input type="text" class="form-control" value="{{ $bmn->merk_type }}" name="merk_type" id="merk_type" disabled>
                                </div>
                                <div class="col-sm-6">
                                    <label>Nilai</label>
                                    <input type="text" class="form-control" value="{{ $bmn->nilai }}" name="nilai" id="nomor_agenda" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Tahun Peroleh</label>
                                    <input type="text" class="form-control" value="{{ $bmn->tahun_peroleh }}" name="tahun_peroleh" id="tahun_peroleh" disabled>
                                </div>
                                <div class="col-sm-6">
                                    <label>Kondisi</label>
                                    <input type="text" class="form-control" value="{{ $bmn->kondisi }}" name="kondisi" id="kondisi" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Lokasi</label>
                                    <input type="text" class="form-control" value="{{ $bmn->lokasi }}" name="lokasi" id="lokasi" disabled>
                                </div>
                                <div class="col-sm-6">
                                    <label>Pengurus</label>
                                    <input type="text" class="form-control" value="{{ $bmn->pengurus }}" name="pengurus" id="pengurus" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Pagu</label>
                                    <input type="text" class="form-control" value="{{ $bmn->pagu }}" name="pagu" id="pagu" disabled>
                                </div>
                                <div class="col-sm-6">
                                    <label>Keterangan</label>
                                    <input type="text" class="form-control" value="{{ $bmn->keterangan }}" name="keterangan" id="keterangan" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('bmn.destroy', $bmn->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="btn-group">
                                <a class="btn btn-outline-success" href="{{ route('bmn.edit', $bmn->id) }}"><i class="fa fa-cog"></i> Edit</a>
                                <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i> Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
