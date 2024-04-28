<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url(); ?>/public/fontawesome-free-5.15.4-web/css/all.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-4">
  <i class="bi-alarm"></i>
</div>
<div class="col-md-4">
  <?php 
  if (count($user_lists)) {
    foreach($user_lists as $list){?>
      <div class="card m-1 p-1">
          <h3><?php echo $list->title; ?></h3>
          <p class="m-1">
            <i><?php echo $list->description; ?></i>
            <i class="fas fa-alarm"></i>
          </p>  
</div>
<?php  
}
  }
  
  ?>
</div>
<div class="col-md-4"></div>
</div>
</div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
</body>    
</html>