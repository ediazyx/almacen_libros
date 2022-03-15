<section class="content">             
  <h5>Listar Libros</h5>
  <table id="dataestudiantes" class="display">
    <thead>
        <tr>            
            <th>Carné Identidad</th>
            <th>Nombre(s) y Apellidos</th>
            <th>Dirección</th>
            <th>Sexo</th>
            <th>Año</th>            
            <th>≡</th>            
        </tr>
    </thead>
    <tbody>
        <?php 
          if(isset($estudiantes))
          {             
            foreach ($estudiantes as $estudiante) 
            {
                echo "<tr>";
                    echo "<td>".$estudiante["carnet_identidad"]."</td>";
                    echo "<td>".$estudiante["nombre_completo"]."</td>";
                    echo "<td>".$estudiante["direccion"]."</td>";
                    echo "<td>".$estudiante["s_descripcion"]."</td>";
                    echo "<td>".$estudiante["a_descripcion"]."</td>";                    
                    echo "<td><a href='eliminar_estudiante/".$estudiante["carnet_identidad"]."'><img src='assets/images/cancel.jpg'></a></td>";
                echo "</tr>";                
            }            
          }
          else
          {
              echo "<br>";
              echo "<p>No hay libros en la base de datos.</p>";
          }
          
        ?>
    </tbody>
  </table>         
</section>