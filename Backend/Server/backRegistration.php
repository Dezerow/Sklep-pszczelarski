<?php

session_start();

include "../DB_Connection/dbConnect.php";



$conn = @new mysqli($hostname, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
  die("Połączenie zakończyło się błędem: " . $conn->connect_error);
} else {

  $date = date('Y-m-d');
  $username =  $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  $username = htmlentities($username, ENT_QUOTES, "UTF-8");   // Przepuszczanie przez html entities aby funkcja wstawiła nam automatycznie encje htmla, dzięki temu nie odczyta tekstu jako kod JS, zabiezpieczając nas przed atakiem na naszą strone
  $password = htmlentities($password, ENT_QUOTES, "UTF-8");
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  //  $email = htmlentities($password, ENT_QUOTES, "UTF-8");


  $sql = "INSERT INTO users(id, username, email, password, verification_code, register_date, is_verifed)
     VALUES ('', '$username', '$email', '$hashedPassword', '', '$date', '0')";

  $result = mysqli_query($conn, $sql);


  $_SESSION['registerSucc'] = '<div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
      Rejestracja przebiegła pomyślnie. Zaloguj się.
    </div>
  </div>';

  header('Location: ../../Frontend/Login/login.php');
}

$conn->close();
