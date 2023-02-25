<?php 
// Koneksi DB
$connect = mysqli_connect('localhost', 'root', '', 'project_masjid');

// =========================================================

function query($query) {
  global $connect;
  $result = mysqli_query($connect, $query);
  $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
}

// =========================================================


// =========================================================
function login($data) {
  global $connect;

  $username = htmlspecialchars($data['username']);
	$password = md5($data['password']);
	$cekUser = mysqli_query($connect, "SELECT * FROM users WHERE username='$username' AND password='$password' AND level = 'admin' ");

	if (mysqli_num_rows($cekUser) > 0) {
		$data = mysqli_fetch_assoc($cekUser);

    $_SESSION['login'] = true;
    $_SESSION['id_admin'] = $data['id_user'];
    return $_SESSION;
  }  else {
    $_SESSION['gagalLogin'] = true;
    return $_SESSION['gagalLogin'];
  }

}

// =========================================================

// UBAH USER
function editUser($data) {
  global $connect;

  $id_user = $data['id_user'];
  $nama_user = $data['nama_user'];
  $username = $_POST['username'];

  // Cek username dari id_user
  $cekUser = query("SELECT username FROM users WHERE id_user = $id_user")[0];
  // Cek inputan user apakah sama dengan yg di DB
  if ($username != $cekUser['username']) {
    // cek jika username sama
    $result = mysqli_query($connect, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
      $_SESSION['ubahUserReady'] = true;
      return $_SESSION['ubahUserReady'];
    }
  }
  
  
  // cek input password user
  if (!empty($data['password'])) {
    $password = md5($data['password']);
  } else {
    $password = $data['passwordLama'];
  }
  
  // Lakukan query UPDATE untuk mengubah data user
  $query = "UPDATE users SET 
            nama_user = '$nama_user', 
            username = '$username',
            password = '$password'
            WHERE id_user = $id_user
            ";

  $input = mysqli_query($connect, $query);

  if (mysqli_affected_rows($connect) > 0) {
    $_SESSION['editUser'] = true;
    return $_SESSION['editUser'];
  }
  return $_SESSION;
  
}


// HAPUS 
function hapus($id, $table, $idDb) {
  global $connect;

  $result_fields = mysqli_query($connect, "SELECT * FROM $table LIMIT 1");
  $num_fields = mysqli_num_fields($result_fields);

  // CEK LOKASI FILE FOTO ATAU VIDEO
  if ($table == "news") {
    $locationPhotos = "news";
  }  elseif ($table == "imam") {
    $locationPhotos = "imam";
  } elseif ($table == "video") {
    $locationPhotos = "thumbnail";
  }
  
  // Cek apakah kolom "foto" ada dalam tabel
  $foto_column_exists = false;
  for ($i = 0; $i < $num_fields; $i++) {
    $field_info = mysqli_fetch_field_direct($result_fields, $i);
    if ($field_info->name === 'foto') {
      $foto_column_exists = true;
      break;
    }
  }
  
  // Cek apakah kolom "video" ada dalam tabel
  $video_column_exists = false;
  for ($i = 0; $i < $num_fields; $i++) {
    $field_info = mysqli_fetch_field_direct($result_fields, $i);
    if ($field_info->name === 'video') {
      $video_column_exists = true;
      break;
    }
  }

  if ($foto_column_exists) {
    // Jika kolom "foto" ada, lakukan penghapusan file
    $result_nama_file = mysqli_query($connect, "SELECT foto FROM $table WHERE $idDb = $id");
    $nama_file = mysqli_fetch_assoc($result_nama_file)['foto'];

    $file_path = "../../assets/img/$locationPhotos/" . $nama_file;
    if (file_exists($file_path)) {
        unlink($file_path);
    }
  }
  
  if ($video_column_exists) {
    // Jika kolom "video" ada, lakukan penghapusan file
    $result_nama_file = mysqli_query($connect, "SELECT video FROM $table WHERE $idDb = $id");
    $nama_file = mysqli_fetch_assoc($result_nama_file)['video'];

    $file_path = "../../assets/video/" . $nama_file;
    if (file_exists($file_path)) {
        unlink($file_path);
    }
  }

  $cekDb = mysqli_query($connect, "DELETE FROM $table WHERE $idDb = $id");

  return $_SESSION['hapus'] = true;
}


