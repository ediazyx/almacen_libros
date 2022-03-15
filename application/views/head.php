<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css"/>    
    <link rel="stylesheet" type="text/css" href="assets/css/headers.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/content.css"/>  

  <title>Almacén de Libros</title>
  </head>
  <body>    
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
          <li class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">            
            <span class="fs-4">Almacén de Libros</span>
          </li>    
          <ul id="menu" class="nav nav-pills">
            <li class="nav-item"><a href="." class="nav-link" aria-current="page">Inicio</a></li>            
            <li class="dropdown">
              <button type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                Libros
              </button>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="nuevo_libro" class="nav-link">Nuevo Libro</a></li>
                <li class="nav-item"><a href="listar_libros" class="nav-link">Listar Libros</a></li>                
              </ul>
            </li> 
            <li class="dropdown">
            <button type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> 
                Estudiantes
              </button>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="nuevo_estudiante" class="nav-link">Nuevo Estudiante</a></li>
                <li class="nav-item"><a href="listar_estudiantes" class="nav-link">Listar Estudiantes</a></li>                
              </ul>
            </li>
          </ul>        
        </header>