<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario agenda sin cookies ni BBDD ni sesiones</title>
    </head>
    <body>
        <form name="formulario" method="get" action="">
            <label for="name"><h1>Nombre: </h1></label>
            <input type="text" id="name" name="name" required><br>
            <label for="numero"><h1>Numero Telefónico: </h1></label>
            <input type="text" maxlength="9" id="numero" name="numero"><br><br>
            <input type="submit" value="Submit">
        <?php
        /*
            *
            * @author Francisco José Gordo Salguero
            * Fecha Inicio: 18/10/2020
            * Fecha Fin: 28/10/2020
            * Curso: 2do FPS DAW Presencial
            * Modulo: Programación PHP
            * Practica Agenda sin cookies, BBDD ni sesiones
            * @versión: 1.0
        */
        
            // put your code here
            // Comprobamos si ya hay una agenda
            if (isset($_GET['agenda'])){
                // Obtenemos el valor de agenda de la url a la variable agenda
                $agenda['agenda'] = unserialize($_GET['agenda']);
            } else {
                // Si no la hay, creamos un array vacío
                $agenda['agenda'] = array();
                echo "<label type=hidden for='agenda'></label><input type=hidden id='agenda' name = 'agenda' value=".serialize($agenda['agenda']).">";
            }
            if(!isset($_GET['agenda'])) {
                //echo "Error no controlado";
            } else {
                // Si el array está vacío, añadimos el valor sea cual sea
                if (empty($agenda['agenda'])) {
                    echo "<h1> Nombre : Número </h1>";
                    $agenda['agenda'][$_GET['name']] = $_GET['numero'];
                } else {
                    echo "<h1> Nombre : Número </h1>";
                    // Comprobamos si hay un valor en número
                    if (empty($_GET['numero'])){
                        // Comprobamos si el nombre está en el array y lo borramos si el nombre esta en el array y no hay número en el input
                        foreach ($agenda['agenda'] as $clave => $valor) {
                            if ($clave == $_GET['name']) {
                                unset($agenda['agenda'][$clave]);
                            }
                        }
                    } else {
                        // Añadimos el nombre y el número al array (si ya esta, se actualizará el número)
                        $agenda['agenda'][$_GET['name']] = $_GET['numero'];
                    }
                }
            }
            // enviamos la agenda hidden por la url
            echo "<label type=hidden for='agenda'></label><input type=hidden id='agenda' name = 'agenda' value=".serialize($agenda['agenda']).">";
            
            // Imprimimos la agenda para que la vea el usuario
            foreach ($agenda['agenda'] as $clave => $valor) {
                echo "<h1> {$clave} : {$valor} </h1>";
            }
        ?>
        </form> 
    </body>
</html>