<section class="content">             
    <div class="form-container form-container-width-40">
        <h5>Insertar Estudiante</h5>

        <?php echo validation_errors(); ?>
        <?php echo form_open('insertar_estudiante'); ?>

        <!-- <form class="needs-validation" novalidate action="insertar_libro" method="post"> -->
          <div class="row g-1">
            <div class="col-sm-4">
              <label for="codigo" class="form-label">Carné de Identidad</label>
              <input type="text" class="form-control" name="ci" placeholder="" required>
              <div class="invalid-feedback">
                Se requiere un número de identidad.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="titulo" class="form-label">Nombre(s) y Apellidos</label>
              <input type="text" class="form-control" name="nombre" placeholder="" required>
              <div class="invalid-feedback">
                Se requiere un nombre.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="autor" class="form-label">Dirección </label>
              <input type="text" class="form-control" name="direccion" placeholder="" value="" required>
              <div class="invalid-feedback">
                Se requiere una dirección.
              </div>
            </div>
              
            <div class="col-sm-5">
              <label for="clasificacion" class="form-label">Sexo</label>
              <select class="form-select" name="sexo" aria-label="Default select example">                
              <option class="underline">Selecciona</option>
                <?php foreach ($sexo as $item) 
                  echo "<option value=".$item["idsexo"].">".$item["descripcion"]."</option>"; 
                ?>
              </select>
            </div>             
            <div class="col-sm-4">
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