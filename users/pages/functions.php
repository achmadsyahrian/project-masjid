<?php 
$connect = mysqli_connect("localhost","root", "", "project_masjid");

// QUERY ALL
function query($query) {
  global $connect;
  $result = mysqli_query($connect, $query);
  $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
}

// QUERY RESULT
function queryResult($query) {
  global $connect;
  $result = mysqli_query($connect, $query);
  return $result;
}

// QUERY LOGIN
function login($data) {
  global $connect;

  $username = htmlspecialchars($data['username']);
	$password = md5($data['password']);
	$cekUser = mysqli_query($connect, "SELECT * FROM users WHERE username='$username' AND password='$password' AND level = 'user' ");

	if (mysqli_num_rows($cekUser) > 0) {
		$data = mysqli_fetch_assoc($cekUser);

    $_SESSION['login'] = true;
    $_SESSION['id_user'] = $data['id_user'];
    return $_SESSION;
  }  else {
    $_SESSION['gagalLogin'] = true;
    return $_SESSION['gagalLogin'];
  }

}

// QUERY REGISTER
function register($data) {
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
      // jika insert berhasil, set session register
      $_SESSION['register'] = true;
      return $_SESSION['register'];
    } else {
      // jika insert gagal, set session error
      $_SESSION['error'] = mysqli_error($connect);
      return false;
    }
  }
}



// QUERY LOGOUT
function logout() {
  if ((session_status() === PHP_SESSION_ACTIVE)) {
    session_destroy();
  }

  return $_SESSION['logoutA'] = true;
}

// EDIT PROFILE
function editProfile($data) {
  global $connect;

  $id_user = $data['id_user'];
  $nama = $data['nama'];
  $username = $data['username'];

  // Cek username dari id_user
  $cekUser = query("SELECT username FROM users WHERE id_user = $id_user")[0];
  // Cek inputan user apakah sama dengan yg di DB
  if ($username != $cekUser['username']) {
    // cek jika username sama
    $result = mysqli_query($connect, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
      $_SESSION['userReady'] = true;
      return $_SESSION['userReady'];
    }
  }
  
  // cek input password user
  if (!empty($data['password'])) {
    $password = md5($data['password']);
  } else {
    $password = $data['passwordLama'];
  }

  $query = "UPDATE users SET
            nama_user = '$nama',
            username = '$username',
            password = '$password' 
            WHERE id_user = $id_user
            ";
            
  mysqli_query($connect, $query);
  return $_SESSION['editProfile'] = true;
  
}



?>