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
                        <h3 class="card-title">Tambah Pagu</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form id="form-tambah" action="{{ route('pagu.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Uraian<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="uraian" id="uraian" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                <div class="col-sm-6">
                                        <label>Kode<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="kode_pagu" id="kode_pagu" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Jenis Volume (singkatan)<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="jenis_volume" id="jenis_volume" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                <div class="col-sm-6">
                                        <label>Jumlah Volume<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="jumlah_volume" id="jumlah_volume" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Nilai (satuan)<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="nilai" id="nilai" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <span style="color: red;">* Wajib diisi</span>
                        <input type="submit" id="tambah" name="tambah" value="Simpan" class="btn btn-success float-sm-right">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
