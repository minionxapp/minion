@extends('layout.master')

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
  <table id="myTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Nama</th>
            <th>E-mail</th>
            <th>Divisi</th>
            <th>Departemen</th>
            <th>Role</th>
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
                    <form action="/admin/adduser" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>

                        <div class="form-group">
                          <label for="userid">User Id</label>
                          <input type="text" name="userid" class="form-control" id="userid" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="nama_unit_kerja">Nama Unit Kerja</label>
                            <input type="text" name="nama_unit_kerja" class="form-control" id="nama_unit_kerja">
                        </div> --}}


                        {{-- <div class="form-group">
                            <select name="nama_unit_kerja" class="form-control" id="nama_unit_kerja">
                                <option value="">Unit Kerja</option>
                                @foreach ($divisis as $divisi)
                                <option value={{$divisi->kode}}>{{$divisi->nama}}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="form-group">
                            <select name="divisi_kode" class="form-control" id="divisi_kode">
                                <option value="">Divisi</option>
                                @foreach ($divisis as $divisi)
                                <option value={{$divisi->kode}}>{{$divisi->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        
                        <div class="form-group">
                            <label for="departemen">Departemen</label>
                            <input type="text" name="departemen" class="form-control" id="departemen">
                        </div>
                        {{-- <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" name="role" class="form-control" id="role" required>
                        </div> --}}
                        <div class="form-group">
                            <select name="role" class="form-control" id="role">
                                <option value="">Role</option>
                                @foreach ($roles as $role)
                                <option value={{$role->role_id}}>{{$role->desc}}</option>
                                @endforeach
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
        processing: true,
        serverSide: true,
        ajax: '/admin/getuser',
        columns: [
            { data: 'user_id', name: 'userid' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'nama_divisi', name: 'divisi' },
            { data: 'departemen', name: 'departemen' },
            { data: 'role', name: 'role' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
} );

async function viewFunction($id) {
    $.ajax({
               type:'GET',
               async: false,
               url:'/admin/getuserbyid/'+$id, //    data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                $("#id").val(data.id);
                $("#userid").val(data.user_id);
                $("#name").val(data.name);
                $("#email").val(data.email);
                $("#nama_unit_kerja").val(data.nama_unit_kerja);
                $("#departemen").val(data.departemen);
                $("#role").val(data.role);  
                $("#divisi_kode").val(data.divisi_kode);  

                $('#userid').attr('readonly', true);  
                $('#name').attr('readonly', true); 
                $('#email').attr('readonly', true); 
                $('#divisi_kode').attr('readonly', true); 
                $('#nama_unit_kerja').attr('readonly', true); 
                $('#departemen').attr('readonly', true); 
                $('#role').attr('readonly', true); 
                $('#divisi_kode').attr('readonly', true); 
                $('#btnsubmit').prop("disabled",true); 
               }
            });    
    $('#formData').modal('show');    
}
function addFunction() {
    $('#formData').modal('show');   
    $('#userid').prop("disabled",false);
    $("#userid").val("");
    $("#name").val("");
    $("#email").val("");
    $("#nama_unit_kerja").val("");
    $("#departemen").val("");
    $("#role").val(""); 

    $('#userid').attr('readonly', false);  
    $('#name').attr('readonly', false); 
    $('#email').attr('readonly', false); 
    $('#nama_unit_kerja').attr('readonly', false); 
    $('#departemen').attr('readonly', false); 
    $('#role').attr('readonly', false); 
    $('#divisi_kode').attr('readonly', false); 
    $('#btnsubmit').prop("disabled",false);  
}
async function editFunction($id) {
    await viewFunction($id);
    var unit;
    $('#userid').attr('readonly', true);  
    $('#name').attr('readonly', false); 
    $('#email').attr('readonly', false); 
    $('#nama_unit_kerja').attr('readonly', false); 
    $('#divisi_kode').attr('readonly', false); 
    $('#departemen').attr('readonly', false); 
    $('#role').attr('readonly', false); 
    $('#btnsubmit').prop("disabled",false); 
   unit = $('#divisi_kode').val();
// ajak option divisi
        $.ajax({
            url: '/admin/getalldivisi/',
            type: "GET",
            async: false,
            dataType: "json",
            success:function(data) {
                $('select[name="divisi_kode"]').empty();
                $.each(data, function(key, value) {
                    if(unit== value.kode ){
                        $('select[name="divisi_kode"]').append('<option value="'+ value.kode +'" selected="true">'+ value.nama +'</option>');
                    }else{
                        $('select[name="divisi_kode"]').append('<option value="'+ value.kode +'">'+ value.nama +'</option>');
                
                    }
                });
            }
        });
// option Role
        $.ajax({
            url: '/admin/getallrole/',
            type: "GET",
            async: false,
            dataType: "json",
            success:function(data) {
                $('select[name="role"]').empty();
                $.each(data, function(key, value) {
                    if(unit== value.kode ){
                        $('select[name="role"]').append('<option value="'+ value.role_id +'" selected="true">'+ value.desc +'</option>');
                    }else{
                        $('select[name="role"]').append('<option value="'+ value.role_id +'">'+ value.desc +'</option>');
                
                    }
                });
            }
        });

}

</script>
@endsection