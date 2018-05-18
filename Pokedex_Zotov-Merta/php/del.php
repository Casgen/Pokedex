<?php
session_start();
$session_id = $_SESSION["id"];
if(!isset($_SESSION["id"])) header("Location: ../index.php");
        include 'server.php';
        $dotaz=$spojeni->prepare("DELETE FROM pokemoni WHERE pokemoni.id = ?;" 
        );    
              $dotaz->bind_param("i",$_GET["id"]);
              if($dotaz->execute()){ 
                $dotaz->close();
              } 
              $dotaz=$spojeni->prepare("DELETE FROM pokemon_typ WHERE id_pokemona = ?;" 
        );    
              $dotaz->bind_param("i",$_GET["id"]);
              if($dotaz->execute()){ 
                $dotaz->close();
              }  
              $dotaz=$spojeni->prepare("DELETE FROM slabiny WHERE id_pokemona = ?" 
        );    
              $dotaz->bind_param("i",$_GET["id"]);
              if($dotaz->execute()){ 
                $dotaz->close();
                header("Location: pokedex.php");
              }       
?>