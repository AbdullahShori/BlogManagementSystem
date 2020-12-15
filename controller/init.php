<?php 
    session_start();
    spl_autoload_register(function($table_name){

    include "source/$table_name.php";


});

        $source = new source;

?>