<!-- modal -->
<div class="modal fade" id="updateStatus{{$row->id}}">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Status Pembayaran Bootcamp</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="{{ route('update.transaksi')}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <input type="hidden"  value="{{$row->id }}" name="id">

        <select name="status" id="status" class="custom-select form-control-border">
            <option value="" disabled>Pilih Status Pembayaran</option>
            <option value="1" @if($row->status ==1) {{'selected'}} @endif> Sukses Bayar</option>
            <option value="1" @if($row->status ==2) {{'selected'}} @endif> Sukses Belum DiBayar</option>
            <option value="1" @if($row->status ==3) {{'selected'}} @endif> Batal Bayar</option>
        </select>
    </div>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>

</div>
</div>