// TAMBAH USER
function tambahUser($data) {
  global $connect;

  $nama_user = $data['nama'];
  $username = $data['username'];
  $password = md5($data['password']);

  // cek username sudah terdaftar atau belum
  $result = mysqli_query($connect, "SELECT username FROM users WHERE username = '$username' ");
  if (mysqli_fetch_assoc($result)) {
    // jika username sudah terdaftar, set session userReady
    $_SESSION['userReady'] = true;
    return $_SESSION['userReady'];
  } else {
    // jika username belum terdaftar, lakukan insert ke database
    $query = "INSERT INTO users (nama_user, username, password, level) VALUES ('$nama_user', '$username', '$password', 'user') ";
    if (mysqli_query($connect, $query)) {
      // jika insert berhasil, set session tambah data berhasil
      $_SESSION['tambahUser'] = true;
      return $_SESSION['tambahUser'];
    } else {
      // jika insert gagal, set session error
      $_SESSION['error'] = mysqli_error($connect);
      return false;
    }
  }
}

function upload() {
  global $connect;

  $namaFile = $_FILES['foto']['name'];
  $error = $_FILES['foto']['error'];
  $ukuranFile = $_FILES['foto']['size'];
  $tmpName = $_FILES['foto']['tmp_name'];

   // cek ukuran file
  if ($ukuranFile > 4000000) { // satuan perhitungannya adalah kilobyte(kb)
    $_SESSION['overSize'] = true;
    return false;
  }

  //lolos pengecekan
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $namaFile;
  $lokasiUpload = "../../assets/img/news/";
  move_uploaded_file($tmpName, $lokasiUpload.$namaFileBaru);
  return $namaFileBaru;
}


// UBAH NEWS
function ubahNews($data) {
  global $connect;

  $id_news = $data['id_news'];  
  $judul = htmlspecialchars($data['judul']);
  $deskripsi = htmlspecialchars($data['deskripsi']);

  $gambar = null;
  if (!empty($_FILES['foto']['name'])) {
    $gambar = upload();
    if (!$gambar) {
      return false;
    }
  }

  if ($gambar) {
    $query = "UPDATE news SET judul = '$judul', deskripsi = '$deskripsi', foto = '$gambar' WHERE id_news = $id_news";
  } else {
    $query = "UPDATE news SET judul = '$judul', deskripsi = '$deskripsi' WHERE id_news = $id_news";
  }

  $result = mysqli_query($connect, $query);
  if ($result) {
    $_SESSION['ubahNews'] = true;
  }

  return $result;
}


