@extends('Front.baseFront')
@section('title', 'Detail bootcamp')
@section('content')
  <!-- Checkout Bootcamp -->
    <section class="container checkout-bootcamp">
        <span>YOUR FUTURE CAREER</span>
        <h2>Checkout Bootcamp</h2>
    </section>
    <!-- End Checkout Bootcamp -->


    <!-- Detail Checkout -->
    <section class="container detail-checkout">
        <div class="row">

            <div class="col-md-6 left-content">              
                <div class="p-5">
                    <div class="video">
                        <img class="img-fluid" src="{{asset('storage/' .$bootcamp->thumbnail)}}" alt="{{$bootcamp->nama}}">
                    </div>   
                    <div class="desc">
                        <span>{{$bootcamp->nama}}</span>
                        <p>
                           {!!$bootcamp->deskripsi !!}
                        </p>
                    </div>
                </div>          
            </div>

            <div class="col-md-6 right-content d-flex justify-content-center">
                <form class="mt-4" action="{{route('front.daftar.bootcamp')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $bootcamp->id}}" name="bootcamp_id">
                    <input type="hidden" value="{{ $bootcamp->harga}}" name="total_harga">
                    @guest
                    <input type="hidden" name="peserta_id" id="pesert_id">
                    @else
                    <input type="hidden" value="{{Auth::user()->id}}" name="peserta_id">
                    @endguest
                    <div class="mb-3 inputan">
                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 inputan">
                        <label for="nama" class="form-label">Full Name</label>
                        <input type="text" name="nama" class="form-control" id="nama" >
                    </div>
                    <div class="mb-3 inputan">
                        <label for="pekerjaan" class="form-label">Occupation</label>
                        <input type="text" name="pekerjaan" class="form-control" id="Occupation" >
                    </div>
                    <div class="mb-3 inputan">
                        <label for="rekening" class="form-label">Card Number</label>
                        <input type="text" class="form-control" name="rekening" id="rekening" >
                    </div>

                    <div class="row">
                        <div class="col-md-3 inputan-2">
                            <div class="mb-3">
                                <label for="expired" class="form-label">expired</label>
                                <input type="text" class="form-control" name="expired" id="expired" >
                            </div>
                        </div>
                        <div class="col-md-3 inputan-2">
                            <div class="mb-3 jarak">
                                <label for="cvc" class="form-label">CVC</label>
                                <input type="text" class="form-control" name="cvc" id="cvc" >
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Play Now</button>
                    <p class="pay">
                        Your payment is secure and encrypted.
                    </p>
                </form>
            </div>

        </div>
    </section>
    <!-- End Detail Checkout -->
  <!-- Checkout Bootcamp -->
    <section class="container checkout-bootcamp">
        <span>YOUR FUTURE CAREER</span>
        <h2>Checkout Bootcamp</h2>
    </section>
    <!-- End Checkout Bootcamp -->


    <!-- Detail Checkout -->
    <section class="container detail-checkout">
        <div class="row">

            <div class="col-md-6 left-content">              
                <div class="p-5">
                    <div class="video">
                        <img class="img-fluid" src="images/item.png" alt="View Video">
                    </div>   
                    <div class="desc">
                        <span>GILA BELAJAR</span>
                        <p>
                            Bootcamp ini akan mengajak Anda untuk
                            belajar penuh mulai dari pengenalan dasar
                            sampai membangun sebuah projek asli.
                        </p>
                    </div>
                </div>          
            </div>

            <div class="col-md-6 right-content d-flex justify-content-center">
                <form class="mt-4">
                    <input type="hidden" value="{{$bootcamp->id}}" name="bootcamp_id">

                    <input type="hidden" value="{{$bootcamp->harga}}" name="total_harga">
                    <div class="mb-3 inputan">
                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" placeholder="masukkan email">
                    </div>
                    <div class="mb-3 inputan">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="nama" class="form-control" id="fullName" placeholder="masukkan nama lengkap" >
                    </div>
                    <div class="mb-3 inputan">
                        <label for="pekerjaan" class="form-label">pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" placeholder="masukkan pekerjaan">
                    </div>
                    <div class="mb-3 inputan">
                        <label for="rekening" class="form-label">Card Number</label>
                        <input type="text" name="rekening" class="form-control" id="CardNumber" placeholder="masukkan nomor rekening">
                    </div>

                    <div class="row">
                        <div class="col-md-3 inputan-2">
                            <div class="mb-3">
                                <label for="Expired" class="form-label">Expired</label>
                                <input type="text" name="expired" class="form-control" id="Expired" placeholder="12/23" >
                            </div>
                        </div>
                        <div class="col-md-3 inputan-2">
                            <div class="mb-3 jarak">
                                <label for="cvc" class="form-label">CVC</label>
                                <input type="text" name="cvc" class="form-control" id="cvc" >
                            </div>
                        </div>
                    </div>

                    @guest
                    <!-- sebelum login -->
                    <a href="#" class="btn btn-primary"> Login </a>
                    @else
                    @if(Auth::user()->role ==3)
                    <button type="submit" class="btn btn-primary">Play Now</button>
                    <p class="pay">
                        Your payment is secure and encrypted.
                    </p>
                    @else 
                    <button type="button" class="btn btn-primary">Anda Tidak Bisa Daftar!</button>
                    @endif
                    @endguest
                </form>
            </div>

        </div>
    </section>
    <!-- End Detail Checkout -->

@endsection