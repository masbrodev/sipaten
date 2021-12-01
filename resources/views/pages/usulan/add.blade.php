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
                        <h3 class="card-title">Tambah Usulan</h3>
                    </div>
                    <div class="card-body">
                        <form id="form-tambah" action="{{ route('usulan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Nota Dinas <span class="text-danger">*</span></label>
                                        <input type="hidden" name="kode" id="kode" value="22">
                                        <input type="text" class="form-control" name="nota_dinas" id="nota_dinas" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>berkas <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="berkas" id="berkas" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Pagu <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="pagu" id="pagu" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" id="keterangan">
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