// TAMBAH NEWS
function tambahNews($data) {
  global $connect;

  $judul = htmlspecialchars($data['judul']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $tgl_post = date("Y-m-d");
  // cek masuk ke function upload
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO news
                VALUES
            (NULL, '$judul', '$tgl_post', '$deskripsi', '$gambar')
            ";

  mysqli_query($connect, $query);

  return $_SESSION['tambahNews'] = true;
}

function uploadMasjid() {
  global $connect;

  $namaFile = $_FILES['foto']['name'];
  $error = $_FILES['foto']['error'];
  $ukuranFile = $_FILES['foto']['size'];
  $tmpName = $_FILES['foto']['tmp_name'];

   // cek ukuran file
  if ($ukuranFile > 4000000) { // satuan perhitungannya adalah kilobyte(kb)
    $_SESSION['overSize'] = true;
    return false;
  }

  //lolos pengecekan
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $namaFile;
  $lokasiUpload = "../../assets/img/about/";
  move_uploaded_file($tmpName, $lokasiUpload.$namaFileBaru);
  return $namaFileBaru;
}

// UBAH MASJID
function ubahMasjid($data) {
  global $connect;

  $id_masjid = htmlspecialchars($data['id_masjid']);
  $namaMasjid = htmlspecialchars($data['nama_masjid']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $pendiri = htmlspecialchars($data['pendiri']);
  $tgl_bangun = htmlspecialchars($data['tgl_bangun']);
  $alamat = htmlspecialchars($data['alamat']);
  $telp = htmlspecialchars($data['telp']);
  $email = htmlspecialchars($data['email']);
  $facebook = htmlspecialchars($data['facebook']);
  $youtube = htmlspecialchars($data['youtube']);

  $gambar = null;
  if (!empty($_FILES['foto']['name'])) {
    $gambar = uploadMasjid();
    if (!$gambar) {
      return false;
    }
  }

  // Menyiapkan query update
    $sql = "UPDATE masjid SET 
        nama_masjid = '$namaMasjid', 
        deskripsi = '$deskripsi', 
        pendiri = '$pendiri', 
        tgl_bangun = '$tgl_bangun', 
        alamat = '$alamat', 
        telp = '$telp', 
        email = '$email', 
        facebook = '$facebook', 
        youtube = '$youtube'";
        
    // Jika ada inputan foto baru dari user, maka update juga kolom foto
    if ($gambar != null) {
      $sql .= ", foto = '$gambar'";
    }

    // Menambahkan kondisi WHERE sesuai id masjid yang ingin diupdate
    $sql .= " WHERE id_masjid = $id_masjid";

    // Menjalankan query update
    if (mysqli_query($connect, $sql)) {
      $_SESSION['ubahMasjid'] = true;
    } 



}

function uploadImam() {
  global $connect;

  $namaFile = $_FILES['foto']['name'];
  $error = $_FILES['foto']['error'];
  $ukuranFile = $_FILES['foto']['size'];
  $tmpName = $_FILES['foto']['tmp_name'];

   // cek ukuran file
  if ($ukuranFile > 4000000) { // satuan perhitungannya adalah kilobyte(kb)
    $_SESSION['overSize'] = true;
    return false;
  }

  //lolos pengecekan
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $namaFile;
  $lokasiUpload = "../../assets/img/imam/";
  move_uploaded_file($tmpName, $lokasiUpload.$namaFileBaru);
  return $namaFileBaru;
}

// TAMBAH IMAM
function tambahImam($data) {
  global $connect;


  $nama = htmlspecialchars($data['nama_imam']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $alamat = htmlspecialchars($data['alamat']);
  $email = htmlspecialchars($data['email']);
  $telp = htmlspecialchars($data['telp']);
  $instagram = htmlspecialchars($data['instagram']);
  $facebook = htmlspecialchars($data['facebook']);

  // cek masuk ke function upload
  $gambar = uploadImam();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO imam
                VALUES
            (NULL, '$nama', '$telp', '$email', '$alamat', '$facebook', '$instagram', '$deskripsi', '$gambar' )
            ";

  mysqli_query($connect, $query);

return $_SESSION['tambahImam'] = true;
}

// UBAH IMAM
function ubahImam($data) {
  global $connect;

  $id_imam = $data['id_imam'];  
  $nama = htmlspecialchars($data['nama']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $telp = htmlspecialchars($data['telp']);
  $alamat = htmlspecialchars($data['alamat']);
  $email = htmlspecialchars($data['email']);
  $facebook = htmlspecialchars($data['facebook']);
  $instagram = htmlspecialchars($data['instagram']);
  


  $gambar = null;
  if (!empty($_FILES['foto']['name'])) {
    $gambar = uploadImam();
    if (!$gambar) {
      return false;
    }
  }

  if ($gambar) {
    $query = "UPDATE imam SET nama_imam = '$nama', deskripsi = '$deskripsi', foto = '$gambar', telp = '$telp', alamat = '$alamat', email = '$email', facebook = '$facebook', instagram = '$instagram' WHERE id_imam = $id_imam";
  } else {
    $query = "UPDATE imam SET nama_imam = '$nama', deskripsi = '$deskripsi', telp = '$telp', alamat = '$alamat', email = '$email', facebook = '$facebook', instagram = '$instagram' WHERE id_imam = $id_imam";
  }

  $result = mysqli_query($connect, $query);
  if ($result) {
    $_SESSION['ubahImam'] = true;
  }

  return $result;
}


// TAMBAH VIDEO
function tambahVideo($data) {
  global $connect;

  $judul = htmlspecialchars($data['judul']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $tgl_post = date("Y-m-d");

  $gambar = uploadThumb();
  if (!$gambar) {
    return false;
  }
  $video = uploadVideo();
  if (!$video) {
    return false;
  }

  $query = "INSERT INTO video
                VALUES
            (NULL, '$judul', '$gambar', '$video', '$tgl_post', '$deskripsi')
            ";

  $result = mysqli_query($connect, $query);
if (!$result) {
  var_dump(mysqli_error($connect));
} else {
  return $_SESSION['tambahVideo'] = true;
}

}

function uploadThumb() {
  global $connect;
  
  $namaFile = $_FILES['foto']['name'];
  $error = $_FILES['foto']['error'];
  $ukuranFile = $_FILES['foto']['size'];
  $tmpName = $_FILES['foto']['tmp_name'];

   // cek ukuran file
  if ($ukuranFile > 4000000) { // satuan perhitungannya adalah kilobyte(kb)
    $_SESSION['overSize'] = true;
    return false;
  }

  //lolos pengecekan
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $namaFile;
  $lokasiUpload = "../../assets/img/thumbnail/";
  move_uploaded_file($tmpName, $lokasiUpload.$namaFileBaru);
  return $namaFileBaru;
}

function uploadVideo() {
  global $connect;
  

  $namaFile = $_FILES['video']['name'];
  $error = $_FILES['video']['error'];
  $ukuranFile = $_FILES['video']['size'];
  $tmpName = $_FILES['video']['tmp_name'];

  //lolos pengecekan
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $namaFile;
  $lokasiUpload = "../../assets/video/";
  move_uploaded_file($tmpName, $lokasiUpload.$namaFileBaru);
  return $namaFileBaru;
}

// UBAH VIDEO 
function ubahVideo($data) {
  global $connect;

  $id_video = $data['id_video'];
  $judul = htmlspecialchars($data['judul']);
  $deskripsi = htmlspecialchars($data['deskripsi']);

  // Mengambil data video yang akan diubah
  $result = mysqli_query($connect, "SELECT * FROM video WHERE id_video = $id_video");
  $video = mysqli_fetch_assoc($result);

  $gambar = null;
  if (!empty($_FILES['foto']['name'])) {
    // Jika ada gambar baru yang diupload, upload gambar baru dan hapus gambar lama
    $gambar = uploadThumb();
    if ($gambar) {
      $old_gambar = $video['foto'];
      if ($old_gambar) {
        unlink("../../assets/img/thumbnail/" . $old_gambar);
    }
    } else {
      return false;
    }
  } else {
    // Jika tidak ada gambar baru yang diupload, gunakan gambar lama
    $gambar = $video['foto'];
  }

  $video_file = null;
  if (!empty($_FILES['video']['name'])) {
    // Jika ada video baru yang diupload, upload video baru dan hapus video lama
    $video_file = uploadVideo();
    if ($video_file) {
      $old_video_file = $video['video'];
      if ($old_video_file) {
        unlink("../../assets/video/" . $old_video_file);
      }
    } else {
      return false;
    }
  } else {
    // Jika tidak ada video baru yang diupload, gunakan video lama
    $video_file = $video['video'];
  }

  // Update data video dengan gambar dan video yang baru atau lama
  $query = "UPDATE video SET judul = '$judul', deskripsi = '$deskripsi', foto = '$gambar', video = '$video_file' WHERE id_video = $id_video";
  mysqli_query($connect, $query);

  return $_SESSION['ubahVideo'] = true;
}
