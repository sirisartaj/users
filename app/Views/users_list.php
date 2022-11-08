<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Codeigniter 4 CRUD App Example - positronx.io</title>
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
<div class="container mt-4" >
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/userForm') ?>" class="btn btn-success mb-2">Add User</a>
	</div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="users-list">
       <thead>
          <tr>
             <th>User Id</th>
             <th>Display Name</th>
             <th>Login ID</th>
             <th>Name</th>
             <th>Gender</th>
             <th>Mobile</th>
             <th>Email ID</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($users): ?>
          <?php foreach($users as $user): ?>
          <tr>
             <td><?php echo $user['iduser']; ?></td>
             <td><?php echo $user['DisplayName']; ?></td>
             <td><?php echo $user['LoginID']; ?></td>
             <td><?php echo $user['Name']; ?></td>
             <td><?php echo $user['Gender']; ?></td>
             <td><?php echo $user['Mobile']; ?></td>
             <td><?php echo $user['EmailID']; ?></td>
             <td>
              <a href="<?php echo base_url('editView/'.$user['iduser']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('delete/'.$user['iduser']);?>" class="btn btn-danger btn-sm">Delete</a>
              <button type="button" onclick="changepwd('<?php echo $user['iduser'] ?>')"  class="btn btn-danger btn-sm"> Change Password</button>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready( function () {
      $('#users-list').DataTable();
  } );

function changepwd(uid){

//alert(uid);
Swal.fire({
  title: 'Change Password',
  input: 'password',
  inputAttributes: {
    autocapitalize: 'off'
  },
  showCancelButton: true,
  confirmButtonText: 'Change Password',
  showLoaderOnConfirm: true,
  preConfirm: (login) => {
    return fetch(`//api.github.com/users/${login}`)
      .then(response => {
        if (!response.ok) {
          throw new Error(response.statusText)
        }
        return response.json()
      })
      .catch(error => {
        Swal.showValidationMessage(
          `Password should not empty: ${error}`
        )
      })
  },
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire({
      title: `${result.value.login}'s avatar`,
      imageUrl: result.value.avatar_url
    })
  }
})
}
</script>
</body>
</html>