<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    /*
        *
        * @author Francisco José Gordo Salguero
        * Fecha Inicio: 09/11/2020
        * Fecha Fin: 10/12/2020
        * Curso: 2do FPS DAW Presencial
        * Modulo: Programación PHP
        * Practica Agenda con sesiones
        * @versión: 1.0
    */
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario agenda con Sesiones</title>
    </head>
    <body>
        <form name="formulario" method="get" action="">
            <label for="name"><h1>Nombre: </h1></label>
            <input type="text" id="name" name="name" required><br>
            <label for="numero"><h1>Numero Telefónico: </h1></label>
            <input type="text" maxlength="9" id="numero" name="numero"><br><br>
            <input type="submit" value="Submit">
        <?php
        
            // put your code here
        
            session_start();
            
            if (empty($_GET['numero'])) {
                if ($_SESSION) {
                    echo "<h1> Nombre : Número </h1>";
                    foreach ($_SESSION['agenda'] as $clave => $valor) {
                        if ($clave == $_GET['name']) {
                            unset($_SESSION['agenda'][$clave]);
                        } else {
                            echo $clave . " : " . $valor . " <br> ";
                        }
                    }
                }
            } else {
                $_SESSION['agenda'][$_GET['name']] = $_GET['numero'];
                echo "<h1> Nombre : Número </h1>";
                foreach ($_SESSION['agenda'] as $clave => $valor) {
                    echo $clave . " : " . $valor . " <br>";
                }
            }
        ?>
        </form> 
    </body>
</html>