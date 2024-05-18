@extends('template.base')

@section('title', 'Form Edit Bootcamp')

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
                    <li class="breadcrumb-item active"><a href="{{ route('admin.index.bootcamp')}}">Data Bootcamp</a></li>
                    <li class="breadcrumb-item active">Form Edit Bootcamp</li>
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
                    <form action="{{ route('Bootcamp.update', $bootcamp->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama Bootcamp</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"  value="{{$bootcamp->nama}}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>    
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">img Bootcamp</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" class="custom-file-input  @error('thumbnail') is-invalid @enderror" id="thumbnail" value="{{$bootcamp->thumbnail}}">
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
                                    <option value="{{$bootcamp->kategori_id}}">{{ $bootcamp->kategori->kategori_id }}</option>
                                    @foreach($kategori_id as $row)
                                    <option value="{{ $row->id }}" {{ old('kategori_id') == $row->id ? 'selected' : '' }}> {{$row->kategori_id}} </option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="menthor_id">Nama Menthor</label>
                                <select class="custom-select form-control-border  @error('menthor_id') is-invalid @enderror" name="menthor_id" id="menthor_id">
                                    <option value="{{$bootcamp->menthor_id}}">{{ $bootcamp->mentor->menthor_id }}</option>
                                    @foreach($menthor_id as $row)
                                    <option value="{{ $row->id }}" {{ old('menthor_id') == $row->id ? 'selected' : '' }}> {{$row->menthor_id}} </option>
                                    @endforeach
                                </select>
                                @error('menthor_id')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="harga">harga</label>
                                <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga"  value="{{$bootcamp->harga}}">
                                @error('harga')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>    
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="harga">kuota</label>
                                <input type="text" name="kuota" class="form-control @error('kuota') is-invalid @enderror" id="kuota"  value="{{$bootcamp->kuota}}">
                                @error('kuota')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>    
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Bootcamp</label>
                                <textarea class="form-control  @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" value="{{ $bootcamp->deskripsi}}">{{$bootcamp->deskripsi}}</textarea>
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
        .create(document.querySelector('#bootcamp'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection