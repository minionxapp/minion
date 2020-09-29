@extends('layout.master')

@section('pagetitle')
Pengaturan Divisi
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
            <th>a</th>
            <th>b</th>
            <th>c</th>            
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
                    <form action="/admin/xxx" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="kode">idxxxxxxx</label>
                            <input type="text" name="id" class="form-control" id="id">
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
    // $('#myTable').DataTable({
    //     rowReorder: {
    //         selector: 'td:nth-child(2)'
    //     },
    //     responsive: true,
    //     processing: true,
    //     serverSide: true,
    //     ajax: '/admin/getdivisi',
    //     columns: [
    //         { data: 'kode', name: 'kode' },
    //         { data: 'nama', name: 'nama' },
    //         { data: 'nik_kadiv', name: 'nik_kadiv' },
    //         { data: 'nama_kadiv', name: 'nama_kadiv' },
    //         { data: 'action', name: 'action', orderable: false, searchable: false}
    //     ],
        
    // });
} );

async function viewFunction($id) {
    // $.ajax({
    //            type:'GET',
    //            async: false,
    //            url:'/admin/getdivisibyid/'+$id, //    data:'_token = <?php echo csrf_token() ?>',
    //            success:function(data) {
    //             $("#id").val(data.id);

    //             $('#nik_kadiv').attr('readonly', true);
    //             $('#btnsubmit').prop("disabled",true);   
    //            }
    //         });    
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