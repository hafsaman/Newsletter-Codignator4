<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Newsletter  </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
   <div class="card">
    <div class="card-header bg-light"><h4 class="card-title">Subscriber Email- Get Newsletter </h4></div>
    <div class="card-body">
  
    <form method="post" id="list_news" name="list_news" 
    action="<?= site_url('listview') ?>">
     
<div class="row">

      <div class="col-3">
         <label  style="align: right;">Email</label>
      </div>
       <div class="col-4">
       
        <input type="text"  placeholder='email' name="email" class="form-control" required="required">
      </div>

      <div class="col-2 form-group">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </div>
       <div class="col-3">
      </div>
    </div>
    </form>
  </div>
</div>
   
    <?php
     if(isset($email)){ ?>
       <div class="alert alert-success" role="alert">You had subscribe with <?=$email;?> </div>
     <?php }
     ?>
     <?php
     if(isset($message)){ ?>
       <div class="alert alert-success" role="alert"> <?=$message;?> </div>
     <?php }
     ?> 
     <br/>
<div class="card">
    <div class="card-header bg-light"><h4 class="card-title">Newsletter </h4>

    </div>
    <div class="card-body">
  
  <div class="mt-3">
     <table class="table table-bordered" id="subscribers-list">
       <thead>
          <tr>
             <th>Id</th>
             <th>Title</th>
             <th>Detail</th>
             <th>Date</th>
            
          </tr>
       </thead>
       <tbody>
          <?php if(isset($newsletter)): ?>
          <?php foreach($newsletter as $subs): ?>
          <tr>
             <td><?php echo $subs['id']; ?></td>
             <td><?php echo $subs['title']; ?></td>
             <td><?php echo $subs['message']; ?></td>
             <td><?php echo $subs['created_at']; ?></td>
             
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#list_news").length > 0) {
      $("#list_news").validate({
        rules: {
         
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
        },
        messages: {
          
          email: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
        },
      })
    }
  </script>
<script>
    $(document).ready( function () {
      $('#subscribers-list').DataTable();
  } );
</script>
</body>
</html>