<?php
//tes
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once("mutasi.class.php");

    $mutasi = new mutasi();

    $mutasi->setIdMutasi(111);
    $mutasi->setNoreg("444");
    $mutasi->setPic("Joe");

    $mutasi->insert();
?>