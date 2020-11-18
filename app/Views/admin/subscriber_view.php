<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin- Newsletter Subscription </title>
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
  
  <div class="card"> <div class="card-header bg-light"><h4>Newsletter Subscription
    
<span class="float-md-right">
        <a href="<?php echo base_url('/admin/subscriber-form') ?>" class="btn btn-success mb-2">Add Subscriber</a></span> </h4>
    </div>
    <div class="card-body">
    

    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="subscribers-list">
       <thead>
          <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Email</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($subscriber): ?>
          <?php foreach($subscriber as $subs): ?>
          <tr>
             <td><?php echo $subs['id']; ?></td>
             <td><?php echo $subs['name']; ?></td>
             <td><?php echo $subs['email']; ?></td>
             <td>
              <a href="<?php echo base_url('admin/edit-view/'.$subs['id']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('admin/delete/'.$subs['id']);?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#subscribers-list').DataTable();
  } );
</script>
</body>
</html>