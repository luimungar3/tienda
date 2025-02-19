<?php
session_start();
session_destroy();
header("Location: inicio_sesion2.html");
?>