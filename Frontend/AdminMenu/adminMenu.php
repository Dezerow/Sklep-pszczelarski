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


</head>

<body>

    <header class="sticky-top">
        <?php include "../Components/Navbar/navbar.php" ?>
    </header>

    <div class="container mt-5" style="border: 2px solid red">
        <div class="d-flex justify-content-center">
            <div class="card-block text-center bg-light" style="width:500px">
                <div class="row ms-2" style="width:480px; background-color:whitesmoke">
                    <div class="col-2"> <i class="fa-regular fa-address-card fa-10x"></i>
                    </div>
                    <div class="col-10 mt-3">
                        <p class="" style="font-size: 50px; color:#1E90FF"><?php echo $_SESSION['admin'] ?></p>
                    </div>
                </div>
                <div class="text-start">
                    <h3 class="mt-5 ms-4">Dane administratora</h3>
                    <hr class="badge-primary mt-0 w-50">
                    <div class="mt-4 ms-5">
                        <h5>Adres email</h5>
                        <p>Adres</p>
                    </div>
                    <div class="mt-1 ms-5">
                        <h5>Data założenia konta</h5>
                        <p>Data</p>
                    </div>
                    <div class="mt-1 ms-5">
                        <h5>Przejrzyj historię transkacji</h5>
                        <a href="#">Data</a>
                    </div>
                </div>

                <div class="text-start mt-5 ms-3">
                    <div class="mt-5 ms-0">
                        <div>
                            <h3 class="ms-2">Edytuj swoje dane</h3>
                            <hr class="badge-primary mt-0 w-50">
                            <?php if (isset($_SESSION['daneZmienione'])) {
                                echo $_SESSION['daneZmienione'];
                                unset($_SESSION['daneZmienione']);
                            }
                            ?>
                        </div>
                    </div>


                    <div>
                        <form method="POST" action="../../../Praca/Backend/Server/backAdminEdit.php">

                            <div class="mt-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#pokazEdycjeEmaila" aria-expanded="false" aria-controls="collapseExample">
                                    Zmień adres email
                                </button>
                            </div>
                            <div class="collapse" id="pokazEdycjeEmaila">
                                <div class="row mt-4">
                                    <div class="col mt-1"><input type="text" placeholder="Podaj nowy adres" name="newAdminEmail"></div>
                                    <div class="col"> <input type="submit" class="btn btn-success" value="Zatwierdź email">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#pokazEdycjeHasla" aria-expanded="false" aria-controls="collapseExample">
                                    Zmień hasło
                                </button>
                            </div>
                            <div class="collapse" id="pokazEdycjeHasla">
                                <div class="row mt-4">
                                    <div class="col mt-1"><input type="password" placeholder="Podaj nowe hasło" name="newAdminPassword"></div>
                                    <div class="col"> <input type="submit" class="btn btn-success" value="Zatwierdź hasło">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="adminname" value="<?php echo $_SESSION['admin'] ?>">
                        </form>
                    </div>
                </div>

                <div class="text-start">
                    <h3 class="mt-5 ms-4">Zarządzaj jako administrator</h3>
                    <hr class="badge-primary mt-0 w-50">
                </div>

                <div class="text-start mt-3 ms-3">
                    <div class="">
                        <a href="../../../Praca/Frontend/AdminMenu/editUsers.php">
                            <button class="btn btn-primary">
                                Edytuj dane użytkowników
                            </button>
                        </a>
                    </div>
                    <div class="mt-3">
                        <a href="../../../Praca/Frontend/AdminMenu/editProducts.php">
                            <button class="btn btn-primary">
                                Edytuj oferty produktów
                            </button>
                        </a>
                    </div>
                    <div class="mt-3">
                        <a href="../../../Praca/Frontend/AdminMenu/editArticles.php">
                            <button class="btn btn-primary">
                                Edytuj artkuły
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>