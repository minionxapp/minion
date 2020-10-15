@extends('layout.master')

@section('pagetitle')
Wallet Transaksi
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
                <h5 class="modal-title" id="staticBackdropLabel">Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/walet/addwtransaksiuser" method="POST">
                        {{ csrf_field() }}
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
                            <label for="status">status</label>
                            {{-- <input type="status" name="file3" class="form-control" id="status"> --}}
                            <select name="status" class="form-control" id="status">
                                <option value='DRF'>DRAFT</option>
                                <option value='AJU'>Pengajuan</option>
                                {{-- <option value='SLS'>Selesai</option> --}}
                            </select>
                        </div>   


                        <div class="form-group">
                            <label for="file1">file1</label>
                            <input type="text" name="file1" class="form-control" id="file1">
                        </div>
                        <div class="form-group">
                            <label for="file2">file2</label>
                            <input type="text" name="file2" class="form-control" id="file2">
                        </div>
                        <div class="form-group">
                            <label for="file3">file3</label>
                            <input type="text" name="file3" class="form-control" id="file3">
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
               url:'/admin/xxxxxxx/'+$id, //    data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                $("#id").val(data.id);              

                $('#id').attr('readonly', true);
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
    // $('#id').attr('readonly', true);         
    $('#btnsubmit').prop("disabled",false); 
}

</script>
@endsection