@extends('layout.master')

@section('pagetitle')
Wallet Periode Setup
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
            <th>Kode</th>
            <th>nama</th>
            <th>descripsi</th>
            <th>awal</th>  
            <th>akhir</th> 
            <th>sawal</th> 
            <th>sakhir</th>     
            <th>status</th>       
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
                <h5 class="modal-title" id="staticBackdropLabel">Wallet Periode Setup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/walet/addwperiode" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="id">id</label>
                            <input type="text" name="id" class="form-control" id="id">
                        </div>
                        <div class="form-group">
                            <label for="kode">kode</label>
                            <input type="text" name="kode" class="form-control" id="kode">
                        </div>
                        <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="descripsi">descripsi</label>
                            <input type="text" name="descripsi" class="form-control" id="descripsi">
                        </div>
                        <div class="form-group">
                            <label for="awal">awal</label>
                            <input type="date" name="awal" class="form-control" id="awal">
                        </div>
                        <div class="form-group">
                            <label for="akhir">akhir</label>
                            <input type="date" name="akhir" class="form-control" id="akhir">
                        </div>
                        <div class="form-group">
                            <label for="sawal">sawal</label>
                            <input type="text" name="sawal" class="form-control" id="sawal">
                        </div>
                        <div class="form-group">
                            <label for="sakhir">sakhir</label>
                            <input type="text" name="sakhir" class="form-control" id="sakhir">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="status">status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="A">Aktif</option>
                                <option value="N">Non Aktif</option>
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for=""></label>
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
        //defaultContent: "",
        ajax: '/walet/getwperiode',
        columns: [
            { data: 'kode', name: 'kode' },
            { data: 'nama', name: 'nama' },
            { data: 'descripsi', name: 'descripsi' },
            { data: 'awal', name: 'awal' },
            { data: 'akhir', name: 'akhir' },
            { data: 'sawal', name: 'sawal' },
            { data: 'sakhir', name: 'sakhir' },      
            { data: 'status', name: 'status' },        
            { data: 'action', name: 'action', orderable: false, searchable: false},
            // {defaultContent: "Not set</i>"}
        ],
        
    });
} );

async function viewFunction($id) {
    $.ajax({
               type:'GET',
               async: false,
               url:'/walet/getwperiodebyid/'+$id, //    data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                $("#id").val(data.id);
                $("#kode").val(data.kode);
                $("#nama").val(data.nama);
                $("#descripsi").val(data.descripsi);
                $("#awal").val(data.awal);
                $("#akhir").val(data.akhir);
                $("#sawal").val(data.sawal);
                $("#sakhir").val(data.sakhir);

                $('#id').attr('readonly', true);
                $("#kode").attr('readonly', true);
                $("#nama").attr('readonly', true);
                $("#descripsi").attr('readonly', true);
                $("#awal").attr('readonly', true);
                $("#akhir").attr('readonly', true);
                $("#sawal").attr('readonly', true);
                $("#sakhir").attr('readonly', true);
                $('#btnsubmit').prop("disabled",true);   
               }
            });    
    $('#formData').modal('show');    
}
function addFunction() {
    $('#formData').modal('show');   
    $('#btnsubmit').prop("disabled",false);   
}
async function editFunction($id) {    
    await viewFunction($id);
    $('#id').attr('readonly', true);
    $("#kode").attr('readonly', true);
    $("#nama").attr('readonly', false);
    $("#descripsi").attr('readonly', false);
    $("#awal").attr('readonly', false);
    $("#akhir").attr('readonly', false);
    $("#sawal").attr('readonly', false);
    $("#sakhir").attr('readonly', false);
    $('#btnsubmit').prop("disabled",false);        
    $('#btnsubmit').prop("disabled",false); 
}

</script>
@endsection