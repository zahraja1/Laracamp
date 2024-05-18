@extends('Front.baseFront')
@section('title', 'Kategori Bootcamp')
@section('content')
 <!-- Dashboard -->
 <section class="container dashboard">
        <span>DASHBOARD</span>
        <h2> Bootcamps Kategori : {{$kategori->kategori}}</h2>

        <!-- List Table My Bootcamp -->
        <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
                    @forelse($bootcamp as $row)
                    <!-- kalau foreach ngeluarin semua data -->
                    <!-- kalau forelse, jika data yang dikeluarkan tidak ada, bisa menampilkan halaman lain  -->
                    <tr>
                        <td class="td-img">
                            <img style="width: 180px; height:120px; border-radius:20px;" src="{{asset('storage/' .$row->thumbnail)}}" alt="{{$row->nama}}">
                        </td>
                        <td class="td-bootcamp">
                            <div class="desc">
                                <p class="name">{{$row->nama}}</p>
                                <p class="date">Mentor:{{$row->mentor->name}}</p>
                            </div>
                        </td> 
                        <td class="td-price">RP. <?php echo number_format($row->harga)
                        ?></td>
                        <td class="td-status" @if($row->status ==1) style="color: #31B380;" @else style="color: #f75151;" @endif>
                            @if($row->status ==1)
                            Bootcamp Tersedia
                            @else
                            Bootcamp Penuh
                            @endif
                        </td>
                        <td class="td-invoice">
                            <a href="{{route('front.detailBootcamp', $row->slug)}}" class="btn btn-primary">Detail Bootcamp</a>
                        </td>
                       
                    </tr>
                    @empty
                    <tr>
                            <td class="text-center">
                                Bootcamp Belum Tersedia
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        <!-- End List Table My Bootcamp -->

    </section>
    <!-- End Dashboard -->
   

@endsection