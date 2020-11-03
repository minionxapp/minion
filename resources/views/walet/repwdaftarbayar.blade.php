<!DOCTYPE html>
<html>
<head>

  <title>Minion | Project</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  




<style>
#myTable {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
  margin: auto;
}

#myTable td, #myTable th {
  border: 1px solid #ddd;
  padding: 8px;
}

#myTable tr:nth-child(even){background-color: #f2f2f2;}

#myTable tr:hover {background-color: #ddd;}

#myTable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<div>  <h1 style="text-align:center">Daftar Pembayaran LW</h1>
      <h1 style="text-align:center">--------------------------</h1>
    {{!!$no = 0}}
    <table id="myTable" class="display nowrap" style="width:80%; overflow-x:auto;">
      <thead>
          <tr>
            <th>No</th>
            <th>ID</th>
            <th>periode_kode</th>
            <th>user_id</th>
            <th>jenis</th>
            <th>keterangan</th>
            <th>mulai</th>
            <th>akhir</th>
            <th>jml_total</th>  
            <th>status</th>  
          </tr>
      </thead>
      @foreach ($daftar_bayar as $bayar)
          {{!++$no }}
        <tr>
          <td>{{$no}}</td>
          <td><a href="#" onclick="javascript:editFunction({{$bayar->id}})">   {{$bayar->id}}</a></td>
          <td>{{$bayar->periode_kode}}</td>
          <td>{{$bayar->user_id}}</td>
          <td>{{$bayar->jenis}}</td>
          <td>{{$bayar->keterangan}}</td>
          <td>{{$bayar->mulai}}</td>
          <td>{{$bayar->akhir}}</td>
          <td>{{$bayar->jml_total}}</td>
          <td>{{$bayar->status}}</td>
          
        </tr>
    @endforeach
  </table>
  </div>
<!-- Modal -->
<div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
aria-labelledby="addDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Pertanggung Jawaban Wallet : 
            <label id="saldo">0</label>
        </h5>
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="/walet/updaterepwdaftarbayar" method="POST" enctype="multipart/form-data">
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
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="jenis">jenis</label>
                        <select name="jenis" class="form-control" id="jenis">
                            <option value='TR'>Training</option>
                            <option value='SM'>Seminar</option>
                            <option value='WB'>Webinar</option>
                            <option value='EL'>E-Learning</option>
                            <option value='TT'>Training Tool</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="keterangan">keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan">
                </div>
                <div class="div row">
                    <div class="form-group col-sm-6">
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
                        <input type="number" value="0" name="jml_training" class="form-control" id="jml_training">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="jml_lain">By Lain</label>
                        <input type="number" value="0" name="jml_lain" class="form-control" id="jml_lain">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="jml_total">By Total</label>
                        <input type="number" value="0" name="jml_total" class="form-control" id="jml_total" readonly>
                    </div>
                </div>


                <div class="div row">
                    <div class="form-group col-md-4">
                        <label for="nik_atasan">nik_atasan</label>
                        <input type="text" name="nik_atasan" class="form-control" id="nik_atasan">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="nama_atasan">nama_atasan</label>
                        <input type="text" name="nama_atasan" class="form-control" id="nama_atasan" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="status">status</label>
                        <select name="status" class="form-control" id="status" readonly>
                            <option value='STD'>Setuju Admin</option>
                        </select>
                    </div>   
                    <div class="form-group col-md-6">
                        <label for="status">status Pertanggung Jawaban</label>
                        <select name="status_jwb" class="form-control" id="status_jwb" readonly>
                            {{-- <option value='AJU'>Pengajuan</option>
                            <option value='KMB'>Kembalikan</option> --}}
                            <option value='STD'>Setuju Admin</option>
                        </select>
                    </div>  

                    <div class="form-group col-md-12">
                        <label for="status">Daftar Bayar</label>
                        <select name="daftar_bayar_id" class="form-control" id="daftar_bayar_id" readonly>
                            <option value=''>Keluar</option>
                        </select>
                    </div>  


                    <div class="form-group col-md-12">
                        <label for="catatan_jwb">Catatan</label>
                        <input type="text" name="catatan_jwb" class="form-control" id="catatan_jwb" >
                    </div>   

                </div>
                <div class="form-group">
                    <label for="file1" id='file1'>File : </label> 
                </div>

                <div class="form-group">
                    <label for="file1_jwb" id='file1_jwb'>File Pendukung </label> 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btnsubmit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>





<script type="text/javascript">
    function editFunction($id) {
      $("#editModal").modal('show'); 
      viewFunction($id);  
    }
    async function viewFunction($id) {   
    $("#file1").empty();
    $("#file1").append("File Pengajuan : <br>");
    $("#file1_jwb").empty();
    $("#file1_jwb").append("File Pertanggung Jawaban  :<br>");
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
                $("#nik_atasan").val(data.nik_atasan); 
                $("#nama_atasan").val(data.nama_atasan); 
                $("#catatan_jwb").val(data.catatan_jwb); 
                
                if(data.file1 != null){
                    $("#file1").append(' <a href="/images/'+data.file1+'" target=\"_blank\"">'+data.file1.substring(11)+'</a>');
                }
                if(data.file2 != null){
                    $("#file1").append(' <a href="/images/'+data.file2+'" target=\"_blank\"">'+data.file2.substring(11)+'</a>');
                }
                if(data.file3 != null){
                    $("#file1").append(' <a href="/images/'+data.file3+'" target=\"_blank\"">'+data.file3.substring(11)+'</a>');
                }


                if(data.file1_jwb != null){
                    $("#file1_jwb").append('  <a href="/images/'+data.file1_jwb+'" target=\"_blank\"">'+(data.file1_jwb).substring(11)+'</a>');
                }
                if(data.file2_jwb != null){
                    $("#file1_jwb").append(' <a href="/images/'+data.file2_jwb+'" target=\"_blank\"">'+data.file2_jwb.substring(11)+'</a>');
                }
                if(data.file3_jwb != null){
                    $("#file1_jwb").append(' <a href="/images/'+data.file3_jwb+'" target=\"_blank\"">'+data.file3_jwb.substring(11)+'</a>');
                }
                $("#status_jwb").val(data.status_jwb); 
                $("#daftar_bayar_id").val(data.daftar_bayar_id); 
                $('#id').attr('readonly', true);
                $('#btnsubmit').prop("disabled",false);   
               }
            });    
        $('#formData').modal('show');    
        $("#periode_kode").attr("readonly",true);
        $("#user_id").attr("readonly",true);
        $("#jenis").attr("readonly",true);
        $("#keterangan").attr("readonly",true);
        $("#mulai").attr("readonly",true); 
        $("#akhir").attr("readonly",true);
        $("#nik_atasan").attr("readonly",true);
        $("#lokasi").attr("readonly",true); 
        $("#jml_training").attr("readonly",true);
        $("#jml_lain").attr("readonly",true); 
        $("#jml_total").attr("readonly",true);
        $("#status").attr("readonly",true);
        $('#jml_total').attr("readonly",true); 
        $('#user_id').attr('readonly', true);

}//end off document ready











  </script>
</body>
</html>