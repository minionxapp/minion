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
            <th>jenis</th>
            <th>keterangan</th>
            <th>mulai</th>
            <th>akhir</th>
            <th>lokasi</th>               
            <th>jml_training</th>
            <th>jml_lain</th>
            <th>jml_total</th>  
            <th>status</th>  
        </tr>
    </thead>
    {{-- @foreach ($wtrans as $item)
    <tr>
        <td> {{$item->periode_kode}}</td>
        <td> {{$item->jenis}}</td>
        <td> {{$item->keterangan}}</td>
        <td> {{$item->mulai}}</td>
        <td> {{$item->akhir}}</td>
        <td> {{$item->lokasi}}</td>
        <td> {{$item->jml_training}}</td>
        <td> {{$item->jml_lain}}</td>
        <td> {{$item->jml_total}}</td>
        <td> {{$item->status}}</td>
    </tr>        
    @endforeach --}}
</table>
</div>


        <!-- Modal -->
        {{-- <div class="modal fade" id="formData" data-backdrop="static" tabindex="-1" role="dialog"
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
                            <label for="kode">id</label>
                            <input type="text" name="id" class="form-control" id="id">
                        </div>

                        <div class="form-group">
                            <label for="">xx</label>
                            <input type="text" name="" class="form-control" id="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="btnsubmit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
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
        ajax: '/walet/getwtranshistoriuser',
        columns: [
            { data: 'periode_kode', name: 'periode_kode' },
            { data: 'jenis',  render: function ( data, type, row ) {  return jenis(data); }  },
            { data: 'keterangan', name: 'keterangan' },
            { data: 'mulai', name: 'mulai' },
            { data: 'akhir', name: 'akhir' },
            { data: 'lokasi', name: 'lokasi' },
            { data: 'jml_training', className: "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' )  },
            { data: 'jml_lain', className: "text-right",render: $.fn.dataTable.render.number( ',', '.', 0, '' )  },
            { data: 'jml_total', className: "text-right", render: $.fn.dataTable.render.number( ',', '.', 0, '' ) },
            { data: 'status', render: function ( data, type, row ) {  return nmStatus(data); }  },
        ],
        
    });  
} );

function nmStatus($status){
    if ($status == 'AJA') return 'Pengajuan Atasan';
    if ($status == 'TLA') return 'Tolak by Atasan';
    if ($status == 'TLD') return 'Tolak by Admin';
    if ($status == 'DRF') return 'Draft';
    if ($status == 'STD') return 'Setuju by Admin';
    // if ($status == '') return '';
    // if ($status == '') return '';
    // if ($status == '') return '';
}

function jenis($jenis){
    if ($jenis == 'TR') return 'Training';
    if ($jenis == 'SM') return 'Seminar';
    if ($jenis == 'EL') return 'E-Learning';
    if ($jenis == 'TT') return 'Training Tool';
    if ($jenis == 'WB') return 'Webinar';
    // if ($jenis == '') return '';
}



async function viewFunction($id) {
    $.ajax({
               type:'GET',
               async: false,
               url:'/admin/xxxxxxx/'+$id, //    data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                $("#id").val(data.id);
                //$("#").val(data.);

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