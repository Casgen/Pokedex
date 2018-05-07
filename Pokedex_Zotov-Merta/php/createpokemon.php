<?php
session_start();
if(!isset($_SESSION["id"])) header("Location: ../index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/createpokemon.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono:400,400i|IBM+Plex+Sans+Condensed:400,400i|IBM+Plex+Sans:100,100i,400,400i,700,700i|IBM+Plex+Serif:400,400i" rel="stylesheet">
    <title>Vítejte v Pokedexu!</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
</head>
<?php
        $styl = "<span class='glyphicon glyphicon-search'></span>";
        include 'server.php';
        if(isset($_SESSION["id"])){ 
        $jmeno= $_SESSION["jmeno"];
        }
?>
<body style="background-color:#7fad71">
    
    
    <!-- porovnat kody od zbyńdose a přidat do mého kódu jeho upravený -->    
    <nav id="usernavigate" style="position:fixed" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <a class="navbar-brand" href="collection.php"><?php echo $jmeno;?></a>
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="pokedex.php">Domů</a>
            </li>
            <li>
                <a href="logout.php">Odhlásit se</a>
            </li>
        </ul>
    </nav>
    
    
    
    <header style="line-height:2;border:none;background-size:cover;" class="divy">
        <h1 id="uvodtext">Vyrob si svého pokémona!</h1>
    </header>
    <div id="zobrazeni">
        <article class="divy">
        <?php
        $dotaz=$spojeni->prepare("INSERT INTO pokemoni (nazev, popis, obrazek)
        VALUES (?, ?, ?)");
            $dotaz->bind_param("sss",$_POST["nazev"], $_POST["popis"], $_POST["obrazek"]);
             $dotaz->execute();
             $posledni_id = $spojeni->insert_id;
             $dotaz->close();
             $dotaz=$spojeni->prepare("INSERT INTO pokemon_typ ( id_pokemona, id_typu)
              VALUES ( $posledni_id, ?)");
              $dotaz->bind_param("i",$_POST["typ"]);
              $dotaz->execute();
              $dotaz->close();
              $dotaz=$spojeni->prepare("INSERT INTO slabiny ( id_pokemona, id_slabiny)
              VALUES ( $posledni_id, ?)");
              $dotaz->bind_param("i",$_POST["slabost"]);
              $dotaz->execute();
              $dotaz->close();
             ?>
             <form method="post">
                    <div class="form-group">
                        <label style="margin:auto;">Název Pokémona</label>
                        <input type="text" style="margin:auto;width:40%;" pattern="[A-Za-z]+" maxlength="30" class="form-control" placeholder="Jméno pokémona..." name="nazev" id="" aria-describedby="helpId" placeholder=""><br>
                    </div>
                    <div class="form-group">
                        <label style="margin:auto;">Popis</label><br>
                        <textarea style="width:70%;margin:auto;" pattern="[A-Za-z]+" placeholder="Zadejte svůj popis..." required maxlength="100" type="text" class="form-control" name="popis" id="" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <label style="margin:auto;">Obrázek Pokémona</label>
                      <input style="margin:auto;width:40%;" type="file" accept=".jpg,.png," class="form-control-file" name="obrazek" placeholder="" aria-describedby="fileHelpId">
                    </div>
                    <div class="form-group">
                      <label style="margin:auto;">Typ Pokémona</label>
                      <select style="width:50%;" multiple class="form-control select" required name="typ">
                      <?php
            $dotaz = $spojeni->prepare("SELECT id,typ FROM typy");
                        $dotaz->bind_result($id, $typ);
                        $dotaz->execute();
             while($dotaz->fetch()){ 
                 echo "<option value='$id'> $typ</option>";
             }
             $dotaz->close();
            ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label style="margin:auto;">Slabost Pokémona</label>
                      <select style="width:50%;" multiple class="form-control select" required name="slabost">
                      <?php
            $dotaz = $spojeni->prepare("SELECT id, typ FROM typy");
                        $dotaz->bind_result($id, $typ);
                        $dotaz->execute();
             while($dotaz->fetch()){ 
                 echo "<option value='$id'>$typ</option>";
             }
             $dotaz->close();
            ?>
                      </select>
                    </div>
                    <div class="form-group">
                        <input style="margin:auto;" type="submit" value="Vytvořit Pokémona!" name="odeslat" id="tlacitko" class="btn btn-info" btn-lg btn-block>
                    </div>
                </form>
        </article>
    </div>
    
</body>
</html>