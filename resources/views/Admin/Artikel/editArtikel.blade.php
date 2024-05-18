@extends('template.base')

@section('title', 'Form Edit Artikel')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Artikel</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.index.artikel')}}">Data Artikel</a></li>
                    <li class="breadcrumb-item active">Form Edit Artikel</li>
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
                    <form action="{{ route('admin.update.artikel', $artikel->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"  value="{{$artikel->title}}">
                                @error('title')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>    
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="img_artikel">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="img_artikel" class="custom-file-input  @error('img_artikel') is-invalid @enderror" id="img_artikel" value="{{$artikel->img_artikel}}">
                                        <label class="custom-file-label" for="img_artikel">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    @error('img_artikel')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message}}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tags">Tags Artikel</label>
                                <select class="custom-select form-control-border  @error('tags') is-invalid @enderror" name="tags" id="tags">
                                    <option value="{{$artikel->tags}}">{{ $artikel->tag->tags }}</option>
                                    @foreach($tags as $row)
                                    <option value="{{ $row->id }}" {{ old('tags') == $row->id ? 'selected' : '' }}> {{$row->tags}} </option>
                                    @endforeach
                                </select>
                                @error('tags')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="artikel">Artikel</label>
                                <textarea class="form-control  @error('artikel') is-invalid @enderror" id="artikel" name="artikel" rows="3" value="{{ $artikel->artikel}}">{{$artikel->artikel}}</textarea>
                                @error('artikel')
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