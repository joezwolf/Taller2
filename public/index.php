<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Calculadora</h1>
        <form method="POST" action="procesar.php">
            <div class="mb-3">
                <label for="valor1" class="form-label">Valor 1 (Puede ser en kilómetros o altura en metros, suma o multiplicación):</label>
                <input type="text" class="form-control" name="valor1" id="valor1" required>
            </div>

            <div class="mb-3">
                <label for="valor2" class="form-label">Valor 2 (Puede ser en kilómetros o peso en kilogramos, suma o multiplicación):</label>
                <input type="text" class="form-control" name="valor2" id="valor2" required>
            </div>

            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>