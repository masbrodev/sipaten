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
                        <h3 class="card-title">Edit Data BMN</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form id="form-tambah" action="{{ route('bmn.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Kode Barang</label>
                                        <input type="text" class="form-control" value="{{ $bmn->kode_barang }}" name="kode_barang" id="kode_barang" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Nama Barang</label>
                                        <input type="text" class="form-control" value="{{ $bmn->nama_barang }}" name="nama_barang" id="nama_barang" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Merk / Type</label>
                                        <input type="text" class="form-control" value="{{ $bmn->merk_type }}" name="merk_type" id="merk_type" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Tahun Peroleh</label>
                                        <input type="text" class="form-control" value="{{ $bmn->tahun_peroleh }}" name="tahun_peroleh" id="tahun_peroleh" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Kondisi</label>
                                        <input type="text" class="form-control" value="{{ $bmn->kondisi }}" name="kondisi" id="kondisi" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Lokasi</label>
                                        <input type="text" class="form-control" value="{{ $bmn->lokasi }}" name="lokasi" id="lokasi" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Pengurus</label>
                                        <input type="text" class="form-control" value="{{ $bmn->pengurus }}" name="pengurus" id="pengurus" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control" value="{{ $bmn->keterangan }}" name="keterangan" id="keterangan" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" id="tambah" name="tambah" value="Simpan" class="btn btn-success float-sm-right">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
