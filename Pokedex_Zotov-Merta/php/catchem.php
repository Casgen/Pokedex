
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/catchem.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono:400,400i|IBM+Plex+Sans+Condensed:400,400i|IBM+Plex+Sans:100,100i,400,400i,700,700i|IBM+Plex+Serif:400,400i" rel="stylesheet">
    <title>Chytni si Pokémona!</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
</head>
<?php
        
        include 'server.php';
        if(isset($_SESSION["id"])){ 
        $jmeno = $_SESSION["jmeno"];
        }
?>
<body style="background-color:rgb(63, 198, 247);">
    
    
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
    
    
    
    <header style="line-height:2;background-size:cover;">
        <h1 id="uvodtext">Gotta Catch em All!</h1>
    </header>
    <div id="zobrazeni">
        <article class="divy">
            <div style="display:flex;flex-direction:row;">
                <input type="submit" value="Vyhledat" style="height:40px;margin-left:auto;margin-right:auto;" class="btn btn-info">
                <input style="width:60%;margin:auto;margin-bottom:40px;" type="search" placeholder="Hledej Pokemony..." name="" id="input${1/(\w+)/\u\1/g}" class="form-control" value="" required="required" title="">
            </div>
        
        <?php        
        $dotaz = $spojeni->prepare("SELECT id,nazev,obrazek FROM pokemoni");
                        $dotaz->bind_result($id,$nazev,$obrazek);
                        $dotaz->execute();
        echo"<div class='flex-container'>";              
        while($dotaz->fetch()){      
        echo "<div class='obrazky'><a href='detail.php?id=$id'><img class='obrPokemona' src='$obrazek' height='200px' width='200px'><h3  class='nazevPokemona'>Text<br>Chytit</h3></a></div>";
            }
        echo "</div>";
        ?>
        </article>
    </div>
    
</body>
</html>