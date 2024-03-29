<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/aa02b8a033.js" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.js"></script>
    <link href="../UserMenu/userMenu.css" rel="stylesheet" type="text/css" />
</head>

<body class="d-flex flex-column min-vh-100">

    <header class="sticky-top">
        <?php include "../Components/Navbar/navbar.php" ?>
    </header>

    <?php
    if (!isset($_SESSION['user'])) {
        header('Location: ../../Frontend/Main/index.php');
        exit();
    }
    ?>

    <?php
    require __DIR__ . "../../../../Praca_dyplomowa/Backend/DB_Connection/dbConnect.php";
    $conn = @new mysqli($hostname, $db_username, $db_password, $db_name);


    $username = $_SESSION['user'];
    $sql = "SELECT email,register_date from users WHERE username='$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    ?>
    <div class="container mt-5" id="mainContainer">
        <div class="d-flex justify-content-center">
            <div class="card-block text-center bg-light" style="width:500px">
                <div class="row ms-2" style="width:480px; background-color:whitesmoke">
                    <div class="col-md-6 col-sm-12"> <i class="fa-regular fa-address-card fa-10x"></i>
                    </div>
                    <div class="col-md-6 col-sm-12 text-start mt-3 d-flex justify-content-center">
                        <p class="fw-bold" style="font-size: 25px; color:#1E90FF"><?php echo $_SESSION['user'] ?></p>
                    </div>
                </div>
                <div class="text-start">
                    <h3 class="mt-5 ms-4">Dane użytkownika</h3>
                    <hr class="badge-primary mt-0 w-50">
                    <div class="mt-4 ms-5">
                        <h5>Adres email</h5>
                        <p><?php echo $row['email'] ?></p>
                    </div>
                    <div class="mt-1 ms-5">
                        <h5>Data założenia konta</h5>
                        <p><?php echo $row['register_date'] ?></p>
                    </div>
                </div>
                <div class="text-start mt-5 ms-3">

                    <div>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#pokazDaneDoZmian" aria-expanded="false" aria-controls="collapseExample">
                            Zmień swoje dane
                        </button>
                    </div>
                    <div>
                        <?php
                        if (isset($_SESSION['daneZmienione'])) {
                            echo $_SESSION['daneZmienione'];
                            unset($_SESSION['daneZmienione']);
                        }
                        ?>
                    </div>


                    <div class="collapse" id="pokazDaneDoZmian">
                        <div class="mt-5 ms-0">
                            <h3 class="mt-5 ms-2">Edytuj swoje dane</h3>
                            <hr class="badge-primary mt-0 w-50">
                        </div>
                        <form method="POST" action="../../Backend/Server/backUserEdit.php">
                            <div>
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#pokazEdycjeEmaila" aria-expanded="false" aria-controls="collapseExample">
                                    Zmień adres email
                                </button>
                            </div>
                            <div class="collapse" id="pokazEdycjeEmaila">
                                <div class="row mt-4">
                                    <input type="hidden" name="username" value="<?php echo $_SESSION['user'] ?>">
                                    <div class="col mt-1"><input type="email" placeholder="Podaj nowy adres" name="newUserEmail" required></div>
                                    <div class="col"> <input type="submit" class="btn btn-success" value="Zatwierdź email">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="POST" action="../../Backend/Server/backUserEdit.php">
                            <div class="mt-3">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#pokazEdycjeHasla" aria-expanded="false" aria-controls="collapseExample">
                                    Zmień hasło
                                </button>
                            </div>
                            <div class="collapse" id="pokazEdycjeHasla">
                                <div class="row mt-4">
                                    <input type="hidden" name="username" value="<?php echo $_SESSION['user'] ?>">
                                    <div class="col mt-1"><input type="password" autocomplete="one-time-code" pattern="^[A-Za-z0-9]{4,40}" placeholder="Podaj nowe hasło" name="newUserPassword" required></div>
                                    <div class="col"> <input type="submit" class="btn btn-success" value="Zatwierdź hasło">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>




    <?php include "../Components/Footer/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>