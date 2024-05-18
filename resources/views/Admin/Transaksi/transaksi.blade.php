@extends('template.base')

@section('title', 'Kategori Trasnsaksi')

@section('content')

<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Kategori Trasnsaksi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Tag</li>
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
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <form action="#" method="get">
                                    <div class="input-group-append">
                                        <input type="search" name="search" class="form-control float-right" placeholder="Search">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <!-- Alert Create-->
                        @if(Session::get('create'))
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
                                    <th>No.</th>
                                    <th>Kode Trasnsaksi</th>
                                    <th>Nama</th>
                                    <th>Nama Bootcamp</th>
                                    <th>Total Bayar</th>
                                    <th>status</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->kode_transaksi}}</td>
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->bootcamp->deskripsi}}</td>
                                    <td>{{$row->total_harga}}</td>
                                    <td>
                                    @if($row->status == 1)
                                        <span class="badge badge-success">Sukses</span>
                                        @elseif($row->status ==2)
                                        <span class="badge badge-danger">Pending</span>
                                        @elseif($row->status ==3)
                                        <span class="badge badge-warning">Gagal</span>
                                        @endif
                                    </td>
                                    <td>
                                    <a href="#" class="btn btn-success" title="ubah status pembayaran" data-toggle="modal" data-target="#updateStatus{{$row->id}}" ><i class="fa-solid fa-eye"></i></a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$row->id}}"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                @include('Admin.Transaksi.ubahStatus')
                                @include('Admin.Transaksi.deleteTransaksi');
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

<!-- modal -->

@endsection