<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../../../Praca_dyplomowa/Frontend/AdminMenu/AdminMenuCss/addArticle.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <header class="sticky-top">
        <?php include "../Components/Navbar/navbar.php" ?>
    </header>

    <?php
    if (!isset($_SESSION['admin'])) {
        header('Location: ../../Frontend/Main/index.php');
        exit();
    }
    ?>

    <div class="container py-5">
        <h1 class="text-center">Panel zamieszczania artykułu do witryny</h1>
        <form method="POST" action="../../../Praca_dyplomowa/Backend/Server/backAddArticle.php">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div id="wrapper" class="mt-3">
                        <div id="text_div">
                            <input type='hidden' name='id' value=<?php
                                                                    if (isset($_POST['id'])) {
                                                                        echo $_POST['id'];
                                                                    } else if (isset($_SESSION['zapisaneID'])) {
                                                                        echo $_SESSION['zapisaneID'];
                                                                    }
                                                                    ?>>
                            <input type="text" onkeyup="unblockButton()" name="image_name" id="image_name" <?php if (!isset($_SESSION['path'])) {
                                                                                                                echo 'required';
                                                                                                            } ?> placeholder="Podaj nazwę zdjęcia">
                            <input type="text" onkeyup="unblockButton()" name="image_url" id="image_url" <?php if (!isset($_SESSION['path'])) {
                                                                                                                echo 'required';
                                                                                                            } ?> placeholder="Podaj link do zdjęcia">
                            <input type="submit" disabled name="save_image" id="save_image" value="Wyślij zdjęcie">
                            <img class="mt-3" style="max-width: 350px; max-height: 350px" src="<?php if (isset($_SESSION['path'])) {
                                                                                                    echo $_SESSION['path'];
                                                                                                } ?>">
                        </div>
                    </div>


                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="d-flex justify-content-center mt-3 card">
                        <div class="card-body">
                            <h5 class="d-flex justify-content-center mt-3">
                                <div class="mt-3">Podaj nazwę artykułu</div>
                            </h5>
                            <div class="d-flex justify-content-center mt-3">
                                <input type="text" name="ArticleName" id="ArticleName" onkeyup="unblockAddArticle()" style="width: 250px;">
                            </div>
                        </div>

                        <div class="card-body">
                            <h5 class="d-flex justify-content-center mt-3">
                                Podaj treść artykułu
                            </h5>
                            <div class="mt-3">
                                <textarea class="form-control" name="ArticleContent" id="ArticleContent" onkeyup="unblockAddArticle()" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="card-body">
                            <h5 class="d-flex justify-content-center mt-3">
                                <div class="mt-3">Podaj klucz artykułu(Służy do łączenia z artykułami)</div>
                            </h5>
                            <div class="d-flex justify-content-center mt-3">
                                <input type="text" name="ArticleKey" id="ArticleKey" style="width: 250px;">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <input type="submit" class="btn btn-success mt-5" disabled id="addToDatabase" name="addToDatabase" value="Zatwierdź nowy artykuł" style="height: 60px; width:400px; font-size: 20px">
            </div>
        </form>
    </div>


    <?php include "../Components/Footer/footer.php" ?>


    <script>
        function unblockButton() {
            if (document.getElementById("image_name").value === "" || document.getElementById("image_url").value === "") {
                document.getElementById('save_image').disabled = true;
            } else {
                document.getElementById('save_image').disabled = false;
            }
        }

        function unblockAddArticle() {


            <?php
            $checkIfPhotoAdded = 0;
            if (isset($_SESSION['path'])) {
                $checkIfPhotoAdded = 1;
            } ?>

            enableButton = '<?php echo $checkIfPhotoAdded; ?>';

            if (document.getElementById("ArticleName").value === "" || document.getElementById("ArticleContent").value === "" || enableButton === "0") {
                document.getElementById('addToDatabase').disabled = true;
            } else {
                document.getElementById('addToDatabase').disabled = false;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>