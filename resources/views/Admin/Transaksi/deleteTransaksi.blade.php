<div class="modal fade" id="delete{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Transaksi </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('hapus.transaksi', $row->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Transaksi</label>
                        <p class="text-center">Yakin Hapus Data Transaksi <strong style="color:red;">{{ $row->nama }}</strong>Untuk Bootcamp <strong style="color:red;">{{ $row->bootcamp->deskripsi }}</strong></p>
                        <input type="hidden" name="id" value="{{ $row->id }}">

                        <!-- yang paling penting kalo mau buat prosenay itu name -->
                    </div>
                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>