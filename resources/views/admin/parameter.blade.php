@extends('layout.master')

@section('content')
<div class="row text-nowrap">
  <div class="col-12" style="padding-top: 5px;">
    <button type="button" class="btn btn-primary btn-sm float-left"  
    data-toggle="modal" data-target="#addData">Add
</button>
  </div>
</div>

<div>  
  <table id="myTable" class="display" style="width:100%">
    <thead>
        
        <tr>
            <th>param_id</th>
            <th>group_id</th>
            <th>group_desc</th>
            <th>param_value</th>
            <th>param_label</th>
            <th>param_urut</th>
            {{-- <th>Action</th> --}}
        </tr>
    </thead>
</table>
</div>


        <!-- Modal -->
        <div class="modal fade" id="addData" data-backdrop="static" tabindex="-1" role="dialog"
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
                    <form action="/adduser" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="userid">User Id</label>
                          <input type="text" name="userid" class="form-control" id="userid">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="nama_unit_kerja">Nama Unit Kerja</label>
                            <input type="text" name="nama_unit_kerja" class="form-control" id="nama_unit_kerja">
                        </div>
                        <div class="form-group">
                            <label for="departemen">Departemen</label>
                            <input type="text" name="departemen" class="form-control" id="departemen">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" name="role" class="form-control" id="role">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('js')
{{-- <script type="text/javascript">
 $(document).ready(function() {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/getuser',
        columns: [
            { data: 'user_id', name: 'userid' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'departemen', name: 'departemen' },
            { data: 'nama_unit_kerja', name: 'nama_unit_kerja' },
            { data: 'role', name: 'role' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
} );
</script> --}}
@endsection