<!DOCTYPE html>
<html>
<head>
  <title>Add Roles</title>
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
    action="<?= site_url('/rolesubmitForm') ?>">
     <div class="row">
      <div class="form-group col-md-4">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
      </div>  
      <div class="form-group col-md-4">
        <label for="status">Status</label>
        <select id="status" class="form-control"  name="status">            
            <option value="0">Active</option>
            <option value="1">In Active</option>
            <option value="9">Delete</option>
          </select>
        
      </div>              
      </div>
      <div class="form-group col-3">
        <button type="submit" class="btn btn-primary btn-block">Update Data</button>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
   /* if ($("#add_create").length > 0) {
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
    }*/
  </script>
</body>
</html>