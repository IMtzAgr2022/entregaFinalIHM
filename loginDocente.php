<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "acceso";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("No hay conexión: " . mysqli_connect_error());
}
$nombre = $_POST["txtUsuario"];
$pass = $_POST["txtpassword"];
date_default_timezone_set(timezoneId: "America/Mexico_City");
$fechaing = date(format: 'Y/m/d');
$horaing = date(format: 'H:i:s');
$alumno = mysqli_query($conn, "SELECT * FROM usuarios WHERE noCuenta = '$nombre' AND idTarjeta = '$pass'");

if (mysqli_num_rows($alumno) > 0) {
    // Registro exitoso
    session_start();
    $_SESSION['alumno'] = "$nombre";

    // Insertar en la tabla "ingresos"
    $consulta = "INSERT INTO ingresos (noCuenta, idTarjeta, FechaIngreso, HoraIngreso) VALUES ('$nombre', '$pass', '$fechaing', '$horaing')";
    $resultado = mysqli_query($conn, $consulta);
    
    // Display success message using JavaScript alert
    echo '<script>alert("Ingreso exitoso.");</script>';
    // Play success sound
    echo '<script>var audio = new Audio("error.mp3"); audio.play();</script>';
    

    // Redirect to the index page
    echo '<script>window.location.href = "index.html";</script>';

    exit();
} else {
    // Display error message using JavaScript alert
    echo '<script>alert("Datos incorrectos, por favor vuelva a introducirlos.");</script>';

    // Redirect to the login page
    echo '<script>window.location.href = "LoginDocente.html";</script>';
}
?>
