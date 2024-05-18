<div class="modal fade" id="show{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Show Data Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Product.store', $row->id) }}" method="POST">
                    @csrf
               
                    <div class="mb-3">
                        <!-- 1 -->
                        <label for="nama_produk" class="form-control">nama Produk</label>
                        <input type="text" name="nama_produk" value="{{$row->nama_produk}}" id="nama_produk">
                        <!-- 2 -->
                        <label for="kategori" class="form-control">Kategori</label>
                        <input type="text" name="kategori" value="{{$row->kategori->kategori_id}}" id="kategori">
                        <!-- 3 -->
                        <label for="deskripsi" class="form-control">Deskripsi</label>
                        <input type="text" name="deskripsi" value="{{$row->deskripsi}}" id="deskripsi">
                        <input type="hidden" name="id" value="{{$row->id}}">

                        <!-- yang paling penting kalo mau buat prosenay itu name -->
                    </div>
                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>