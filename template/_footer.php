 <!-- Bootstrap core JavaScript -->

 <script src="<?php echo base_url('assets/jquery/jquery.slim.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
 <script>
     window.setTimeout(function() {
         $(".alert").fadeTo(500, 0).slideUp(500, function() {
             $(this).remove();
         });
     }, 3000);
 </script>
 </body>

 </html>