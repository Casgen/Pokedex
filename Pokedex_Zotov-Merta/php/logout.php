<?php
session_start();
if(!isset($_SESSION["id"])) header("Location: pokedex.php");

    unset($_SESSION["id"]);
    unset($_SESSION["jmeno"]);
    header("Location: http://visualstudio/Pokedex_Zotov-Merta/index.php?reg=0");
?>
