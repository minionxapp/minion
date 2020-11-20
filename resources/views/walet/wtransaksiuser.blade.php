@extends('layout.master')

@section('pagetitle')
Pengajuan Wallet Transaksi
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
    <button type="button" class="btn btn-primary btn-sm float-left"  id="btn_add"
    data-toggle="modal" onclick="addFunction();" >Add</button>
  </div>
</div>

<div>  
  <table id="myTable" class="display nowrap" style="width:100%" >
    <thead>
        <tr>           
            <th>periode_kode</th>
            <th>user_id</th>
            <th>jenis</th>
            <th>keterangan</th>
            <th>mulai</th>
            <th>akhir</th>
            <th>lokasi</th>               
            <th>jml_training</th>
            <th>jml_lain</th>
            <th>jml_total</th>  
            <th>status</th>  
            <th>file1</th>
            <th>file2</th>
            <th>file3</th>
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
                <h5 class="modal-title" id="staticBackdropLabel">Pengajuan Wallet : 
                    <label id="saldo">0</label>
                </h5>
              
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/walet/addwtransaksiuser" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" class="form-control" id="id">
                        <div class="div row">
                            <div class="form-group col-md-6">
                                <label for="periode_kode">periode_kode</label>
                                <select name="periode_kode" class="form-control" id="periode_kode">
                                    @foreach ($periode as $period)
                                    <option value={{$period->kode}}>{{$period->nama}}</option>
                                    @endforeach
                                </select>
                            </div>                            
                            <div class="form-group col-md-6">
                                <label for="user_id">user_id</label>
                                <input type="text"  value={{$user->user_id}}  name="user_id" class="form-control" id="user_id">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="jenis">jenis</label>
                                <select name="jenis" class="form-control" id="jenis">
                                    <option value='TR'>Training</option>
                                    <option value='SM'>Seminar</option>
                                    <option value='WB'>Webinar</option>
                                    <option value='EL'>E-Learning</option>
                                    <option value='TT'>Training Tool</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="keterangan">
                        </div>
                        <div class="div row">
                            <div class="form-group col-sm-6">
                                <label for="mulai">mulai</label>
                                <input type="date" name="mulai" class="form-control" id="mulai">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="akhir">akhir</label>
                                <input type="date" name="akhir" class="form-control" id="akhir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">lokasi</label>
                            <input type="text" name="lokasi" class="form-control" id="lokasi">
                        </div>
                        <div class="div row">
                            <div class="form-group col-md-4">
                                <label for="jml_training">By Training</label>
                                <input type="number" value="0" name="jml_training" class="form-control" id="jml_training">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jml_lain">By Lain</label>
                                <input type="number" value="0" name="jml_lain" class="form-control" id="jml_lain">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jml_total">By Total</label>
                                <input type="number" value="0" name="jml_total" class="form-control" id="jml_total" readonly>
                            </div>
                        </div>


                        <div class="div row">
                            <div class="form-group col-md-4">
                                <label for="nik_atasan">nik_atasan</label>
                                <input type="text" name="nik_atasan" class="form-control" id="nik_atasan">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="nama_atasan">nama_atasan</label>
                                <input type="text" name="nama_atasan" class="form-control" id="nama_atasan" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="status">status</label>
                                <select name="status" class="form-control" id="status">
                                    <option value='DRF'>DRAFT</option>
                                    <option value='AJA'>Pengajuan Atasan</option>
                                    {{-- <option value='SLS'>Selesai</option> --}}
                                </select>
                            </div>   
                        </div>


                        <div class="form-group">
                        <label for="file1" id='file1'>file1</label> 
                            <input type="file" name="file1" class="form-control" id="file1">
                        </div>
                        <div class="form-group">
                            <label for="file2" id='file2'>file2</label>
                            <input type="file" name="file2" class="form-control" id="file2">
                        </div>
                        <div class="form-group">
                            <label for="file3" id='file3'>file3</label>
                            <input type="file" name="file3" class="form-control" id="file3">
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
        ajax: '/walet/getwtransaksiuser/',
        columns: [
            { data: 'periode_kode', name: 'periode_kode' },
            { data: 'user_id', name: 'user_id' },
            { data: 'jenis', name: 'jenis' },
            { data: 'keterangan', name: 'keterangan' },
            { data: 'mulai', name: 'mulai' },
            { data: 'akhir', name: 'akhir' },
            { data: 'lokasi', name: 'lokasi' },
            { data: 'jml_training', name: 'jml_training' },
            { data: 'jml_lain', name: 'jml_lain' },
            { data: 'jml_total', name: 'jml_total' },
            { data: 'status', name: 'status' },
            { data: 'file1', name: 'file1' },
            { data: 'file2', name: 'file2' },
            { data: 'file3', name: 'file3' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        
    });

    $("#jml_training").change(function(){
        $("#jml_total").val(parseInt($("#jml_training").val())+parseInt($("#jml_lain").val()));
    });

    $("#jml_lain").change(function(){
        $("#jml_total").val(parseInt($("#jml_training").val())+parseInt($("#jml_lain").val()));
    });

    $("#nik_atasan").change(function(){
        $.ajax({
               type:'GET',
               async: false,
               url:'/admin/getuserbyuserid/'+$("#nik_atasan").val(), 
               success:function(data) {
                   $("#nama_atasan").val(data.name);
            }
        });
    });

    $.ajax({
               type:'GET',
               async: false,
               url:'/walet/getwtransaksiuser_byuserid/'+"{{$user->user_id}}", //    data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                   if (!data){
                       alert("Anda Belum terdaftar pada Learning Wallet")
                       $('#btn_add').prop("disabled",true);  
                   }else{
                        $('#btn_add').prop("disabled",false);  
                   }
               }
    });


} );//end  dokumen ready

