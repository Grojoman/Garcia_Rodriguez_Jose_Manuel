<?php

/**
 * Imprime los datos enviados desde un formulario mediante POST en forma de tabla HTML.
 *
 * Esta función verifica si la petición fue realizada mediante POST. Si es así, construye una
 * tabla HTML con los campos: nombre, apellidos, fecha de nacimiento y teléfono. Si no se han
 * enviado datos, muestra un mensaje indicándolo.
 *
 * @author José Manuel García Rodríguez
 * @version 1.0
 * @since 1.0
 * @private DAW
 * 
 * @global array $_POST Datos recibidos del formulario.
 * @global array $_SERVER Información del servidor, usada para verificar el método de la petición.
 *
 * @return void No devuelve ningún valor; muestra directamente la tabla o el mensaje en la salida estándar.
 */
function mostrarDatosFormulario() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $campos = [
            "nombre" => "Nombre",
            "apellidos" => "Apellidos",
            "fecha_nacimiento" => "Fecha de nacimiento",
            "telefono" => "Teléfono"
        ];

        echo "<h2>Datos recibidos:</h2>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>Campo</th><th>Valor</th></tr>";

        foreach ($campos as $clave => $etiqueta) {
            $valor = isset($_POST[$clave]) ? htmlspecialchars($_POST[$clave]) : "No proporcionado";
            echo "<tr><td>$etiqueta</td><td>$valor</td></tr>";
        }

        echo "</table>";
    } else {
        echo "No se recibieron datos.";
    }
}
