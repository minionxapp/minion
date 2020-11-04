@extends('layout.master')

@section('pagetitle')
Approval Wallet Transaksi
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
    {{-- <button type="button" class="btn btn-primary btn-sm float-left"  
    data-toggle="modal" onclick="addFunction();" >Add --}}
</button>
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
                <h5 class="modal-title" id="staticBackdropLabel">Persetujuan Wallet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/walet/addwtransaksiadmin" method="POST" enctype="multipart/form-data">
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
                        <div class="form-group">
                            <label for="jenis">jenis</label>
                            {{-- <input type="text" name="jenis" class="form-control" id="jenis"> --}}
                            <select name="jenis" class="form-control" id="jenis">
                                <option value='TR'>Training</option>
                                <option value='SM'>Seminar</option>
                                <option value='WB'>Webinar</option>
                                <option value='EL'>E-Learning</option>
                                <option value='TT'>Training Tool</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="keterangan">
                        </div>
                        <div class="div row">
                            <div class="form-group col-md-6">
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
                                {{-- <input type="number" class="form-control text-left" id="currency" name="currency" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp ', 'placeholder': '0'"> --}}
                                <input type="number" value="0" name="jml_training" class="form-control" id="jml_training">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jml_lain">By Lain</label>
                                <input type="number" value="0" name="jml_lain" class="form-control" id="jml_lain">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jml_total">By Total</label>
                                <input type="number" value="0" name="jml_total" class="form-control" id="jml_total">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status">Persetujuan</label>
                            @if (Auth::user()->role == 'ADM'||Auth::user()->role =='ADLW')                                
                                <select name="status" class="form-control" id="status">
                                    <option value='STA'>Pengajuan</option>
                                    <option value='TLD'>Tolak</option>
                                    <option value='STD'>Setuju</option>
                                </select>
                            @endif
                            @if (Auth::user()->role == 'USR')                                
                                <select name="status" class="form-control" id="status">
                                    <option value='AJA'>Pengajuan</option>
                                    <option value='TLA'>Tolak</option>
                                    <option value='STA'>Setuju</option>
                                </select>
                            @endif
                        </div>   


                        <div class="form-group">
                            <label for="file1" id='file1'></label> 
                            {{-- <label for="file2" id='file2'>file2</label>
                            <label for="file3" id='file3'>file3</label> --}}
                        {{-- <input type="file" name="file1" class="form-control" id="file1"> --}}
                        </div>
                        <div class="form-group">
                            {{-- <input type="file" name="file2" class="form-control" id="file2"> --}}
                        </div>
                        <div class="form-group">
                            {{-- <input type="file" name="file3" class="form-control" id="file3"> --}}
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
        ajax: '/walet/getwtransaksiadmin/',
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
            // { data: '', name: '' },
            // { data: '', name: '' },
            // { data: '', name: '' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        
    });

    $("#jml_training").change(function(){
        $("#jml_total").val(parseInt($("#jml_training").val())+parseInt($("#jml_lain").val()));
    });

    $("#jml_lain").change(function(){
        $("#jml_total").val(parseInt($("#jml_training").val())+parseInt($("#jml_lain").val()));
    });
} );

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
                $("#file1").empty();
                if(data.file1 != null){
                    $("#file1").append('File :<br><a href="/images/'+data.file1+'" target=\"_blank\"">'+data.file1.substring(11)+'</a><br>');
                }
                if(data.file2 != null){
                    $("#file1").append('<a href="/images/'+data.file2+'" target=\"_blank\"">'+data.file2.substring(11)+'</a><br>');
                }
                if(data.file3 != null){
                    $("#file1").append('<a href="/images/'+data.file3+'" target=\"_blank\"">'+data.file3.substring(11)+'</a><br>');
                }
                $('#id').attr('readonly', true);
                $('#btnsubmit').prop("disabled",true);   
               }
            });    
    $('#formData').modal('show');    
}
function addFunction() {
    $('#formData').modal('show');   
    $("#file1").empty();
    $("#file1").append('File :');
    $("#periode_kode").val(""); 
    $("#user_id").val("{{$user->user_id}}"); 
    $("#jenis").val(""); 
    $("#keterangan").val(""); 
    $("#mulai").val(""); 
    $("#akhir").val(""); 
    $("#lokasi").val(""); 
    $("#jml_training").val("0"); 
    $("#jml_lain").val("0"); 
    $("#jml_total").val("0"); 
    $("#status").val("DRF"); 
    $('#btnsubmit').prop("disabled",false);   
}
async function editFunction($id) {    
    await viewFunction($id);
    $('#id').attr('readonly', true);  
    $('#periode_kode').attr('readonly', true); 
    $('#user_id').attr('readonly', true); 
    $('#jenis').attr('readonly', true); 
    $('#keterangan').attr('readonly', true); 
    $('#mulai').attr('readonly', true); 
    $('#akhir').attr('readonly', true); 
    $('#lokasi').attr('readonly', true); 
    $('#jml_training').attr('readonly', true); 
    $('#jml_lain').attr('readonly', true); 
    $('#jml_total').attr('readonly', true); 
    $('#status').attr('readonly', false); 
    // $('#id').attr('readonly', true); 
    // $('#id').attr('readonly', true); 
    // $('#id').attr('readonly', true); 
    // $('#id').attr('readonly', true); 
    // $('#id').attr('readonly', true); 
    // if($("#status").val() == "DRF"){
    //     $('#btnsubmit').prop("disabled",false); 
    // }else{
        $('#btnsubmit').prop("disabled",false); 
    // }      
}

</script>
@endsection