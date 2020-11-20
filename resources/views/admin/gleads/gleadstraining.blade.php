@extends('layout.master')

@section('pagetitle')
Daftar Training
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
            <th>modul_name</th>
            <th>program_name</th>
            <th>skill_name</th>
            <th>modul_type</th>            
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
                <h5 class="modal-title" id="staticBackdropLabel">Dfatr Training</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/gleads/addGleadstraining" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="kode">id</label>
                            <input type="text" name="id" class="form-control" id="id">
                        </div>
                        <div class="form-group">
                            <label for="tahun">tahun</label>
                            <input type="text" name="tahun" class="form-control" id="tahun">
                        </div>
                        <div class="form-group">
                            <label for="modul_id">modul_id</label>
                            <input type="text" name="modul_id" class="form-control" id="modul_id">
                        </div>
                        <div class="form-group">
                            <label for="program_name">program_name</label>
                            <input type="text" name="program_name" class="form-control" id="program_name">
                        </div>
                        <div class="form-group">
                            <label for="skill_name">skill_name</label>
                            <input type="text" name="skill_name" class="form-control" id="skill_name">
                        </div>
                        <div class="form-group">
                            <label for="modul_name">modul_name</label>
                            <input type="text" name="modul_name" class="form-control" id="modul_name">
                        </div>                     
                        <div class="form-group">
                            <label for="jamlat">jamlat</label>
                            <input type="text" name="jamlat" class="form-control" id="jamlat">
                        </div>
                        <div class="form-group">
                            <label for="hitung">Hitung Jamlat</label>
                            {{-- <input type="text" name="hitung" class="form-control" id="hitung"> --}}
                            <select name="hitung" class="form-control" id="hitung">
                                <option value="NA">NA</option>
                                <option value="Y">YA</option>
                                <option value="N">Tidak</option>
                            </select>

                        </div>
                        {{-- <div class="form-group">
                            <label for="enrolled">enrolled</label>
                            <input type="text" name="enrolled" class="form-control" id="enrolled">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="selesai">selesai</label>
                            <input type="text" name="selesai" class="form-control" id="selesai">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="progress">progress</label>
                            <input type="text" name="progress" class="form-control" id="progress">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="belum">belum</label>
                            <input type="text" name="belum" class="form-control" id="belum">
                        </div> --}}
                        <div class="form-group">
                            <label for="modul_type">modul_type</label>
                            {{-- <input type="text" name="modul_type" class="form-control" id="modul_type"> --}}
                            <select name="modul_type" class="form-control" id="modul_type">
                                <option value="Elearing">Elearing</option>
                                <option value="VClass">Virtual Class</option>
                                <option value="ClassRoom">Class Room</option>
                                <option value="Webinar">Webinar</option>
                                <option value="Sosialisasi">Sosialisasi</option>                      
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="type_enroll">type_enroll</label>
                            <select name="type_enroll" class="form-control" id="type_enroll">                                <
                                <option value="Classroom">Classroom</option>                      
                                <option value="Self-paced">Self-paced</option>
                            </select>
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
        ajax: '/gleads/listGleadstraining',
        columns: [
            { data: 'modul_name', name: 'modul_name' },
            { data: 'program_name', name: 'program_name' },
            { data: 'skill_name', name: 'skill_name' },
            { data: 'modul_type', name: 'modul_type' },
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
               url:'/gleads/getGleadstrainingById/'+$id, //    data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                $("#id").val(data.id);
                $("#tahun").val(data.tahun);
                $("#modul_id").val(data.modul_id);
                $("#program_name").val(data.program_name);
                $("#skill_name").val(data.skill_name);
                $("#modul_name").val(data.modul_name);
                $("#jamlat").val(data.jamlat);
                $("#hitung").val(data.hitung);
                $("#enrolled").val(data.enrolled);
                $("#selesai").val(data.selesai);
                $("#progress").val(data.progress);
                $("#belum").val(data.belum);
                $("#modul_type").val(data.modul_type);
                // $("#").val(data.);
                $('#id').attr('readonly', true);
                $('#tahun').attr('readonly', true);
                $("#modul_id").attr('readonly', true);
                $("#program_name").attr('readonly', true);
                $("#skill_name").attr('readonly', true);
                $("#modul_name").attr('readonly', true);
                $("#jamlat").attr('readonly', true);
                $("#hitung").attr('readonly', true);
                $("#enrolled").attr('readonly', true);
                $("#selesai").attr('readonly', true);
                $("#progress").attr('readonly', true);
                $("#belum").attr('readonly', true);
                $("#modul_type").attr('readonly', true);
                $('#btnsubmit').prop("disabled",true);   
               }
            });    
    $('#formData').modal('show');    
}
function addFunction() {
    $('#formData').modal('show');   
    $('#id').attr('readonly', true);
    $('#tahun').attr('readonly', false);
    $("#modul_id").attr('readonly', false);
    $("#program_name").attr('readonly', false);
    $("#skill_name").attr('readonly', false);
    $("#modul_name").attr('readonly', false);
    $("#jamlat").attr('readonly', false);
    $("#hitung").attr('readonly', false);
    $("#enrolled").attr('readonly', false);
    $("#selesai").attr('readonly', false);
    $("#progress").attr('readonly', false);
    $("#belum").attr('readonly', false);
    $("#modul_type").attr('readonly', false);
    $('#btnsubmit').prop("disabled",false);   
}
async function editFunction($id) {    
    await viewFunction($id);
    $('#formData').modal('show');   
    $('#id').attr('readonly', true);
    $('#tahun').attr('readonly', false);
    $("#modul_id").attr('readonly', false);
    $("#program_name").attr('readonly', false);
    $("#skill_name").attr('readonly', false);
    $("#modul_name").attr('readonly', false);
    $("#jamlat").attr('readonly', false);
    $("#hitung").attr('readonly', false);
    $("#enrolled").attr('readonly', false);
    $("#selesai").attr('readonly', false);
    $("#progress").attr('readonly', false);
    $("#belum").attr('readonly', false);
    $("#modul_type").attr('readonly', false);        
    $('#btnsubmit').prop("disabled",false); 
}

</script>
@endsection