@extends('layouts.app')

@section('content_header')
@stop

@section('content')
@section('plugins.Dropzone', true)
@section('plugins.LoadingOverlay', true)

<br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Data Usulan <b>{{ $us->kode_usulan }}</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Dari</label>
                                    <input type="text" class="form-control" disabled value="{{ $user->name }}">
                                </div>
                                <div class="col-sm-6">
                                    <label>UKE 2</label>
                                    <input type="text" class="form-control" disabled value="{{ $user->uke }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <form id="form-show" action="{{ route('usulan.update', $us->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Kategori BMN</label>
                                        <input type="text" class="form-control" disabled value="{{ $bmnfix->id }} | {{ $bmnfix->kode_barang }} | {{ $bmnfix->nama_barang }} | {{ $bmnfix->merk_type }} | {{ $bmnfix->lokasi }} | {{ $bmnfix->pengurus }} | {{ $bmnfix->keterangan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Nota Dinas</label>
                                        <input type="text" class="form-control" disabled value="{{ $us->nota_dinas }}" name="nota_dinas" id="nota_dinas">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Nilai </label>
                                        <input type="text" class="form-control"{{ $us->status == 'diterima' || $us->status == 'selesai' || $us->status == 'ditolak' ? 'disabled' : '' }} value="{{ $us->nilai }}" name="nilai" id="nilai">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control" disabled value="{{ $us->keterangan }}" name="keterangan" id="keterangan">
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user()->role == 'a')
                            <hr>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Status</label>
                                        <select class="custom-select" name="status" id="status" {{ $us->status == 'selesai' || $us->status == 'ditolak' ? 'disabled' : '' }}>
                                            <option selected value="proses">Prores</option>
                                            <option value="diterima" {{ $us->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                            <option value="ditolak" {{ $us->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                            <option value="selesai" {{ $us->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Tindak Lanjut</label>
                                        <input type="text" class="form-control" value="{{ $us->tindak_lanjut }}" name="tindak_lanjut" id="tindak_lanjut" {{ $us->status == 'selesai' || $us->status == 'ditolak' ? 'disabled' : '' }}>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="text-center">@if(count($berkas) == 0) Berkas Tidak Ada @else Berkas @endif</h4>
                                            <hr>
                                            <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                                                @foreach($berkas as $b)
                                                <li>
                                                    <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                                                    <div class="mailbox-attachment-info">
                                                        <a href="{{URL::to( 'berkas/' . $b->lokasi .'/'. $b->nama_berkas)}}" target="_blank" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i>{{ Str::of($b->nama_berkas)->afterLast('_BC_')}}</a>
                                                        <span class="mailbox-attachment-size clearfix mt-1">
                                                            <span>file PDF </span>
                                                            <a href="{{URL::to( 'berkas/' . $b->lokasi .'/'. $b->nama_berkas)}}" download="{{ Str::of($b->nama_berkas)->afterLast('_BC_')}}" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                                        </span>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <div class="btn-group">
                                <input type="{{ $us->status == 'selesai' || $us->status == 'ditolak' ? 'hidden' : 'submit' }}" form="form-show" id="tambah" name="tambah" value="Simpan" class="btn btn-outline-success">
                                <a class="btn btn-outline-secondary" href="{{ url()->previous() }}"><i class="fa fa-cog"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
