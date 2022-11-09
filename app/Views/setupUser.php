<!DOCTYPE html>
<html>
<head>
  <title>SIRI</title>
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
  <div class="m-5 mt-5">
    <form method="post" id="add_create" name="add_create" action="<?= site_url('/submitForm') ?>" onsubmit="return validcreateform();">
     <div class="row">
      <div class="form-group col-md-4">
                  <label for="dname">Display Name</label>
                  <input type="text" class="form-control" id="dname" name="DisplayName" placeholder="Display Name">
                  <span id="dname-error" class="error"></span>
                </div>
                <div class="form-group col-md-4">
                  <label for="name">First Name</label>
                  <input type="text" class="form-control" id="name" name="Name"  placeholder="First Name">
                  <span id="name-error" class="error"></span>
                </div>
                <div class="form-group col-md-4">
                  <label for="lastName">Last Name</label>
                  <input type="text" class="form-control" id="lastName" name="SurName" placeholder="Last Name">
                  <span id="lastName-error" class="error"></span>
                </div>

                <div class="form-group col-md-4">
                  <label for="EmailId">Email</label>
                  <input type="email" class="form-control" id="EmailId" name="EmailID" placeholder="Email">
                  <span id="EmailId-error" class="error"></span>
                </div>
                <div class="form-group col-md-4">
                  <label for="pwd">Password</label>
                  <input type="password" class="form-control" id="pwd" name="Password" placeholder="Password">
                  <span id="pwd-error" class="error"></span>
                </div>
                <div class="form-group col-md-4">
                  <label for="cpwd">Confirm Password</label>
                  <input type="password" class="form-control" id="cpwd" name="cpwd" placeholder=" Confirm Password">
                  <span id="cpwd-error" class="error"></span>
                </div>
                <div class="form-group col-md-4">
                  <label for="Phone">Phone</label>
                  <input type="text" class="form-control numbersonly" id="Phone" name="Phone" placeholder="Phone">
                  <span id="Phone-error" class="error"></span>
                </div>
                <div class="form-group col-md-4">
                  <label for="mobile">Mobile</label>
                  <input type="text" class="form-control numbersonly" id="mobile" name="Mobile" placeholder="Mobile">
                  <span id="mobile-error" class="error"></span>
                </div>
                <div class="form-group col-md-4">
                  <label for="Address1">Address1</label>
                  <input type="text" class="form-control" id="Address1" name="Address1" placeholder="Address1">
                  <span id="Address1-error" class="error"></span>
                </div>

                <div class="form-group col-md-4">
                  <label for="Address2">Address2</label>
                  <input type="text" class="form-control" id="Address2" name="Address2" placeholder="Address2">
                  <span id="Address2-error" class="error"></span>
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
                    <option value="<?php echo $state['id']; ?>"><?php echo $state['name']; ?></option>
                  <?php } ?>
                                        
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="idCity">idCity</label>
                  <select id="idCity" class="form-control"  name="idCity">                  
                    <option value="1">Amaravati</option>
                                       
                  </select>
                  
                </div>
                <div class="form-group col-md-4">
                  <label for="DOB">DOB</label>
                  <input type="text" class="form-control" id="DOB" name="DOB" placeholder="DOB">
                </div>
                <div class="form-group col-md-4">
                  <label for="UserRole">User Role</label>
                  <select id="UserRole" class="form-control"  name="UserRole">
                    <?php foreach($roles as $role){ ?> 
                    <option value="<?php echo $role['name'].'_'.$role['iduserrole'];?>"><?php echo $role['name'];?></option>
                  <?php  } ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="gender">Gender</label>
                  <select id="gender" class="form-control"  name="Gender">
                    <option selected>Choose...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                  </select>
                 
                </div>
                </div>
                <div class="row">
      <div class="form-group col-3 ">
        <button type="submit" class="btn btn-primary btn-block ">Save</button>        
      </div> 
      <div class="form-group col-3 ">
        <a href="<?= site_url('/usersList') ?>" class="btn btn-outline-primary btn-block">Cancel</a>        
      </div>
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
      if($('#pwd').val()==''){
        $('#pwd-error').html('please enter password');
        error=1;
      }else{
        $('#pwd-error').html('');
      } 
      if($('#pwd').val()==$('#cpwd').val()){
        $('#pwd-error').html('password and confirm password must be same');
        error=1;
      }else{
        $('#pwd-error').html('');
      }

      if(error){
        return false;
      }
    }

$(".numbersonly").bind("keypress", function (e) {
    e = (e) ? e : window.event;
    var charCode = (e.which) ? e.which : e.keyCode;    
    if (charCode != 8 && charCode != 0 && (charCode < 48 || charCode > 57)) {
      return false;
    }
  });

       


/*
    // if ($("#add_create").length > 0) {
      $("#add_create").validate({
        rules: {
          name: {
            required: true,
          },
          dname: {
            required: true,
          },
          EmailId: {
            required: true,
            maxlength: 60,
            email: true,
          },
        },
        messages: {
          name: {
            required: true,
          },
          dname: {
            required: "Name is required.",
          },
          EmailId: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
        },
      })
    // }*/

  

function statechange(v){
  //alert('<?php echo base_url()."/citiesByState/"; ?>'+v.value);
  $.ajax({
    url: "<?php echo base_url().'/citiesByState/'; ?>"+v.value,
    method: "GET",
    success: function(result){

        $("#idCity").html(result);
      }
  });
}

  </script>
</body>
</html>