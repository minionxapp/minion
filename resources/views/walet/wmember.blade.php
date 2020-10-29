@extends('layout.master')

@section('pagetitle')
Wallet Member
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
      data-toggle="modal" onclick="addFunction();">Add</button>
    </div>
  </div>
<div>  
  <table id="myTable" class="display nowrap" style="width:100%" >
    <thead>
        <tr>
            
            <th>Periode</th>
            <th>User Id</th>
            <th>User Name</th>
            {{-- <th>divisi_kode</th>  --}}
            <th>Divisi</th> 
            {{-- <th>departemen_kode</th> --}}
            <th>Departemen</th>
            <th>Saldo Awal</th>
            <th>Saldo Akhir</th>
            <th>Status</th>       
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
                <h5 class="modal-title" id="staticBackdropLabel">Wallet Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/walet/addwmember" method="POST">
                        {{ csrf_field() }}   
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>   
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="periode_kode">periode_kode</label>
                                <select name="periode_kode" class="form-control" id="periode_kode">
                                    {{-- <option value="">Periode</option> --}}
                                    @foreach ($periode as $period)
                                    <option value={{$period->kode}} selected>{{$period->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="user_id">user_id</label>
                                <input type="text" name="user_id" class="form-control" id="user_id">
                            </div>
                        </div>                 
                            <div class="form-group">
                            <label for="user_name">user_name</label>
                            <input type="text" name="user_name" class="form-control" id="user_name">
                        </div>
                        <div class="row ">
                            <div class="form-group col-md-3">
                                <label for="divisi_kode">divisi_kode</label>
                                <input type="text" name="divisi_kode" class="form-control" id="divisi_kode">
                            </div>
                            <div class="form-group col-md-9">
                                <label for="divisi_nama">divisi_nama</label>
                                <input type="text" name="divisi_nama" class="form-control" id="divisi_nama">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="departemen_kode">departemen_kode</label>
                                <input type="text" name="departemen_kode" class="form-control" id="departemen_kode">
                            </div>
                            <div class="form-group col-md-9">
                                <label for="departemen_nama">departemen_nama</label>
                                <input type="text" name="departemen_nama" class="form-control" id="departemen_nama">
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="form-group col-md-6">
                                <label for="sawal">sawal</label>
                                <input type="text" name="sawal" class="form-control" id="sawal">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sakhir">sakhir</label>
                                <input type="text" name="sakhir" class="form-control" id="sakhir">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="status">status</label>
                            {{-- <input type="text" name="status" class="form-control" id="status"> --}}
                            <select name="status" class="form-control" id="status">
                                <option value="A">Aktif</option>
                                <option value="N">Non Aktif</option>
                            </select>
                        </div>
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
        ajax: '/walet/getwmember',
        columns: [
            { data: 'periode_kode', name: 'periode_kode' },
            { data: 'user_id', name: 'user_id' },
            { data: 'user_name', name: 'user_name' },
            // { data: 'divisi_kode', name: 'divisi_kode' },
            { data: 'divisi_nama', name: 'divisi_nama' },
            // { data: 'departemen_kode', name: 'departemen_kode' },
            { data: 'departemen_nama', name: 'departemen_nama' },
            { data: 'sawal', name: 'sawal' },
            { data: 'sakhir', name: 'sakhir' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        
    });

    // $('select[name="periode_kode"]').on('change', function() {
    // });
    $("#user_id").change(function(){
        if($("#periode_kode").val()== "" ||$("#periode_kode").val()== null){
            alert("Periode tidak boleh Kosong");
        }
        $.ajax({
               type:'GET',
               async: false,
               url:'/admin/getuserbyuserid/'+$("#user_id").val(), 
               success:function(data) {
                   if(JSON.stringify(data) == '\"\"'){
                        alert("Nik Tidak Ditemukan........");
                   }
                    $("#user_name").val(data.name);
                    $.ajax({
                        type:'GET',
                        async: false,
                        url:'/admin/getdivisibydivisi_kode/'+data.divisi_kode, 
                        success:function(hasil) {
                            $("#divisi_kode").val(hasil.kode);
                            $("#divisi_nama").val(hasil.nama);
                        }
                    });

                    $.ajax({
                        type:'GET',
                        async: false,
                        url:'/admin/getdepartementbykode/'+data.departemen, 
                        success:function(hasil) {
                            // alert("xxxxxx  "+JSON.stringify(hasil2));
                            $("#departemen_kode").val(hasil.kode);
                            $("#departemen_nama").val(hasil.nama);
                        }
                    });


               }
        });


    });


} );//end document ready


async function viewFunction($id) {
    $.ajax({
               type:'GET',
               async: false,
               url:'/walet/getwmemberbyid/'+$id,//'/admin/xxxxxxx/'+$id, //    data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                $("#id").val(data.id); 
                $("#periode_kode").val(data.periode_kode);
                $("#user_id").val(data.user_id);
                $("#user_name").val(data.user_name);
                $("#divisi_kode").val(data.divisi_kode);
                $("#divisi_nama").val(data.divisi_nama);
                $("#departemen_kode").val(data.departemen_kode);
                $("#departemen_nama").val(data.departemen_nama);
                $("#sawal").val(data.sawal);
                $("#sakhir").val(data.sakhir);
                $("#status").val(data.status);

                $('#user_id').attr('readonly', true);
                $('#periode_kode').attr('readonly', true);
                $('#user_name').attr('readonly', true);
                $('#divisi_kode').attr('readonly', true);
                $('#divisi_nama').attr('readonly', true);
                $('#departemen_kode').attr('readonly', true);
                $('#departemen_nama').attr('readonly', true);
                $('#sawal').attr('readonly', true);
                $('#sakhir').attr('readonly', true);
                $('#status').attr('readonly', true);
                $('#btnsubmit').prop("disabled",true);   
               }
            });    
    $('#formData').modal('show');    
}


function addFunction() {
    $('#formData').modal('show');   
    // $("#periode_kode").val("");
    $("#user_id").val("");
    $("#user_name").val("");
    $("#divisi_kode").val("");
    $("#divisi_nama").val("");
    $("#departemen_kode").val("");
    $("#departemen_nama").val("");
    $("#sawal").val("");
    $("#sakhir").val("");
    $("#status").val("");

    $('#user_id').attr('readonly', false);
    $('#periode_kode').attr('readonly', false);
    $('#user_name').attr('readonly', true);
    $('#divisi_kode').attr('readonly', true);
    $('#divisi_nama').attr('readonly', true);
    $('#departemen_kode').attr('readonly', true);
    $('#departemen_nama').attr('readonly', true);
    $('#sawal').attr('readonly', false);
    $('#sakhir').attr('readonly', true);
    $('#status').attr('readonly', false);
    $('#btnsubmit').prop("disabled",true);   
    $('#btnsubmit').prop("disabled",false);   
}
async function editFunction($id) {    
    await viewFunction($id);
    $('#sawal').attr('readonly', false);
    $('#sakhir').attr('readonly', false);
    $('#status').attr('readonly', false);
    $('#btnsubmit').prop("disabled",false); 
}

</script>
@endsection