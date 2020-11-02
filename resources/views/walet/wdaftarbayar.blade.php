@extends('layout.master')

@section('pagetitle')
Daftar Pembayaran
@endsection

@section('content')
<div>
    @if (session('sukses'))
    <div class="alert alert-primary" role="alert">
        {{session('sukses')}}
    </div>
    @endif
</div>


{{-- onclick="viewFunction(\''.$row->id.'\');" --}}
{{-- data-target="#addData" --}}
<div class="row text-nowrap">
  <div class="col-12" style="padding-top: 5px;">
    <button type="button" class="btn btn-primary btn-sm float-left"  
    data-toggle="modal" onclick="addFunction();" >Add
</button>
  </div>
</div>

<div>  
  <table id="myTable" class="display nowrap" style="width:100%" >
    <thead>
        <tr>
            <th>Id</th>
            <th>judul</th>
            <th>keterangan</th>
            <th>status</th>  
            <th>jml_total</th>          
            <th>tgl_pembayaran</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
</div>


        <!-- Modal -->
        <div class="modal fade" id="formData" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="addDataLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Daftar Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/walet/addwdaftarbayar" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="kode">id</label>
                            <input type="text" name="id" class="form-control" id="id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="judul">judul</label>
                            <input type="text" name="judul" class="form-control" id="judul">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="keterangan">
                        </div>
                        <div class="form-group">
                            <label for="status">status</label>
                            {{-- <input type="text" name="status" class="form-control" id="status"> --}}
                            <select name="status" class="form-control" id="status">
                                <option value='DRF'>Draft</option>
                                <option value='AJU'>Pengajuan</option>
                                <option value='SLS'>Selesai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jml_total">jml_total</label>
                            <input type="text" name="jml_total" class="form-control" id="jml_total">
                        </div>
                        <div class="form-group">
                            <label for="tgl_pembayaran">tgl_pembayaran</label>
                            <input type="date" name="tgl_pembayaran" class="form-control" id="tgl_pembayaran">
                        </div>
                        {{-- <div class="form-group">
                            <label for="">xx</label>
                            <input type="text" name="" class="form-control" id="">
                        </div> --}}
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="btnsubmit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('js')
<script type="text/javascript">
 $(document).ready(function() {
    $('#myTable').DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '/walet/getwdaftarbayar',
        columns: [
        // 
            { data: 'id', name: 'id' },
            { data: 'judul', name: 'judul' },
            { data: 'keterangan', name: 'keterangan' },
            { data: 'status', name: 'status' },
            { data: 'jml_total', name: 'jml_total' },
            { data: 'tgl_pembayaran', name: 'tgl_pembayaran' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        
    });

    // $("#user_id").change(function(){
    //     alert("lllll");
    // });
} );

async function viewFunction($id) {
    $.ajax({
               type:'GET',
               async: false,
               url:'/walet/getwdaftarbayarbyid/'+$id, //    data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                $("#id").val(data.id);
                $("#judul").val(data.judul);
                $("#keterangan").val(data.keterangan);
                $("#status").val(data.status);
                $("#jml_total").val(data.jml_total);
                $("#tgl_pembayaran").val(data.tgl_pembayaran);
                // ['judul','keterangan','status','jml_total','tgl_pembayaran'];
                $('#judul').attr('readonly', true);
                $('#keterangan').attr('readonly', true);
                $('#status').attr('readonly', true);
                $('#jml_total').attr('readonly', true);
                $('#tgl_pembayaran').attr('readonly', true);

                $('#btnsubmit').prop("disabled",true);   
               }
            });    
    $('#formData').modal('show');    
}
function addFunction() {
    $('#judul').attr('readonly', false);
    $('#keterangan').attr('readonly', false);
    $('#status').attr('readonly', false);
    $('#jml_total').attr('readonly', false);
    $('#tgl_pembayaran').attr('readonly', false);      
    $('#btnsubmit').prop("disabled",false); 
    $('#formData').modal('show');   
    $('#btnsubmit').prop("disabled",false);   
}
async function editFunction($id) {    
    await viewFunction($id);
    // $('#id').attr('readonly', true);   
    $('#judul').attr('readonly', false);
    $('#keterangan').attr('readonly', false);
    $('#status').attr('readonly', false);
    $('#jml_total').attr('readonly', false);
    $('#tgl_pembayaran').attr('readonly', false);      
    $('#btnsubmit').prop("disabled",false); 
}


function daftarFunction($id) {
    window.open("/walet/repwdaftarbayar/"+$id,target="_blank");
}

</script>
@endsection