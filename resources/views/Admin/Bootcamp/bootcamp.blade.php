@extends('template.base')

@section('title', 'artikel')

@section('content')

<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Bootcamp</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Bootcamp</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- END Header -->

<!-- Main Content -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                       <a href="{{route('Bootcamp.create')}}" class="btn btn-primary btn-md">Add Bootcamp </a>
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
                                    <th width="10%">Image  Bootcamp</th>
                                    <th>kategori Bootcamp</th>
                                    <th>Nama Mentor</th>
                                    <th>Harga</th>
                                    <th>Kuota</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($bootcamp as $row)
                                <tr>
                                <td>
                                        <a href="{{route('Bootcamp.edit', $row->id)}}" class="btn btn-secondary" ><i class="fa-solid fa-pencil"></i></a>
                                        <a href="#" class="btn btn-success" ><i class="fa-solid fa-eye"></i></a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$row->id}}"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                    <td>
                                        <!--  ngeluarin foto cara ke dua-->
                                        <img src="{{asset('storage/'.$row->thumbnail)}}" alt="" class="img-fluid">
                                    </td>
                                    <td>{{$row->kategori->kategori}}</td>
                                    <td>{{$row->mentor->name}}</td>
                                    <td>{{$row->harga}}</td>
                                    <td>{{$row->kuota}}</td>
                                    <td>
                                        @if($row->status == 1)
                                        <span class="badge badge-success">Tersedia</span>
                                        @elseif($row->status ==2)
                                        <span class="badge badge-danger">Penuh</span>
                                        @endif
                                    </td>
                                </tr>
                                @include('Admin.Bootcamp.deleteBootcamp')
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