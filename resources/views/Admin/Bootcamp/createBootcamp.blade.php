@extends('template.base')

@section('title', 'Form Bootcamp')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Bootcamp</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="">Data Bootcamp</a></li>
                    <li class="breadcrumb-item active">Form Bootcamp</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- ENd Header -->

<!-- Main Content -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('Bootcamp.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama bootcamp</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama Bootcamp ...">
                                @error('nama')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">Image Bootcamp</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" class="custom-file-input  @error('thumbnail') is-invalid @enderror" id="thumbnail">
                                        <label class="custom-file-label" for="thumbnail">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    @error('thumbnail')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message}}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kategori_id">Kategori Bootcamp</label>
                                <select class="custom-select form-control-border  @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori_id">
                                    <option value="">Pilih Kategori Bootcamp</option>
                                    @foreach($kategori as $row)
                                    <option value="{{ $row->id }}" {{ old('kategori_id') == $row->id ? 'selected' : '' }}> {{$row->kategori}} </option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="mentor_id">Nama Mentor</label>
                                <select class="custom-select form-control-border  @error('mentor_id') is-invalid @enderror" name="mentor_id" id="mentor_id">
                                    <option value="">Pilih Nama Mentor</option>
                                    @foreach($mentor as $row)
                                    <option value="{{ $row->id }}" {{ old('mentor_id') == $row->id ? 'selected' : '' }}> {{$row->name}} </option>
                                    @endforeach
                                </select>
                                @error('mentor_id')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukkan harga Bootcamp ...">
                                @error('harga')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kuota">Kuota</label>
                                <input type="text" name="kuota" class="form-control @error('kuota') is-invalid @enderror" id="kuota" placeholder="Masukkan kuota Bootcamp ...">
                                @error('kuota')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi bootcamp</label>
                                <textarea class="form-control  @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" placeholder="Enter Article ..."></textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</section>

<!-- End Main Content -->

@endsection

@section('ckEditor')
<script>
    ClassicEditor
        .create(document.querySelector('#artikel'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection