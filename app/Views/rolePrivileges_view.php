<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SIRI</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="<?php echo base_url().'/usersList';?>">Siri</a></h1>
      <nav id="navbar" class="navbar">
        <ul class="nav">
          <li class="nav-item"><a class="nav-link scrollto" href="<?php echo base_url().'/usersList';?>"><span class="btn btn-outline-primary">Users</span></a></li>
          <li class="nav-item"><a class="nav-link scrollto " href="<?php echo base_url().'/rolesList';?>"><span class="btn btn-outline-primary">Roles</span></a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <div style="clear:both;margin-top: 70px !important;">
  </div>
  <form method="post" action="">
<div class="container mt-4" >
    <div class="row">
    	 <input type="hidden" name="iduserrole" id="id" value="<?php echo $roleid; ?>">
    	<?php 
    	foreach($roleprivilegeslist as $rp){
    		$listp[$rp['idaccessright']] = $rp['idaccessright'];
    	}
    	
    	foreach($accessrights as $accessright){
    		
    		?>
    		<div class="form-check form-check-inline">
			  <input class="form-check-input" type="checkbox" name="accessright[]" <?php echo in_array($accessright['idAccessRights'],$listp)?'checked':'';?> id="<?php echo $accessright['idAccessRights'];?>" value="<?php echo $accessright['idAccessRights'];?>">
			  <label class="form-check-label" for="<?php echo $accessright['idAccessRights'];?>"><?php echo $accessright['Name'];?></label>
			</div>
    	<?php } ?>
    	

    </div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <input type="submit" value="Map" name="save" class="btn btn-primary"/>
  </div>
</div>
 </form>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   

</script>
</body>
</html>