@extends('template.base')

@section('title', 'product')

@section('content')

<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Product</li>
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
                    <div class="card-header">
                       <a href="{{ route('Product.create') }}" class="btn btn-primary btn-md">Add Produk </a>
                       <a href="{{ route('produk.skincare') }}" class="btn bg-purple btn-md">Skincare</a>
                       <a href="#" class="btn bg-pink btn-md">Bodycare </a>
                       <a href="#" class="btn bg-purple btn-md">Haircare </a>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <form action="{{route('Produk.search')}}" method="get">
                                    <div class="input-group-append">
                                        <input type="search" name="search" class="form-control float-right" placeholder="Search">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <!-- Alert Create-->
                        @if(Session::get('Create'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('create')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                        </div>
                        @endif
                        <!-- End Alert Create-->
                        <!-- Alert Delete-->
                        @if(Session::get('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('delete')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                        </div>
                        @endif
                        <!-- End Alert Delete-->
                        <!-- Alert Update-->
                        @if(Session::get('update'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ Session::get('update')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                        </div>
                        @endif
                        <!-- End Alert Update-->

                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th width="10%">Image</th>
                                    <th>kategori</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Slug</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($product as $row)
                                <tr>
                                <td>
                                        <a href="{{route('Product.edit', $row->id)}}" class="btn btn-secondary" ><i class="fa-solid fa-pencil"></i></a>
                                        <a href="admin.delete.tag" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$row->id}}"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                    <td>
                                        <!--  ngeluarin foto cara ke dua-->
                                        <img src="{{asset('storage/'. $row->image)}}" alt="{{$row->title}}" class="img-fluid">
                                    </td>
                                    <td>{{$row->kategori->kategori_id}}</td>
                                    <td>{{$row->nama_produk}}</td>
                                    <td>{{$row->harga}}</td>
                                    <td>{{$row->slug}}</td>
                                    <td><a href="" class="btn btn-primary" data-toggle="modal" data-target="#show{{$row->id}}">Deskripsi</a></td>
                                </tr>
                            @include('Admin.Product.deleteProduct')
                            @include('Admin.Product.showProduct')
                               @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>

</section>
<!-- End Main Content -->
@endsection