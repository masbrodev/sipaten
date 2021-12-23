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
                        <h3 class="card-title">Edit Usulan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form id="form-tambah" action="javascript:$.LoadingOverlay('show');" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Pilih BMN<span class="text-danger">*</span></label>
                                        <select class="custom-select" name="bmn_id" id="bmn_id">
                                            <option selected value="{{ $bmnfix->id }}">{{ $bmnfix->id }} | {{ $bmnfix->kode_barang }} | {{ $bmnfix->nama_barang }} | {{ $bmnfix->merk_type }} | {{ $bmnfix->lokasi }} | {{ $bmnfix->pengurus }} | {{ $bmnfix->keterangan }}</option>
                                            @foreach($bmn as $a)
                                            <option value="{{ $a->id }}">{{ $a->kode_barang }} | {{ $a->nama_barang }} | {{ $a->merk_type }} | {{ $a->lokasi }} | {{ $a->pengurus }} | {{ $a->keterangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Nota Dinas<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{ $us->nota_dinas }}" name="nota_dinas" id="nota_dinas" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Nilai</label>
                                        <input type="text" class="form-control" value="{{ $us->nilai }}" name="nilai" id="nilai">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control" value="{{ $us->keterangan }}" name="keterangan" id="keterangan">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Berkas</label>
                                    @if(count($berkas) != 0)
                                    <br>
                                    <button type="button" class="btn btn-outline-danger float-sm-right" data-toggle="modal" data-target="#opsi-berkas">Opsi Berkas</button>
                                    @endif
                                    <form id="dropzoneForm" class="dropzone" action="{{ route('uberkas.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span style="color: red;">* Wajib diisi</span>
                        <input type="submit" form="form-tambah" id="tambah" name="tambah" value="Simpan" class="btn btn-success float-sm-right">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="opsi-berkas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Opsi Berkas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                    @foreach($berkas as $b)
                    <li>
                        <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                        <div class="mailbox-attachment-info">
                            <a href=" {{URL::to( 'berkas/' . $b->lokasi .'/'. $b->nama_berkas)}}" target="_blank" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i>{{ Str::of($b->nama_berkas)->afterLast('_BU_') }}</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                                <span>Hapus File</span>
                                <a href=" {{ route('uberkas.edit', $b->id)}} " class="btn btn-outline-danger btn-sm float-right"><i class="fas fa-trash"></i></a>
                            </span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
    <!-- /.modal-content -->
</div>

@endsection
@section('adminlte_css')

<style>
    .dz-image img {
        width: 100%;
        height: 100%;
    }

    .dropzone.dz-started .dz-message {
        display: block !important;
    }

    .dropzone {
        border: 2px dashed #dc3545 !important;
        color: red;
    }

    .dropzone i {
        font-size: 5rem;
    }

    .dropzone .dz-preview.dz-complete .dz-success-mark {
        opacity: 1;
    }

    .dropzone .dz-preview.dz-error .dz-success-mark {
        opacity: 0;
    }

    .dropzone .dz-preview .dz-error-message {
        top: 144px;
    }
</style>
@endsection

@section('adminlte_js')


<script>
    Dropzone.options.dropzoneForm = {
        autoProcessQueue: false,
        acceptedFiles: ".pdf",
        addRemoveLinks: false,
        parallelUploads: 5,
        removedfile: function(file) {
            file.previewElement.remove();
        },

        init: function() {
            myDropzone = this;

            $.ajax({
                url: "{{ route('uberkas.show', $us->id) }}",
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    $.each(data, function(key, value) {

                        var file = {
                            name: value.name,
                            size: value.size
                        };
                        myDropzone.options.addedfile.call(myDropzone, file);
                        myDropzone.options.thumbnail.call(myDropzone, file, "/pdf.png");
                        // myDropzone.emit("complete", file);
                    });
                },

                error: function(error) {
                    console.log(error);
                }

            });

            $("#form-tambah").submit(function() {
                $.ajax({
                    async: true,
                    url: "{{ route('usulan.update', $us->id) }}",
                    type: 'POST',
                    data: {
                        'bmn_id': $('#bmn_id').val(),
                        'user_id': '{{ Auth::user()->id}}',
                        'kode_usulan': $('#kode_usulan').val(),
                        'nota_dinas': $('#nota_dinas').val(),
                        'nilai': $('#nilai').val(),
                        'keterangan': $('#keterangan').val(),
                        'status': 'proses',
                        '_method': 'PUT',
                        '_token': '{{ csrf_token() }}',
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        $.LoadingOverlay("show");
                        myDropzone.processQueue();
                    },
                    success: function() {
                        $.LoadingOverlay("hide");
                        window.location.href = "{{ route('usulan.show', $us->id) }}";
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            });


            this.on('sending', function(file, xhr, formData) {
                formData.append('id', '{{ $us->id }}');
                console.log(file)
            });

            this.on('complete', function() {
                if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                    var _this = this;
                    _this.removeAllFiles();
                    $.LoadingOverlay("hide");
                    window.location.href = "{{ route('usulan.show', $us->id) }}";

                }
            });

            this.on('error', function(file, errormessage, xhr) {
                $.LoadingOverlay("hide");
                console.log(errormessage);
                toastr.error('Gagal memperbarui data');
            });
        }
    };
</script>
@endsection
