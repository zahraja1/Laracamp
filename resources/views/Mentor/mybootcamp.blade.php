@extends('template.base')

@section('title', 'my Bootcamp')

@section('content')

<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Bootcamp saya</h1>
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
                        <table class="table table-hover text-nowrap">
                            
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th width="10%">Image  Bootcamp</th>
                                    <th>kategori Bootcamp</th>
                                    <th>Nama Bootcamp</th>
                                    <th>Nama Mentor</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($bootcamp as $row)
                                <tr>
                                <td>   
                                        <a href="{{route('mentor.list.peserta', $row->id)}}" data-toggle="modal" data-target="#detail{{$orw->id}}" title="Lihat Peserta B" class="btn btn-success" ><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                    <td>
                                        <!--  ngeluarin foto cara ke dua-->
                                        <img src="{{asset('storage/'.$row->thumbnail)}}" alt="" class="img-fluid">
                                    </td>
                                    <td>{{$row->nama}}</td>
                                    <td>{!!$row->deskripsi !!}</td>
                                    <td>
                                        @if($row->status == 1)
                                        <span class="badge badge-success">Tersedia</span>
                                        @elseif($row->status ==2)
                                        <span class="badge badge-danger">Penuh</span>
                                        @endif
                                    </td>
                                </tr>
                                @include('Mentor.listPeserta')
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