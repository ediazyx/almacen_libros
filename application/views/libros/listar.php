<section class="content">             
  <h5>Listar Libros</h5>
  <table id="datalibros" class="display">
    <thead>
        <tr>            
            <th>C&oacute;digo</th>
            <th>T&iacute;tulo</th>
            <th>Autor</th>
            <th>Descripción</th>
            <th>ISBN</th>
            <th>Editorial</th>
            <th>Existencia</th>
            <th>Precio</th>
            <th>Clasificación</th>
            <th>Año</th>
            <th>≡</th>            
        </tr>
    </thead>
    <tbody>
        <?php 
          if(isset($libros))
          {             
            foreach ($libros as $libro) 
            {
                echo "<tr>";
                    echo "<td>".$libro["codlibro"]."</td>";
                    echo "<td>".$libro["titulo"]."</td>";
                    echo "<td>".$libro["autor"]."</td>";
                    echo "<td>".$libro["descripcion"]."</td>";
                    echo "<td>".$libro["isbn"]."</td>";
                    echo "<td>".$libro["editorial"]."</td>";
                    echo "<td>".$libro["cantidad_existencia"]."</td>";
                    echo "<td>".$libro["precio"]."</td>";
                    echo "<td>".$libro["c_descripcion"]."</td>";
                    echo "<td>".$libro["a_descripcion"]."</td>";
                    echo "<td><a href='eliminar_libro/".$libro["codlibro"]."'><img src='assets/images/cancel.jpg'></a></td>";
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