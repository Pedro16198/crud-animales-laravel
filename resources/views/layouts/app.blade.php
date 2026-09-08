<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>@yield('title', 'Gestión de Animales')</title>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f4f6f8;
        color: #333;
    }

    header {
        background-color: #2c3e50;
        color: white;
        padding: 20px;
        text-align: center;
    }

    header h1 {
        margin: 0;
    }

    main {
        max-width: 900px;
        margin: 30px auto;
        padding: 0 20px;
    }

    h2 {
        margin-bottom: 20px;
    }

    .mensaje-exito {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        padding: 12px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .lista-animales {
        list-style: none;
        padding: 0;
    }

    .animal {
        background-color: white;
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .acciones {
        margin-top: 10px;
    }

    .acciones a,
    button {
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }

    .acciones a {
        background-color: #3498db;
        color: white;
    }

    .acciones button {
        background-color: #e74c3c;
        color: white;
    }

    .boton-principal {
        display: inline-block;
        background-color: #27ae60;
        color: white;
        padding: 10px 15px;
        border-radius: 4px;
        text-decoration: none;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .campo {
        margin-bottom: 15px;
    }

    .errores {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        padding: 12px;
        margin-bottom: 20px;
        border-radius: 5px;
    }
</style>
```

</head>

<body>

```
<header>
    <h1>Gestión de Animales</h1>
</header>

<main>
    @yield('content')
</main>
```

</body>
</html>
