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
    <link rel="stylesheet" href="../css/pokedex.css">
    <link rel="icon" href="../images/ikona.png">
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
        $admin= $_SESSION["admin"];
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
        <h1 id="uvodtext">Vítáme vás v Pokédexu!</h1>
    </header>
    <div id="zobrazeni">
        <nav class="divy" id="pokemonnavigate">

            <!--Vytvoření-->
            <?php
            
            if($admin == 1) {
            echo "<a href='createpokemon.php'>
                <button style='Width:100%;margin-bottom:10px;background-color:green;border:1px solid green;' class='btn btn-primary' type='button' aria-expanded='false' aria-controls='collapseExample'>
                    Vytvoř si Pokémona!
                </button>
            </a>";
            }
            ?>
            
            
            <!--typy-->
             <button style="Width:100%;margin-bottom:10px;background-color:rgb(0, 120, 255);border:1px solid rgb(0, 120, 255)"
             class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTypy" aria-expanded="false" aria-controls="collapseExample">Typy</button>
            
            <div class="collapse" id="collapseTypy">
            <?php
            $dotaz = $spojeni->prepare("SELECT id, typ FROM typy");
                        $dotaz->bind_result($id, $typ);
                        $dotaz->execute();
             while($dotaz->fetch()){ 
                 echo "<div class='card card-body'>
                 <a href='typy.php?id=$id'>$typ</a>
               </div>";
             }
             $dotaz->close();
            ?>
            </div>

            <!--Slabosti-->
             <button style="Width:100%;margin-bottom:10px;background-color:red;border:1px solid red"
             class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSlabosti" aria-expanded="false" aria-controls="collapseExample">
                Slabosti
            </button>
            
            <div class="collapse" id="collapseSlabosti">
            <?php
            $dotaz = $spojeni->prepare("SELECT id, typ FROM typy");
                        $dotaz->bind_result($id, $typ);
                        $dotaz->execute();
             while($dotaz->fetch()){ 
                 echo "<div class='card card-body'>
                 <a href='slabiny.php?id=$id'>$typ</a>
               </div>";
             }
             $dotaz->close();
            ?>
            </div>
        
        </nav>
        <article class="divy">
            <div id="zpatky" >
                <a class="btn btn-secondary" href="pokedex.php" style="height:40px;margin:auto;" role="button">Zpátky</a>
                <p id="pokemonHead" style="margin:auto;">Pokémoni</p>
            </div>
            <?php
                        if(isset($_GET["hledat"])){
                           $hledani = $_GET["hledat"];
                        }
                ?>
                <form id="hledani" method="get">
                <input id="tlacitko" type="submit" value="Vyhledat" style="height:40px;" class="btn btn-info">
                <input style="width:60%;margin-bottom:40px;" type="search" placeholder="Hledej Pokemony..." name="hledat" id="input${1/(\w+)/\u\1/g}" class="form-control" required="required" title="">
                <input name="id" value="<?php echo $_GET["id"] ?>" hidden> 
            </form>
        
        <?php  
          
        if(isset($_GET["hledat"])){    
        $dotaz = $spojeni->prepare("SELECT pokemoni.id, pokemoni.nazev, pokemoni.obrazek FROM pokemoni
        JOIN slabiny ON pokemoni.id = slabiny.id_pokemona
        WHERE slabiny.id_slabiny = ? AND pokemoni.nazev LIKE '%$hledani%'");
                        $dotaz->bind_param("i", $_GET["id"]);
                        $dotaz->bind_result($id,$nazev,$obrazek);
                        $dotaz->execute();
        echo"<div class='flex-container'>";              
        while($dotaz->fetch()){      
        echo "<div class='obrazky'>
                <a href='detail.php?id=$id'>
                    <img class='obrPokemona' src='$obrFile$obrazek' height='200px' width='200px'>
                    <h3 class='nazevPokemona'>$nazev</h3>
                </a>
              </div>";
            }
        echo "</div>";
        $dotaz->close();
        }else{
            $dotaz = $spojeni->prepare("SELECT pokemoni.id, pokemoni.nazev, pokemoni.obrazek FROM pokemoni
        JOIN slabiny ON pokemoni.id = slabiny.id_pokemona
        WHERE slabiny.id_slabiny = ?");
                        $dotaz->bind_param("i", $_GET["id"]);
                        $dotaz->bind_result($id,$nazev,$obrazek);
                        $dotaz->execute();
        echo"<div class='flex-container'>";              
        while($dotaz->fetch()){      
        echo "<div class='obrazky'>
                <a href='detail.php?id=$id'>
                    <img class='obrPokemona' src='$obrFile$obrazek' height='200px' width='200px'>
                    <h3 class='nazevPokemona'>$nazev</h3>
                </a>
            </div>";
            }
        echo "</div>";
        $dotaz->close();
        }
        ?>
        </article>
    </div>
    
</body>
</html>