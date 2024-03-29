<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" media="" />
    <link href="../../../Praca_dyplomowa/Frontend/AdminMenu/AdminMenuCss/addUser.css" rel="stylesheet" type="text/css" />
</head>

<body class="d-flex flex-column min-vh-100">

    <header class="sticky-top">
        <?php include "../Components/Navbar/navbar.php" ?>
    </header>

    <?php
    if (!isset($_SESSION['admin'])) {
        header('Location: ../../Frontend/Main/index.php');
        exit();
    }
    ?>

    <div class="container-fluid mt-5" id="whenLittleMove">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <form method="POST" action="../../../Praca_dyplomowa/Backend/Server/backAddUserByAdmin.php" class="form-container test">
                    <label id="registerTitle">
                        <h4 style=" text-align: center;">Zarejestruj użytkownika</h4>
                    </label>
                    <div class="form-group mt-3">
                        <label for="username">
                            <h5>Nazwa użytkownika</h5>
                        </label>
                        <input type="text" class="form-control" name="username" pattern="^[A-Za-z0-9]{4,15}" placeholder="Podaj nazwę użytkownika" maxlength="15" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">
                            <h5>Email</h5>
                        </label>
                        <input type="email" class="form-control" name="email" placeholder="Podaj swój adres email:" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">
                            <h5>Hasło</h5>
                        </label>
                        <input type="password" class="form-control" pattern="^[A-Za-z0-9]{4,40}" autocomplete="one-time-code" name="password" id="password" onchange="unblockButton()" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">
                            <h5>Powtórz hasło</h5>
                        </label>
                        <input type="password" class="form-control" pattern="^[A-Za-z0-9]{4,40}" autocomplete="one-time-code" name="repeatPassword" id="repeatPassword" onchange="unblockButton()" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" id="przyciskRejestracji" disabled>Dodaj użytkownika</button>
                </form>
            </section>
        </section>
    </div>
    <?php include "../Components/Footer/footer.php" ?>

    <script>
        function unblockButton() {
            if (document.getElementById("password").value !== document.getElementById("repeatPassword").value) {
                document.getElementById('przyciskRejestracji').disabled = true;
            } else {
                document.getElementById('przyciskRejestracji').disabled = false;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>