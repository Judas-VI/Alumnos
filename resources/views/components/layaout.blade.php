<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Alumnos</title>
    {{-- Enlace a Bootstrap 5.3 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    {{-- ESTILO PERSONALIZADO PARA EL MODO OSCURO --}}
    <style>
        /* Estilo para que el cuerpo sea oscuro y todo el texto por defecto sea claro */
        body {
            background-color: #343a40 !important; /* bg-dark o un gris oscuro similar */
            color: #f8f9fa !important; /* text-light */
        }
        /* Ajuste para inputs que a veces no se ven bien en modo oscuro */
        .form-control, .form-select, input[type="date"] {
            background-color: #212529 !important; /* Fondo del input un poco más oscuro que el contenedor principal */
            color: #f8f9fa !important;
            border-color: #6c757d !important; /* Borde gris sutil */
        }
        .form-control:focus {
            background-color: #212529 !important;
            color: #f8f9fa !important;
            border-color: #0d6efd !important; /* El foco se mantiene azul primario */
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25) !important;
        }
    </style>
</head>
<body>

    {{ $slot }}

    {{-- Script de Bootstrap 5.3 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>