@extends('layout.master')

@section('pagetitle')
Pengaturan Departement
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
  <table id="myTable" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Nik Kadep</th>
            <th>Nama Kadep</th>  
            <th>Kode Divisi</th>            
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
                <h5 class="modal-title" id="staticBackdropLabel">Data Departement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/adddepartement" method="POST">
                        {{ csrf_field() }}
                        {{-- <div class="form-group">
                            <input type="text" name="id" class="form-control" id="id">
                        </div> --}}
                        <div class="form-group">
                            <label for="kode">id</label>
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
                            <label for="nik_kadept">NIK Kadept</label>
                            <input type="text" name="nik_kadept" class="form-control" id="nik_kadept" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_kadept">Nama Kadept</label>
                            <input type="text" name="nama_kadept" class="form-control" id="nama_kadept" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="divisi_kode">Divisi</label>
                            <input type="text" name="divisi_kode" class="form-control" id="divisi_kode" required>
                        </div> --}}
                        <div class="form-group">
                            <select name="divisi_kode" class="form-control" id="divisi_kode">
                                <option value="">Divisi</option>
                                @foreach ($divisis as $divisi)
                                <option value={{$divisi->kode}}>{{$divisi->nama}}</option>
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
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '/admin/getdepartement',
        columns: [
            { data: 'kode', name: 'kode' },
            { data: 'nama', name: 'nama' },
            { data: 'nik_kadept', name: 'nik_kadept' },
            { data: 'nama_kadept', name: 'nama_kadept' },
            { data: 'nama_divisi', name: 'nama_divisi' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
} );

async function viewFunction($id) {
    $.ajax({
               type:'GET',
               async: false,
               url:'/admin/getdepartementbyid/'+$id, //    data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                $("#id").val(data.id);
                $("#kode").val(data.kode);
                $("#nama").val(data.nama);
                $("#nik_kadept").val(data.nik_kadept);
                $("#nama_kadept").val(data.nama_kadept);
                $("#divisi_kode").val(data.divisi_kode);  

                $('#id').attr('readonly', true);          
                $('#kode').attr('readonly', true);
                $('#nama').attr('readonly', true);
                $('#nik_kadiv').attr('readonly', true);
                $('#nama_kadiv').attr('readonly', true);
                $('#btnsubmit').prop("disabled",true);   
                $('#btnsubmit').prop("disabled",true); 
                $('#divisi_kode').attr('readonly', true); 
               }
            }); 


    // ajak option divisi
    var unit;
    unit = $('#divisi_kode').val();
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
    $("#divisi_kode").val("");

    $('#id').attr('readonly', true);          
    $('#kode').attr('readonly', false);
    $('#nama').attr('readonly', false);
    $('#nik_kadiv').attr('readonly', false);
    $('#nama_kadiv').attr('readonly', false);
    $('#btnsubmit').prop("disabled",false);   
    $('#divisi_kode').prop("disabled",false);  
}
async function editFunction($id) {    
    await viewFunction($id);
    $('#id').attr('readonly', true);          
    $('#kode').attr('readonly', false);
    $('#nama').attr('readonly', false);
    $('#nik_kadiv').attr('readonly', false);
    $('#nama_kadiv').attr('readonly', false);
    $('#btnsubmit').prop("disabled",false); 
    $('#divisi_kode').prop("disabled",false); 
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