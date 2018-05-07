<?php
session_start();
$session_id = $_SESSION["id"];
if(!isset($_SESSION["id"])) header("Location: ../index.php");
        include 'server.php';
        $dotaz=$spojeni->prepare("INSERT INTO sbirka (pokemon_id, uzivatel_id)
         VALUES (?, $session_id)");    
              $dotaz->bind_param("i",$_GET["id"]);
              if($dotaz->execute()){ 
                $dotaz->close();
                header("Location: collection.php");
              }
        ?>