<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Acceso";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesar el formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores enviados por el formulario
    $noCuenta = $_POST['noCuenta'];
    $nombres = $_POST['nombres'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $genero = $_POST['genero'];
    $tipoUsuario = $_POST['tipoUsuario'];
    $idTarjeta = $_POST['idTarjeta'];

    // Insertar los datos en la tabla "usuarios"
    $sql = "INSERT INTO usuarios (noCuenta, nombres, apellidoPaterno, apellidoMaterno, genero, tipoUsuario, idTarjeta)
    VALUES ('$noCuenta', '$nombres', '$apellidoPaterno', '$apellidoMaterno', '$genero', '$tipoUsuario', '$idTarjeta')";

    if ($conn->query($sql) === true) {
        //$message = "Registro exitoso";
        //echo "<script>alert('Registro exitoso');</script>";
        //alert("Registro exitoso.");
        //header('Location: index.html');
        //exit();
        echo "<script>alert('Registro exitoso'); window.location.href = 'pagina_administrador.php';</script>";
        exit();
    } else {
        $message = "Registro inválido";
        //header('Location: registroUsuarioByAdmin.php?error=ID de Tarjeta inválido. Por favor, ingrese nuevamente');
        //exit();
        //echo "<script>alert('Error al registrar, intente de nuevo');</script>";

    }
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        /* Estilos CSS */
        /* ... (Tu código CSS aquí) ... */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-bottom: 1em;
            font-size: 24px;
            font-weight: bold;
            font-family: cursive;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        section {
            display: flex;
            justify-content: center;
            padding: 2em;
        }

        form {
            width: 50%;
            display: flex;
            flex-direction: column;
        }

        label,
        input,
        button {
            margin-bottom: 1em;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 1em;
            cursor: pointer;
        }

        input[type="button"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 0.5em 1em;
            cursor: pointer;
            font-size: 1em;
            margin-bottom: 0.5em;
        }

        footer {
            background-color: #f0f0f0;
            padding: 1em;
            text-align: center;
            font-size: 0.8em;
            margin-top: 2em;
        }

        

        #message {
            background-color: #ffcccc;
            color: #ff0000;
            padding: 1em;
            margin-bottom: 1em;
        }
        
    </style>
    <script>
        // Funciones de validación de datos
        // ... (Tu código JavaScript aquí) ...

        function validateNoCuenta() {
            var noCuentaInput = document.getElementById("noCuenta");
            var noCuenta = noCuentaInput.value.trim();

            if (!/^\d{7}$/.test(noCuenta)) {
                alert("El número de cuenta debe contener exactamente 7 números enteros.");
                noCuentaInput.value = "";
                return false;
            }

            return true;
        }

        function validateNombres() {
            var nombresInput = document.getElementById("nombres");
            var nombres = nombresInput.value.trim();

            if (!/^[A-Za-záéíóúüÁÉÍÓÚÜ]{1,65}$/.test(nombres)) {
                alert("Los nombres deben contener únicamente letras y tener una longitud máxima de 65 caracteres.");
                nombresInput.value = "";
                return false;
            }

            return true;
        }

        function validateApellidoPaterno() {
            var apellidoPaternoInput = document.getElementById("apellidoPaterno");
            var apellidoPaterno = apellidoPaternoInput.value.trim();

            if (!/^[A-Za-záéíóúüÁÉÍÓÚÜ]{1,65}$/.test(apellidoPaterno)) {
                alert("El apellido paterno debe contener únicamente letras y tener una longitud máxima de 65 caracteres.");
                apellidoPaternoInput.value = "";
                return false;
            }

            return true;
        }

        function validateApellidoMaterno() {
            var apellidoMaternoInput = document.getElementById("apellidoMaterno");
            var apellidoMaterno = apellidoMaternoInput.value.trim();

            if (!/^[A-Za-záéíóúüÁÉÍÓÚÜ]{1,65}$/.test(apellidoMaterno)) {
                alert("El apellido materno debe contener únicamente letras y tener una longitud máxima de 65 caracteres.");
                apellidoMaternoInput.value = "";
                return false;
            }

            return true;
        }

        function validateIdTarjeta() {
            var idTarjetaInput = document.getElementById("idTarjeta");
            var idTarjeta = idTarjetaInput.value.trim();

            if (!/^[A-Za-z0-9]{1,20}$/.test(idTarjeta)) {
                alert("El identificador de tarjeta debe contener únicamente letras y números, y tener una longitud máxima de 20 caracteres.");
                idTarjetaInput.value = "";
                return false;
            }

            return true;
        }


        function validateForm() {
            return (
                validateNoCuenta() &&
                validateNombres() &&
                validateApellidoPaterno() &&
                validateApellidoMaterno() &&
                validateIdTarjeta() &&
                validateIdHuella()
            );
        }
        function confirmarAbandono() {
            if (confirm("¿Estás seguro de que deseas abandonar esta página?")) {
                window.location.href = "pagina_administrador.php";
            }
        }
        function mostrarAlerta() {
        	alert("Como administrador puedes registrar a cualquier usuario con cualquier rol.");
    	}
    </script>
