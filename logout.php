<?php
    // class user
    require 'classes/utilizadores.class.php';
    $users = new utilizadores;
    // chamo o método logout
    $users->logout('admin.php');

?>