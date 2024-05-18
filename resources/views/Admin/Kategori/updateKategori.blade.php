@extends('template.base')

@section('title', 'Form Kategori')

@section('content')

<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Kategori</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('KategoriProduk.index') }}">Data Kategori</a></li>
                    <li class="breadcrumb-item active">Form Kategori</li>
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

                    <form action="{{route('KategoriProduk.update', $kategori->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group">
                                <label for="kategori_id">Kategori ID</label>
                                <input type="text" name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" id="kategori_id" value="{{$kategori->kategori_id}}" placeholder="Masukkan Judul Artikel">
                            </div>
                            @error('kategori_id')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            

                            
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
        .create(document.querySelector('#kategori'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection