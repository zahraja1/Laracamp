@extends('template.base')

@section('title', 'Form peserta')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile, {{Auth::user()->username}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Profile Peserta</a></li>
                    <li class="breadcrumb-item active">Profile {{Auth::user()->username}}</li>
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
                    <form action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name"  id="name" class="form-control" disabled value="{{$user->name}}" >
                            </div>
                            <div class="form-group">
                                <label for="username">User Name</label>
                                <input type="text" name="username"  id="username" class="form-control" disabled value="{{$user->username}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email"  id="email" class="form-control" disabled value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label for="telepon">notelp</label>
                                <input type="text" name="telepon"  id="telepon" class="form-control" disabled value="{{$user->telepon}}">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="text" name="tanggal_lahir"  id="tanggal_lahir" class="form-control" disabled value="{{$user->tanggal_lahir}}">
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan"  id="pekerjaan" class="form-control" disabled value="{{$user->pekerjaan}}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('peserta.profile.update', $user->id)}}" class="btn btn-primary"> Edit Profile</a>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</section>

<!-- End Main Content -->

@endsection

