<!DOCTYPE html>
<html>
<head>
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

<div>  
    {{!!$no = 0}}
    <table id="myTable" class="display nowrap" style="width:80%; overflow-x:auto;">
      <thead>
          <tr>
            <th>No</th>
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
{{-- {{$daftar}} --}}
</body>
</html>