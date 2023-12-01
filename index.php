<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body class="p-3">
  <form method="post" action="http://192.168.3.5:9870/webhdfs/v1/user/master/?op=APPEND&buffersize=1024&noredirect=false" enctype="multipart/form-data">
    <label for="nama">Masukan file</label>
    <input type="file" class="form-control" id="inputGroupFile02">
  
  <button type="submit" class="btn btn-primary btn-block">Upload</button>

    
</form>

  <!-- PHP -->
<?php
$url = 'http://192.168.3.5:9870/webhdfs/v1/user/master?op=LISTSTATUS';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if (curl_errno($ch)){
    echo "Error: " . curl_error($ch);
}

curl_close($ch);



// Mengonversi JSON ke dalam array PHP
$dataArray = json_decode($response, true);
    echo "<br>";
    echo "<br>";
  echo '<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Waktu Akses</th>
        <th>Ukuran Blok</th>
        <th>childrenNum</th>
        <th>fileId</th>
        <th>group</th>
        <th>Ukuran</th>
        <th>Modification time</th>
        <th>Owner</th>
        <th>Nama file</th>
        <th>Permission</th>
        <th>Replikasi</th>
        <th>Storage Policy</th>
        <th>Tipe</th>
      </tr>
    </thead>
    <tbody>';

  // Menggunakan perulangan untuk membuat baris data
  foreach ($dataArray['FileStatuses']['FileStatus'] as $fileStatus) {
    echo '<tr>';
    foreach ($fileStatus as $a) {
      echo '<td>' . $a . '</td>';
    }
    echo '</tr>';
  }

  echo '</tbody>
  </table>';



?>

<!-- Button trigger modal -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>



