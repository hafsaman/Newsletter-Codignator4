<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to !</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	

	

</header>

<!-- CONTENT -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   --><body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
     
        <a class="nav-link" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url('/list') ?>">Newsletters</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/subscriber-list') ?>">Admin</a>
  
      </li>
    </ul>
  
 
  
</nav>
<div class="alert alert-success" role="alert" id='alert'>
  
</div>
     <div class="container mt-5">
     	<div class="card">
    <div class="card-header"><h4 class="card-title bg-light"> Suscribe For  Newsletter
     </h4>

    </div>
    <div class="card-body">
  
 <form method="post" id="add_create" name="add_create" >
    <div class="row">
      <div class=" col form-group">
        <label>Name</label>
        <input type="text" id='name' name="name" class="form-control" required>
      </div>

      <div class="col form-group">
        <label>Email</label>
        <input type="text" id='email'name="email" class="form-control" required>
      </div>
</div>
 <div class="row justify-content-md-center">
      <div class="col form-group" >
      	<button id="newsletter" type="submit" class="btn btn-primary subscribed">Subscribe</button>
          </div>
      </div>
    </form>
  </div>
           
  </div>                 
                  
               


<!-- FOOTER: DEBUG INFO + COPYRIGHTS 

<footer>
	

	<div class="copyrights">

		<p>&copy; <?= date('Y') ?> CodeIgniter Foundation. CodeIgniter is open source project released under the MIT
			open source licence.</p>

	</div>

</footer>

<!-- SCRIPTS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>
   

   

/// ajax post request
  //  $(document).ready(function () {
  	$("#newsletter").click(function(e) {
        
  $("#add_create").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          email: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
        },
         submitHandler: function(form) {
         	 e.preventDefault();
            var email = $("#email").val();
            var name = $("#name").val();
            var post_url="<?= site_url('addnew') ?>";
           
            
           $.ajax({
                type: "POST",
                url: post_url,
                data : {"email" : email,"name":name},
                dataType: "json",
                success: function (data) {
                   
                   $('#alert').html(data);
                    // $('#alert').replaceWith($('#alert',data));
                    //add message here
                }
            });
         }
      });
           

       

    });

</script>
 
</body>

</html>

