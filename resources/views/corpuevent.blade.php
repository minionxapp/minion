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
            <th>Jenis</th>
            <th>Div Kode</th>
            <th>Divisi</th>
            <th>Dep Kode</th>
            <th>Departement</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Tahun</th>
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
                <h5 class="modal-title" id="staticBackdropLabel">Data Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/addevent" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{-- <label for="kode">id</label> --}}
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="jenis">jenis</label>
                                {{-- <input type="text" name="jenis" class="form-control" id="jenis"> --}}
                                <select name="jenis" class="form-control" id="jenis">
                                    <option value="">Jenis</option>
                                    <option value="TR">Training</option>
                                    <option value="WB">Webinar</option>
                                    <option value="EL">E-Learning</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Divisi</label>
                            <select name="divisi_kode" class="form-control" id="divisi_kode">
                                <option value="">Divisi</option>
                                @foreach ($divisis as $divisi)
                                <option value={{$divisi->kode}}>{{$divisi->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Departement</label>
                            <select name="departement_kode" class="form-control" id="departement_kode">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="judul">judul</label>
                            <input type="text" name="judul" class="form-control" id="judul">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi">
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="mulai">mulai</label>
                                <input type="date" name="mulai" class="form-control" id="mulai">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="selesai">selesai</label>
                                <input type="date" name="selesai" class="form-control" id="selesai">
                            </div>
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
            ajax: '/getallevent',
            columns: [
                { data: 'jenis', name: 'jenis' },
                { data: 'divisi_kode', name: 'divisi_kode' },
                { data: 'nama_divisi', name: 'divisi' },
                { data: 'departement_kode', name: 'departement_kode' },
                { data: 'nama_departement', name: 'departement' },
                { data: 'judul', name: 'judul' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'mulai', name: 'mulai' },
                { data: 'selesai', name: 'selesai' },
                { data: 'tahun', name: 'tahun' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            
        });


// // Departemen untu add
$('select[name="divisi_kode"]').on('change', function() {
            var divisi_kode = $(this).val();
            $('select[name="departement_kode"]').empty();
            $.ajax({
                    url: '/admin/getdepartementbydivisi/'+divisi_kode,
                    type: "GET",
                    async: false,
                    dataType: "json",
                    success:function(data) {
                        $('select[name="departement_kode"]').empty();
                        $.each(data, function(key, value) {
                            if(divisi_kode== value.kode ){
                                $('select[name="departement_kode"]').append('<option value="'+ value.kode +'" selected="true">'+ value.nama +'</option>');
                            }else{
                                $('select[name="departement_kode"]').append('<option value="'+ value.kode +'">'+ value.nama +'</option>');
                            }
                        });
                    }
                });
        });
    } 
);

async function viewFunction($id) {
    $.ajax({
               type:'GET',
               async: false,
               url:'/geteventbyid/'+$id, //    data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                $("#id").val(data.id);
                $("#jenis").val(data.jenis);
                $("#divisi_kode").val(data.divisi_kode);
                $("#departement_kode").val(data.departement_kode);
                $("#judul").val(data.judul);
                $("#deskripsi").val(data.deskripsi);
                $("#mulai").val(data.mulai);
                $("#selesai").val(data.selesai);
                $("#tahun").val(data.tahun);
                
                 // Departemen
                var divisi_kode = data.divisi_kode;
                var dept = data.departemen;
                $.ajax({
                    url: '/admin/getdepartementbydivisi/'+divisi_kode,
                    type: "GET",
                    async: false,
                    dataType: "json",
                    success:function(data) {
                        $('select[name="departement_kode"]').empty();
                        $.each(data, function(key, value) {
                            if(dept == value.kode ){
                                $('select[name="departement_kode"]').append('<option value="'+ value.kode +'" selected="true">'+ value.nama +'</option>');
                            }else{
                                $('select[name="departement_kode"]').append('<option value="'+ value.kode +'">'+ value.nama +'</option>');
                            }
                        });
                    }
                });


                // $('#nik_kadiv').attr('readonly', true);
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