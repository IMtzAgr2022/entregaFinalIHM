<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Registros</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    header {
      background-color: #4CAF50;
      color: white;
      padding: 10px;
      text-align: center;
      margin-bottom: 20px;
      display: flex;
      justify-content: space-between;
    }

    footer {
      background-color: #f0f0f0;
      padding: 1em;
      font-size: 0.8em;
      text-align: center;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    .container {
      margin: 50px auto;
      width: 80%;
      padding: 20px;
      border: 2px solid #000000;
      background-color: #ffffff;
      box-sizing: border-box;
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

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }

    label {
      font-size: 18px;
      font-weight: bold;
      font-family: cursive;
      display: block;
      margin-bottom: 5px;
    }
  </style>
  <script>
    function confirmarAbandono() {
      if (confirm("¿Estás seguro de que deseas abandonar esta página?")) {
        window.location.href = "pagina_administrador.php";
      }
    }

    function mostrarAlerta() {
      alert("Aquí se muestran los usuarios registrados en una tabla");
    }
  </script>
</head>

<body>
  <header>
    <div>
      <input type="button" name="regresar" value="Regresar" onclick="confirmarAbandono()">
    </div>
    <h1>Usuarios registrados</h1>
    <div>
      <input type="button" name="ayuda" value="Ayuda" onclick="mostrarAlerta()">
    </div>
  </header>
  <div class="container">
    <table>
      <tr>
        <th>ID de usuario</th>
        <th>Número de cuenta</th>
        <th>Nombres</th>
        <th>Apellido paterno</th>
        <th>Apellido materno</th>
        <th>Género</th>
        <th>ID de Tarjeta</th>
        <th>Tipo de usuario</th>
      </tr>

      <?php
      $conexion = mysqli_connect('localhost', 'root', '', 'acceso');
      $sql = "SELECT * from usuarios";
      $result = mysqli_query($conexion, $sql);

      while ($mostrar = mysqli_fetch_array($result)) {
      ?>
        <tr>
          <td><?php echo $mostrar['idUsuario'] ?></td>
          <td><?php echo $mostrar['noCuenta'] ?></td>
          <td><?php echo $mostrar['nombres'] ?></td>
          <td><?php echo $mostrar['apellidoPaterno'] ?></td>
          <td><?php echo $mostrar['apellidoMaterno'] ?></td>
          <td><?php echo $mostrar['genero'] ?></td>
          <td><?php echo $mostrar['idTarjeta'] ?></td>
          <td><?php echo $mostrar['tipoUsuario'] ?></td>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>

  <footer>
    Autor: WebDesigners | Teléfono: 7223486261 | Email: imartineza005@alumno.uaemex.mx | Versión: 2.0
  </footer>
</body>

</html>
