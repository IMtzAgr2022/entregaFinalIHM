<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Página Administrador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .container {
            margin: auto;
            width: 500px;
            padding: 20px;
            border: 2px solid #000000;
            background-color: #ffffff;
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

        h1 {
            text-align: center;
            margin-bottom: 1em;
            font-size: 24px;
            font-weight: bold;
            font-family: cursive;
        }

        footer {
            background-color: #f0f0f0;
            padding: 1em;
            font-size: 0.8em;
            text-align: center;
        }
    </style>
    <script>
        function confirmarAbandono() {
        if (confirm("¿Estás seguro de que deseas abandonar esta página?")) {
            window.location.href = "index.html";
        }
    }

    function mostrarAlerta() {
        // Redirigir a un archivo PDF
        window.location.href = "ManualDeUsuario-Admin.pdf";
    }
    </script>
</head>

<body>
    <header>
        <div>
            <input type="button" name="salir" value="Salir" onclick="confirmarAbandono()">
        </div>
        <h1>Página Administrador</h1>
        <div>
            <input type="button" name="ayuda" value="Ayuda" onclick="mostrarAlerta()">
        </div>
    </header>

    <div class="container">
        <form method="post">
            <div class="button-container">
                <input type="button" name="registrar" value="Registrar Usuario" onclick="location='registroUsuarioByAdmin.php'">
                <input type="button" name="registros" value="Consulta Registros" onclick="location='consulta_registros.php'">
                <input type="button" name="ingresos" value="Consulta Ingresos" onclick="location='consulta_ingresos.php'">
            </div>
        </form>
    </div>

    <footer>
        Autor: WebDesigners | Teléfono: 7223486261 | Email: imartineza005@alumno.uaemex.mx | Versión: 2.0
    </footer>
</body>
</html>
