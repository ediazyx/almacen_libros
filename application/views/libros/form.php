<section class="content">             
    <div class="form-container form-container-width-50">
        <h5>Registrar Libro</h5>

        <?php echo validation_errors(); ?>
        <?php echo form_open('insertar_libro'); ?>

        <!-- <form class="needs-validation" novalidate action="insertar_libro" method="post"> -->
          <div class="row g-1">
            <div class="col-sm-3">
              <label for="codigo" class="form-label">Código</label>
              <input type="text" class="form-control" name="codigo" placeholder="" required>
              <div class="invalid-feedback">
                Se requiere un código válido.
              </div>
            </div>

            <div class="col-sm-9">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" class="form-control" name="titulo" placeholder="" required>
              <div class="invalid-feedback">
                Se requiere un título válido.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="autor" class="form-label">Autor </label>
              <input type="text" class="form-control" name="autor" placeholder="" value="" required>
              <div class="invalid-feedback">
              Se requiere un nombre de autor válido.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="descripcion" class="form-label">Descripción</label>              
              <textarea class="form-control" name="descripcion" rows="2" required></textarea>
              <div class="invalid-feedback">
                Se requiere una descripción del libro.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="isbn" class="form-label">ISBN</label>
              <input type="text" class="form-control" name="isbn" placeholder="" value="" required>
              <div class="invalid-feedback">
                Se requiere un ISBN válido.
              </div>
            </div>          

            <div class="col-sm-6">
              <label for="editorial" class="form-label">Editorial</label>
              <input type="text" class="form-control" name="editorial" placeholder="" value="" required>              
            </div>  

            <div class="col-sm-3">
              <label for="cantidad" class="form-label">Cantidad Existente</label>
              <input type="text" class="form-control" name="cantidad" placeholder="" value="" required>
              <div class="invalid-feedback">
                Se requiere un valor válido.
              </div>
            </div>  

            <div class="col-sm-2">
              <label for="precio" class="form-label">Precio</label>
              <input type="text" class="form-control" name="precio" placeholder="" value="" required>
              <div class="invalid-feedback">
                Se requiere un valor válido.
              </div>
            </div>  
            <div class="col-sm-4">
              <label for="clasificacion" class="form-label">Clasificación</label>
              <select class="form-select" name="clasificacion" aria-label="Default select example">                
              <option class="underline">Selecciona</option>
                <?php foreach ($clasificacion as $item) 
                  echo "<option value=".$item["idclasificacion"].">".$item["descripcion"]."</option>"; 
                ?>
              </select>
            </div>             
            <div class="col-sm-3">
              <label for="anno" class="form-label">Año</label>
              <select class="form-select" name="anno" aria-label="Default select example">
                <option class="underline">Selecciona</option>
                <?php foreach ($anno as $item) 
                  echo "<option value=".$item["idanno"].">".$item["descripcion"]."</option>"; 
                ?>
              </select>
            </div>
            

          </div>
          <hr>
          <div class="submit-container">
            <button class="btn btn-primary" type="submit">Guardar</button>
          </div>
        <?php echo form_close(); ?>
    </div>         
</section>