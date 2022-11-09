<!DOCTYPE html>
<html>
<head>
  <title>SIRI - Edit User Demo</title>
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
  <div class="container mt-5">
    <form method="post" id="update_user" name="update_user" 
    action="<?= site_url('/update') ?>" onsubmit="return validcreateform();">
      <input type="hidden" name="iduser" id="id" value="<?php echo $user_obj['iduser']; ?>">
      <input type="hidden" name="LoginID" id="id" value="<?php echo $user_obj['LoginID']; ?>">
     

      <div class="row">
      <div class="form-group col-md-4">
                  <label for="dname">Display Name</label>
                  <input type="text" class="form-control" id="dname" name="DisplayName" placeholder="Display Name" value="<?php echo $user_obj['DisplayName']; ?>">
                  <span id="dname-error" class="error"></span>
                </div>
                <div class="form-group col-md-4">
                  <label for="name">First Name</label>
                  <input type="text" class="form-control" id="name" name="Name"  placeholder="First Name" value="<?php echo $user_obj['Name']; ?>">
                  <span id="name-error" class="error"></span>
                </div>
                <div class="form-group col-md-4">
                  <label for="lastName">Last Name</label>
                  <input type="text" class="form-control" id="lastName" name="SurName" placeholder="Last Name" value="<?php echo $user_obj['SurName']; ?>">
                  <span id="lastName-error" class="error"></span>
                </div>

                <div class="form-group col-md-4">
                  <label for="EmailId">Email</label>
                  <input type="email" class="form-control" id="EmailId" name="EmailID" placeholder="Email" value="<?php echo $user_obj['EmailID']; ?>">
                  <span id="EmailId-error" class="error"></span>
                </div>
                
                <div class="form-group col-md-4">
                  <label for="Phone">Phone</label>
                  <input type="text" class="form-control" id="Phone" name="Phone" placeholder="Phone" value="<?php echo $user_obj['Phone']; ?>">
                  <span id="Phone-error" class="error"></span>
                </div>
                <div class="form-group col-md-4">
                  <label for="mobile">Mobile</label>
                  <input type="text" class="form-control" id="mobile" name="Mobile" placeholder="Mobile" value="<?php echo $user_obj['Mobile']; ?>">
                  <span id="mobile-error" class="error"></span>
                </div>
                <div class="form-group col-md-4">
                  <label for="Address1">Address1</label>
                  <input type="text" class="form-control" id="Address1" name="Address1" placeholder="Address1" value="<?php echo $user_obj['Address1']; ?>">
                </div>

                <div class="form-group col-md-4">
                  <label for="Address2">Address2</label>
                  <input type="text" class="form-control" id="Address2" name="Address2" placeholder="Address2" value="<?php echo $user_obj['Address2']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="idCountry">idCountry</label>
                  <select id="idCountry" class="form-control"  name="idCountry" >
                    <option value="1" selected="selected">INDIA</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="idState">idState</label>
                  <select id="idState" class="form-control"  name="idState" onChange="statechange(this);" > 
                  <?php foreach($states as $state){ ?>                 
                    <option value="<?php echo $state['id']; ?>" <?Php echo $user_obj['idState']==$state['id']?'selected':''; ?>><?php echo $state['name']; ?></option>
                  <?php } ?>
                                        
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="idCity">idCity</label>
                  <select id="idCity" class="form-control"  name="idCity">  
                  cities     
                  <?php foreach($cities as $city){ ?>            
                    <option value="<?php echo $city['id']; ?>" <?Php echo $user_obj['idCity']==$city['id']?'selected':''; ?>><?php echo $city['name']; ?></option>
                  <?php } ?>                
                  </select>
                  
                </div>
                <div class="form-group col-md-4">
                  <label for="DOB">DOB</label>
                  <input type="text" class="form-control" id="DOB" name="DOB" placeholder="DOB" value="<?php echo $user_obj['Name']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="UserRole">User Role</label>
                  <select id="UserRole" class="form-control"  name="UserRole">
                    <?php foreach($roles as $role){ ?> 
                    <option value="<?php echo $role['name'].'_'.$role['iduserrole'];?>" <?Php echo $user_obj['idUserRole']==$role['iduserrole']?'selected':''; ?>><?php echo $role['name'];?></option>
                  <?php  } ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="gender">Gender</label>
                  <select id="gender" class="form-control"  name="Gender">
                    <option >Choose...</option>
                    <option value="Male" <?Php echo $user_obj['Gender']=='Male'?'selected':''; ?>>Male</option>
                    <option value="Female" <?Php echo $user_obj['Gender']=='Female'?'selected':''; ?> >Female</option>
                    <option value="Others" <?Php echo $user_obj['Gender']=='Others'?'selected':''; ?> >Others</option>
                  </select>
                 
                </div>
                </div>








      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block">Update Data</button>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    function validcreateform(){
      var error=0;
      if($('#dname').val()==''){
        $('#dname-error').html('please enter Display Name');
        error=1;
      }else{
        $('#dname-error').html('');
      }

      if($('#name').val()==''){
        $('#name-error').html('please enter First Name');
        error=1;
      }else{
        $('#name-error').html('');
      }
      if($('#EmailId').val()==''){
        $('#EmailId-error').html('please enter EmailId');
        error=1;
      }else{
        $('#EmailId-error').html('');
      }
      if($('#mobile').val()==''){
        $('#mobile-error').html('please enter mobile');
        error=1;
      }else{
        $('#mobile-error').html('');
      }

      if($('#Phone').val()==''){
        $('#Phone-error').html('please enter Phone');
        error=1;
      }else{
        $('#Phone-error').html('');
      }
      

      if(error){
        return false;
      }
    }
   /* if ($("#update_user").length > 0) {
      $("#update_user").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
          mobile: {
            required: true,
            
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
          mobile: {
            required: "mobile is required.",
          },
        },
      })
    }*/
  </script>
</body>
</html>