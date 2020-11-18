<!DOCTYPE html>
<html>

<head>
  <title>Admin- Newsletter Subscription </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }

    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>

<body>
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
<div class="container mt-4">
  <div class="alert alert-success" role="alert" id='alert'>
  
</div>

<div class="card">
    <div class="card-header bg-light"><h4 class="card-title"> Add Newsletter Subscription
     </h4>

    </div>
    <div class="card-body">
  
    <form method="post" id="add_create" name="add_create" 
    >
      <div class="form-group">
        <label>Name</label>
        <input type="text" id ='name'name="name" class="form-control">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="text" id='email'name="email" class="form-control">
      </div>

      <div class="form-group">
        <button type="submit" id="newsletter" class="btn btn-primary btn-block">Add Data</button>
      </div>
    </form>
  </div>
</div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
  
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
            var post_url="<?= site_url('admin/submit-form') ?>";
           
           $.ajax({
                type: "POST",
                url: post_url,
                data : {"email" : email,"name":name},
                dataType: "json",
                success: function (data) {
                   if(data ==1)
                   {
                    $('#alert').html(' You have already subscribe for Newsletter.');
                    
                   }
                    else if(data == 2)
                    {
                      var url="<?= site_url('admin/subscriber-list') ?>";
                     window.location.href =url;
                   }
                   
                    
                }
            });
         }
      });
           

       

    });

</script>
</body>

</html>
