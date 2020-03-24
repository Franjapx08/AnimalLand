<?php
    session_start();
    if(isset($_SESSION['user'])){
        $sesion = true;
    }else{
        $sesion = false;
    }