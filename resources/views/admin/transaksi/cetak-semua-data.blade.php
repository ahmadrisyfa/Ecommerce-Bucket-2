<!DOCTYPE html>
<html>
<head>
  <title>Tabel Cetak</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
    <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pembeli</th>
            <th>Total</th>
            <th>Tanggal Pemesanan</th>
          </tr>
        </thead>
        <tbody>                        
          @foreach ($data as $value)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$value->user->name}}</td>
            <td>@currency($value->total)</td>
            <td>{{$value->created_at}}</td>                      
          </tr>
          @endforeach
        
        </tbody>
      </table>

  <script>
      window.print();
  </script>

</body>
</html>
