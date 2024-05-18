<!-- modal -->
<div class="modal fade" id="edit{{ $row->id}}">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">tambhakan Data Tag</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="{{ route('admin.update.tag')}}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Tag</label>
        <input type="text" id="tags" value="{{$row->tags }}" name="tags" required class="form-control">
        <input type="hidden"  value="{{$row->id }}" name="id">
       
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