<?php
session_start();

require_once('../DB_Connection/dbConnect.php');

$conn = @new mysqli($hostname, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
  die("Połączenie zakończyło się błędem: " . $conn->connect_error);
} else {
  if (isset($_POST['deleteAdmin'])  && $_POST['deleteAdmin'] === "Yes") {
    $userId = $_POST['id'];
    $userId = htmlentities($userId, ENT_QUOTES, "UTF-8");
    $delete = "DELETE FROM adminlist WHERE id='$userId'";
    $resultDelete = $conn->query($delete);

    $_SESSION['adminUserEdit'] = '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="20" height="20" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Użytkownik został pomyślnie usunięty.
        </div>
      </div>';
  }

  header("Location: ../../Frontend/AdminMenu/editUsers.php");
}
