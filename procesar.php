<?php
//Creamos 2 Arrays para guardar los datos o los errores que se han encontrado
$errores = [];
$datos = [];

//Comprobar el POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //Validar nombre
    if (isset($_POST['inputNombre']) && !empty($_POST['inputNombre'])) { //Verifica que todos los campos requeridos hayan sido enviados
        $datos['nombre'] = htmlspecialchars($_POST['inputNombre']); //Si la validación es correcta, guardamos el dato en su Array
    } else {
        $errores['nombre'] = "El nombre completo es obligatorio."; //Si la validación es incorrecta, guardamos el error en su Array
    }

    //Validar email
    if (isset($_POST['inputEmail4']) && !empty($_POST['inputEmail4'])) { //Verifica que todos los campos requeridos hayan sido enviados
        // Verificamos que el email tenga un formato válido
        if (filter_var($_POST['inputEmail4'], FILTER_VALIDATE_EMAIL)) {
            $datos['email'] = htmlspecialchars($_POST['inputEmail4']);
        } else {
            $errores['email'] = "El correo electrónico no es válido.";
        }
    } else {
        $errores['email'] = "El correo electrónico es obligatorio.";
    }

    //Validar teléfono
    if (isset($_POST['inputNumTel']) && !empty($_POST['inputNumTel'])) { //Verifica que todos los campos requeridos hayan sido enviados
        $datos['telefono'] = htmlspecialchars($_POST['inputNumTel']);
    } else {
        $errores['telefono'] = "El número de teléfono es obligatorio.";
    }

    //Validar fecha de nacimiento
    if (isset($_POST['inputFechaNac']) && !empty($_POST['inputFechaNac'])) { //Verifica que todos los campos requeridos hayan sido enviados
        $datos['fecha_nacimiento'] = htmlspecialchars($_POST['inputFechaNac']);
    } else {
        $errores['fecha_nacimiento'] = "La fecha de nacimiento es obligatoria.";
    }

    //Validar género
    if (isset($_POST['flexRadioDefault'])) { //Verifica que todos los campos requeridos hayan sido enviados
        $datos['genero'] = $_POST['flexRadioDefault'];
    } else {
        $errores['genero'] = "El género es obligatorio.";
    }

    //Validar fecha del evento
    if (isset($_POST['inputFechaEvento']) && !empty($_POST['inputFechaEvento'])) { //Verifica que todos los campos requeridos hayan sido enviados
        $datos['fecha_evento'] = htmlspecialchars($_POST['inputFechaEvento']);
    } else {
        $errores['fecha_evento'] = "La fecha del evento es obligatoria.";
    }

    //Validar tipo de entrada
    if (isset($_POST['inputState']) && !empty($_POST['inputState'])) { //Verifica que todos los campos requeridos hayan sido enviados
        $datos['tipo_entrada'] = $_POST['inputState'];
    } else {
        $errores['tipo_entrada'] = "Debe seleccionar un tipo de entrada.";
    }

    //Validar contraseña
    if (isset($_POST['inputContra']) && !empty($_POST['inputContra'])) { //Verifica que todos los campos requeridos hayan sido enviados
        $datos['contrasena'] = htmlspecialchars($_POST['inputContra']);
    } else {
        $errores['contrasena'] = "La contraseña es obligatoria.";
    }

    //Validar confirmación de contraseña
    if (isset($_POST['inputConfContra']) && !empty($_POST['inputConfContra'])) { //Verifica que todos los campos requeridos hayan sido enviados
        if ($_POST['inputConfContra'] === $_POST['inputContra']) {
            $datos['conf_contrasena'] = htmlspecialchars($_POST['inputConfContra']);
        } else {
            $errores['conf_contrasena'] = "Las contraseñas no coinciden.";
        }
    } else {
        $errores['conf_contrasena'] = "Debe de confirmar la contraseña.";
    }

    //Mostrar datos recogidos en el FORM (Si no hay errores)
    if (empty($errores)) {
        echo "<h2>Datos recibidos:</h2>";
        echo "<ul>"; //Crear la lista de los datos
        foreach ($datos as $campo => $valor) { //Recorrer el Array de los datos e ir mostrandolos con un estilo
            echo "<li><strong>" . ucfirst(str_replace('_', ' ', $campo)) . ":</strong> " . $valor . "</li>";
        }
        echo "</ul>";
    } else {
        //Si existen errores, mostrar cuales son para corregirlos
        echo "<h2>Errores encontrados en el formulario:</h2>";
        echo "<ul>"; //Crear la lista de los errores
        foreach ($errores as $campo => $mensaje) { //Recorrer el Array de los errores e ir mostrandolos con un estilo
            echo "<li><strong>" . ucfirst(str_replace('_', ' ', $campo)) . ":</strong> " . $mensaje . "</li>";
        }
        echo "</ul>";
    }
} else {
    echo "<h2>El formulario no fue enviado correctamente.</h2>";
}
?>