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
            <th>Kode</th>
            <th>Nama</th>
            <th>Nik Kadiv</th>
            <th>Nama Kadiv</th>            
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
                    <form action="/admin/adddivisi" method="POST">
                        {{ csrf_field() }}
                        {{-- <div class="form-group">
                            <input type="text" name="id" class="form-control" id="id">
                        </div> --}}
                        <div class="form-group">
                            <label for="kode">idxxxxxxx</label>
                            <input type="text" name="id" class="form-control" id="id">
                        </div>

                        <div class="form-group">
                          <label for="kode">Kode</label>
                          <input type="text" name="kode" class="form-control" id="kode" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="nik_kadiv">NIK Kadiv</label>
                            <input type="text" name="nik_kadiv" class="form-control" id="nik_kadiv" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_kadiv">Nama Kadiv</label>
                            <input type="text" name="nama_kadiv" class="form-control" id="nama_kadiv" required>
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
        ajax: '/admin/getdivisi',
        columns: [
            { data: 'kode', name: 'kode' },
            { data: 'nama', name: 'nama' },
            { data: 'nik_kadiv', name: 'nik_kadiv' },
            { data: 'nama_kadiv', name: 'nama_kadiv' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
} );

async function viewFunction($id) {
    $.ajax({
               type:'GET',
               async: false,
               url:'/admin/getdivisibyid/'+$id, //    data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                $("#id").val(data.id);
                $("#kode").val(data.kode);
                $("#nama").val(data.nama);
                $("#nik_kadiv").val(data.nik_kadiv);
                $("#nama_kadiv").val(data.nama_kadiv);
                $("#role").val(data.role);  

                $('#id').attr('readonly', true);          
                $('#kode').attr('readonly', true);
                $('#nama').attr('readonly', true);
                $('#nik_kadiv').attr('readonly', true);
                $('#nama_kadiv').attr('readonly', true);
                $('#btnsubmit').prop("disabled",true);   
                $('#btnsubmit').prop("disabled",true); 
               }
            });    
    $('#formData').modal('show');    
}
function addFunction() {
    $('#formData').modal('show');   
    // $('#id').prop("disabled",false);
    $("#id").val("");
    $("#kode").val("");
    $("#nama").val("");
    $("#nik_kadiv").val("");
    $("#nama_kadiv").val("");

    $('#id').attr('readonly', true);          
    $('#kode').attr('readonly', false);
    $('#nama').attr('readonly', false);
    $('#nik_kadiv').attr('readonly', false);
    $('#nama_kadiv').attr('readonly', false);
    $('#btnsubmit').prop("disabled",false);   
}
async function editFunction($id) {    
    await viewFunction($id);
    $('#id').attr('readonly', true);          
    $('#kode').attr('readonly', false);
    $('#nama').attr('readonly', false);
    $('#nik_kadiv').attr('readonly', false);
    $('#nama_kadiv').attr('readonly', false);
    $('#btnsubmit').prop("disabled",false); 
}

// function deleteFunction($id) {
//     alert("delete:"+$id);
//     $.ajax({
//                type:'GET',
//                async: false,
//                url:'/delUserbyId/'+$id, //    data:'_token = <?php echo csrf_token() ?>',
//                success:function(data) {
//                 alert("delete:"+$id);
//                }
//             });    
// }
</script>
@endsection