async function viewFunction($id) {   
    $.ajax({
               type:'GET',
               async: false,
               url:'/walet/getwtransaksiuser_byid/'+$id, //    data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                $("#id").val(data.id); 
                $("#periode_kode").val(data.periode_kode); 
                $("#user_id").val(data.user_id); 
                $("#jenis").val(data.jenis); 
                $("#keterangan").val(data.keterangan); 
                $("#mulai").val(data.mulai); 
                $("#akhir").val(data.akhir); 
                $("#lokasi").val(data.lokasi); 
                $("#jml_training").val(data.jml_training); 
                $("#jml_lain").val(data.jml_lain); 
                $("#jml_total").val(data.jml_total); 
                $("#status").val(data.status); 
                $("#nik_atasan").val(data.nik_atasan); 
                $("#nama_atasan").val(data.nama_atasan); 
                if(data.file1 != null){
                    $("#file1").empty();
                    $("#file1").append('  File :  <a href="{{config('constant.imageShow')}}'+data.file1+'" target=\"_blank\"">'+data.file1.substring(11)+'</a>');
                    // $("#file1").append('File :  <a href="/storage/images/'+data.file1+'" target=\"_blank\"">'+data.file1.substring(11)+'</a>');
                }
                if(data.file2 != null){
                    $("#file2").empty();
                    $("#file2").append('  File :  <a href="{{config('constant.imageShow')}}'+data.file2+'" target=\"_blank\"">'+data.file2.substring(11)+'</a>');
                }
                if(data.file3 != null){
                    $("#file3").empty();
                    $("#file3").append('  File :  <a href="{{config('constant.imageShow')}}'+data.file3+'" target=\"_blank\"">'+data.file3.substring(11)+'</a>');
                }
                $('#id').attr('readonly', true);
                $('#btnsubmit').prop("disabled",true);   
               }
            });    
    $('#formData').modal('show');    
}
function addFunction() {
    
    $.ajax({
               type:'GET',
               async: false,
               url:'/walet/getwtransaksiuser_byuserid/'+"{{$user->user_id}}", //    data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                    $("#saldo").empty();
                    $("#saldo").append(" Saldo :"+new Intl.NumberFormat().format(data.sakhir));
                    $("#periode_kode").val(data.periode_kode);
                    $("#periode_kode option:first").attr('selected','selected');
               }
    });


    $('#formData').modal('show');   
    $("#file1").empty();
    $("#file1").append('File :');
    // $("#periode_kode").val(""); 
    $("#user_id").val("{{$user->user_id}}"); 
    $("#jenis").val("TR"); 
    $("#keterangan").val(""); 
    $("#mulai").val(""); 
    $("#akhir").val(""); 
    $("#lokasi").val(""); 
    $("#jml_training").val("0"); 
    $("#jml_lain").val("0"); 
    $("#jml_total").val("0"); 
    $("#status").val("DRF"); 
    $('#jml_total').attr("readonly",true); 
    $('#user_id').attr('readonly', true);
    $('#btnsubmit').prop("disabled",false);   
}
async function editFunction($id) {    
    await viewFunction($id);
    if($("#status").val() == "DRF"){
        $('#jml_total').attr("readonly",true); 
        $('#jml_lain').attr("readonly",false); 
        $('#jml_training').attr("readonly",false); 
        $('#btnsubmit').prop("disabled",false); 
    }else{
        $('#jml_total').attr("readonly",true); 
        $('#jml_lain').attr("readonly",true); 
        $('#jml_training').attr("readonly",true); 
        $('#btnsubmit').prop("disabled",true); 
    }      
}

</script>
@endsection