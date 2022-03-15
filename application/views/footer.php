      <footer id="footer" class="footer"></footer>

    </div>
   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script type="text/javascript" src="assets/js/jquery-3.5.1.js"></script> 
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>        
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
      
    <script type="text/javascript">
        $(document).ready(function() {
          
          $('#datalibros').DataTable( {            
            
            "language": {
              "url": "assets/lang/es-ES.lang"
            },
            "order": [[ 7, "asc"]]
          } );
          
          $('#dataestudiantes').DataTable( {            
            
            "language": {
              "url": "assets/lang/es-ES.lang"
            },
            "order": [[ 1, "asc"]]
          } );

        } ); // document ready
    </script>
  </body>
</html>