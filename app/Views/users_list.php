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
             <th>S.No</th>
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
          <?php $u =1;
          if($userslist): ?>
          <?php foreach($userslist as $user): ?>
          <tr>
             <!-- <td><?php echo $user['iduser']; ?></td> -->
             <td><?php echo $u++; ?></td>
             <td><?php echo $user['DisplayName']; ?></td>
             <td><?php echo $user['LoginID']; ?></td>
             <td><?php echo $user['Name']; ?></td>
             <td><?php echo $user['Gender']; ?></td>
             <td><?php echo $user['Mobile']; ?></td>
             <td><?php echo $user['EmailID']; ?></td>
             <td>
              <a href="<?php echo base_url('editView/'.$user['iduser']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a onclick="deleteuser('<?php echo base_url('delete/'.$user['iduser']);?>');" href="javascript:void(0)"  class="btn btn-danger btn-sm">Delete</a>
              <a href="javascript:void(0)" onclick="changepwd('<?php echo $user['iduser'] ?>')"  class="btn btn-danger btn-sm"> Change Password</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
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
    title: "Change Password",
    html:
    '<input id="swal-input1" class="swal2-input" type="password">' +
    '<input id="swal-input2" class="swal2-input" type="password">',
    showCancelButton: true,
    confirmButtonColor: "#1FAB45",
    confirmButtonText: "Save",
    cancelButtonText: "Cancel",
    buttonsStyling: true,
    preConfirm: () => {
    if($('#swal-input1').val()==''){
        Swal.showValidationMessage(
          `Please give the Password`
        )
    }
    if($('#swal-input1').val()!=$('#swal-input2').val()){
        Swal.showValidationMessage(
          ` Password and confirm password should be same`
        )
    
      
  }
    }
}).then((result) => {
  if (result.isConfirmed) {
    if($('.swal2-input').val()){
    $.ajax({
        method: "GET",
        url: "changepwd/"+uid,
        data: {'uid': uid,'pwd':$('.swal2-input').val()},
        cache: false,
        success: function(response) {
           if(response==1){
            Swal.fire(
            "Success!",
            "Password has been saved!",
            "success"
            );
            location.reload();
        }
        },
        failure: function (response) {
            Swal.fire(
            "Internal Error",
            "Oops, your Password was not saved.", // had a missing comma
            "error"
            )
        }
    });
}
}
})




}


function deleteuser(url){
        Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {

                $.ajax({
                    method: "GET",
                    url: url,
                    data: {},
                    cache: false,
                    success: function(response) {
                       if(response==1){
                       Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        ).then((result) => {
                            location.reload();
                       } )
                        
                    }
                    },
                    failure: function (response) {
                        Swal.fire(
                        "Internal Error",
                        "Oops,  not Deleted.", // had a missing comma
                        "error"
                        )
                    }
                });


                
              }
            })
    }
</script>
</body>
</html>