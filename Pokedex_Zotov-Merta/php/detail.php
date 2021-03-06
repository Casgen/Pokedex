<?php
session_start();
if(!isset($_SESSION["id"])) header("Location: ../index.php");
if(isset($_SESSION["id"])){ 
    $jmeno= $_SESSION["jmeno"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokémon</title>
    <link rel="icon" href="../images/ikona.png">
    <link rel="stylesheet" href="../css/detail.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono:400,400i|IBM+Plex+Sans+Condensed:400,400i|IBM+Plex+Sans:100,100i,400,400i,700,700i|IBM+Plex+Serif:400,400i" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
        include 'server.php';
        $dotaz = $spojeni->prepare("SELECT nazev, obrazek, popis FROM pokemoni WHERE pokemoni.id=?");
        $dotaz->bind_param("i", $_GET["id"]);
        $dotaz->bind_result($nazev, $obrazek, $popis);
        $dotaz->execute();
        $dotaz->fetch();
        $dotaz->close();
        ?>
<body style="background-image: linear-gradient(90deg, rgb(247, 247, 247), rgb(208, 223, 255), rgb(247, 247, 247));">
    <nav id="usernavigate" style="position:fixed" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <a class="navbar-brand" href="collection.php"><?php echo $_SESSION["jmeno"];?></a>
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="pokedex.php">Domů</a>
            </li>
            <li>
                <a href="logout.php">Odhlásit se</a>
            </li>
        </ul>
    </nav>
    <header><h1 id="nazevPokemona"><?php echo "$nazev";?></h1></header>
    <div style="display:flex;flex-direction:row;" id="prostredek">
        <article>
            <div id="obsah">
                <img id="obrPokemona" src="<?php echo "$obrFile$obrazek";?>">
                <p id="popis"><?php echo "$popis";?></p>
            </div>
            <div id="typySlabiny">
                <h3>Typy</h3>
                <?php
                $dotaz = $spojeni->prepare("SELECT typy.typ FROM `typy` 
                JOIN pokemon_typ on pokemon_typ.id_typu = typy.id
                WHERE pokemon_typ.id_pokemona = ?");
                $dotaz->bind_param("i", $_GET["id"]);
                $dotaz->bind_result($typ);
                $dotaz->execute();
                ?>
                    <div id="typy">
                    <?php
                    while($dotaz->fetch()){ 
                        echo "<div class='panel panel-default'>
                        <div class='panel-body'>$typ</div>
                    </div>";
                    }
                    $dotaz->close();
                    ?>
                    </div>
                <h3>Slabiny</h3>
                <?php
                $dotaz = $spojeni->prepare("SELECT typy.typ FROM `typy` 
                JOIN slabiny on slabiny.id_slabiny = typy.id
                WHERE slabiny.id_pokemona = ?");
                $dotaz->bind_param("i", $_GET["id"]);
                $dotaz->bind_result($slabina);
                $dotaz->execute();
                ?>
                <div id="slabiny">
                <?php
                    while($dotaz->fetch()){ 
                        echo "<div class='panel panel-default'>
                        <div class='panel-body'>$slabina</div>
                    </div>";
                    }
                    $dotaz->close();
                    ?>
                    </div>
            </div>
        </article>
    </div>
</body>
</html>