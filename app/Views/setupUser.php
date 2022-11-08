<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter 4 Add User With Validation Demo</title>
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
    <form method="post" id="add_create" name="add_create" 
    action="<?= site_url('/submitForm') ?>">
     <div class="row">
      <div class="form-group col-md-4">
                  <label for="dname">Display Name</label>
                  <input type="text" class="form-control" id="dname" name="DisplayName" placeholder="Display Name">
                </div>
                <div class="form-group col-md-4">
                  <label for="firstname">First Name</label>
                  <input type="text" class="form-control" id="firstname" name="Name"  placeholder="First Name">
                </div>
                <div class="form-group col-md-4">
                  <label for="lastName">Last Name</label>
                  <input type="text" class="form-control" id="lastName" name="SurName" placeholder="Last Name">
                </div>

                <div class="form-group col-md-4">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="EmailID" placeholder="Email">
                </div>
                <div class="form-group col-md-4">
                  <label for="pwd">Password</label>
                  <input type="password" class="form-control" id="pwd" name="Password" placeholder="Password">
                </div>
                <div class="form-group col-md-4">
                  <label for="Phone">Phone</label>
                  <input type="text" class="form-control" id="Phone" name="Phone" placeholder="Phone">
                </div>
                <div class="form-group col-md-4">
                  <label for="mobile">Mobile</label>
                  <input type="text" class="form-control" id="mobile" name="Mobile" placeholder="Mobile">
                </div>
                <div class="form-group col-md-4">
                  <label for="Address1">Address1</label>
                  <input type="text" class="form-control" id="mobile" name="Address1" placeholder="Address1">
                </div>

                <div class="form-group col-md-4">
                  <label for="Address2">Address2</label>
                  <input type="text" class="form-control" id="Address2" name="Address2" placeholder="Address2">
                </div>
                <div class="form-group col-md-4">
                  <label for="idCountry">idCountry</label>
                  <input type="text" class="form-control" id="idCountry" name="idCountry" placeholder="idCountry">
                </div>
                <div class="form-group col-md-4">
                  <label for="idState">idState</label>
                  <input type="text" class="form-control" id="idState" name="idState" placeholder="idState">
                </div>
                <div class="form-group col-md-4">
                  <label for="idCity">idCity</label>
                  <input type="text" class="form-control" id="idCity" name="idCity" placeholder="idCity">
                </div>
                <div class="form-group col-md-4">
                  <label for="DOB">DOB</label>
                  <input type="text" class="form-control" id="DOB" name="DOB" placeholder="DOB">
                </div>
                <div class="form-group col-md-4">
                  <label for="UserRole">User Role</label>
                  <select id="UserRole" class="form-control"  name="UserRole">
                    
                    <option value="Admin_1">Admin</option>
                    <option value="User_2" selected="selected">User</option>
                    
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
        <button type="submit" class="btn btn-primary btn-block ">Update Data</button>        
      </div> 
      <div class="form-group col-3 ">
        <a href="<?= site_url('/usersList') ?>" class="btn btn-outline-primary btn-block">Cancel</a>        
      </div>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#add_create").length > 0) {
      $("#add_create").validate({
        rules: {
          name: {
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
            required: "Name is required.",
          },
          EmailId: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
        },
      })
    }
  </script>
</body>
</html>