</head>

<body>
    <!-- Contenido de la página -->
    
    <header>
	<div>
      <input type="button" name="salir" value="Regresar" onclick="confirmarAbandono()">
    </div>
        <h1>Registro de Usuario</h1>
    <div>
      <input type="button" name="ayuda" value="Ayuda" onclick="mostrarAlerta()">
    </div> 
    </header>
    	
    

    <section>
        <form id="registroForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <!-- Campos del formulario -->
            <?php if (isset($message)) : ?>
                <div id="message"><?php echo $message; ?></div>
            <?php endif; ?>
            <label for="noCuenta">*Número de cuenta:</label>
            <input type="text" id="noCuenta" name="noCuenta" required placeholder="1234567">

            <label for="nombres">*Nombres:</label>
            <input type="text" id="nombres" name="nombres" required placeholder="Jorge">

            <label for="apellidoPaterno">*Apellido Paterno:</label>
            <input type="text" id="apellidoPaterno" name="apellidoPaterno" required placeholder="López">

            <label for="apellidoMaterno">*Apellido Materno:</label>
            <input type="text" id="apellidoMaterno" name="apellidoMaterno" required placeholder="Zepeda">

            <label for="genero">*Género:</label>
            <select id="genero" name="genero" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="No binario">No binario</option>
                <option value="Prefiero no decir">Prefiero no decir</option>
            </select>

            <label for="tipoUsuario">*Tipo de usuario:</label>
            <select id="tipoUsuario" name="tipoUsuario" required>
                <option value="Alumno">Alumno</option>
                <option value="Docente">Docente</option>
            </select>

            <label for="idTarjeta">*Identificador de la Tarjeta:</label>
            <input type="text" id="idTarjeta" name="idTarjeta" required placeholder="A9B8C7D6" pattern="[A-Za-z0-9]{8}">

            <button type="submit" id="submitBtn">Registrar</button>
        </form>
        <?php
        // Verificar si se ha pasado un mensaje de error en la URL
        if (isset($_GET['error'])) {
            // Mostrar el mensaje de error
            $error = $_GET['error'];
            echo '<script>alert("' . $error . '");</script>';
        }
        ?>
    </section>
    <footer>
        Autor: WebDesigners | Teléfono: 7223486261 | Email: imartineza005@alumno.uaemex.mx | Versión: 1.0
    </footer>
    
    <script>
        // Lógica JavaScript adicional
        // ... (Tu código JavaScript aquí) ...
        

        <?php if (isset($errorMessage)) : ?>
            alert("<?php echo $errorMessage; ?>");
        <?php endif; ?>

        <?php if (isset($successMessage)) : ?>
            alert("<?php echo $successMessage; ?>");
        <?php endif; ?>
    </script>
</body>

</html>