@extends('layouts.app')

@section('content_header')
@stop

@section('content')
@section('plugins.Dropzone', true)
@section('plugins.LoadingOverlay', true)
@section('plugins.Select2', true)

<br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Usulan</h3>
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
                                            @foreach($bmn as $a)
                                            <option value="{{ $a->id }}">{{ $a->kode_barang }} | {{ $a->nama_barang }} | {{ $a->merk_type }} | {{ $a->lokasi }} | {{ $a->pengurus }} | {{ $a->keterangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Nota Dinas<span class="text-danger">*</span></label>
                                        <input type="hidden" name="kode_usulan" id="kode_usulan" value="US{{rand()}}">
                                        <input type="text" class="form-control" name="nota_dinas" id="nota_dinas" oninvalid="this.setCustomValidity('Lengkapi Inputan')" required="" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" id="keterangan">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Berkas</label>
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
    $(document).ready(function() {
        $('.custom-select').select2();
    });

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
            $("#form-tambah").submit(function() {
                $.ajax({
                    async: true,
                    url: "{{ route('usulan.store') }}",
                    type: 'POST',
                    data: {
                        'bmn_id': $('#bmn_id').val(),
                        'user_id': '{{Auth::id()}}',
                        'kode_usulan': $('#kode_usulan').val(),
                        'nota_dinas': $('#nota_dinas').val(),
                        'nilai': $('#nilai').val(),
                        'keterangan': $('#keterangan').val(),
                        'status': 'proses',
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
                        window.location.href = "{{ route('usulan.index') }}";
                    },
                    error: function(error) {
                        $.LoadingOverlay("hide");
                        console.log(error);
                    }
                })
            });

            this.on("addedfile", function(file) {
                if (!file.type.match(/image.*/)) {
                    myDropzone.emit("thumbnail", file, "/pdf.png");
                }
            });


            this.on('sending', function(file, xhr, formData) {
                formData.append('id', '{{ $id }}');
                console.log(file)
            });

            this.on('complete', function() {
                if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                    var _this = this;
                    _this.removeAllFiles();
                    $.LoadingOverlay("hide");
                    window.location.href = "{{ route('usulan.index') }}";

                }
            });
        }
    };
</script>
@endsection
