
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="../images/ikona.png">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
</head>

<body>
    <?php
        if (isset($_GET["reg"]) && $_GET["reg"]==1){
            $hlaska = "Úspěšně jste se zaregistroval! Můžete se přihlásit.";
        }

        if (isset($_GET["reg"]) && $_GET["reg"]==0){
            $hlaska = "Úspěšně jste se odhlásil.";
        }

        include 'php/server.php';

        if (isset($_POST["odeslat"])) {
            if (isset($_POST["heslo"]) && isset($_POST["jmeno"])) {

                $dotaz = $spojeni->prepare("SELECT ID,jmeno,heslo FROM uzivatele WHERE jmeno=?");
                $dotaz->bind_param("s",$_POST["jmeno"]);
                $dotaz->bind_result($id,$jmeno,$heslo);
                $dotaz->execute();
                $dotaz->fetch(); 
                if ($jmeno==$_POST["jmeno"] && $heslo==md5($_POST["heslo"])){
                    $_SESSION["id"] = $id;
                    $_SESSION["jmeno"] = $jmeno;
                    header("Location: php/pokedex.php");
                } else {
                    $hlaska = "Chyba: Zkontrolujte své údaje!";
                }
                $dotaz->close();
            } else {
                $hlaska = "Chyba: Vyplňtě vyžadovaná pole!";
            }
        }
    ?>
    <div style="margin:auto;">
        <img id="logo" src="images/PokedexLogo.png">
    </div>

    <div id="login">

        <form method="post">
            <h1 id="prihlas">Login</h1><br>
            <p style="color:black;text-decoration:underline;width:100%;text-align:center"><?php if (isset($hlaska)) {echo $hlaska;} ?></p>
            <img class="icons" src="images/loginicon.svg" style="width:100%;height:35px;margin:auto;"><br>
            <input type="text" name="jmeno" maxlength="30" placeholder="Přezdívka" required><br>
            <img class="icons" src="images/keyicon.svg" style="width:100%;height:35px;margin:auto"><br>
            <input type="password" name="heslo" placeholder="Heslo" required><br>
            <svg width="300" height="3">
                    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" style="stop-color:rgb(177, 177, 177);stop-opacity:0.7" />
                            <stop offset="50%" style="stop-color:rgb(0, 89, 255);stop-opacity:1" />
                            <stop offset="100%" style="stop-color:rgb(177, 177, 177);stop-opacity:0.7" />
                          </linearGradient>
                <rect width="300" height="3" x="2" y="2" rx="2" ry="2" style="fill:url(#grad1);" />
            </svg>
            <p style="margin:auto;font-size: 12px; text-align: center;">Nezaregistrován?<a href="php/register.php"> Zaregistruj se!</a></p>
            <input type="submit" value="Příhlásit se" name="odeslat"><br>
        </form>
    </div>
</body>

</html>