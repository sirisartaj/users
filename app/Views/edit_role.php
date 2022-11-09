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
    action="<?= site_url('/roleupdate') ?>">
      <input type="hidden" name="iduserrole" id="id" value="<?php echo $role_obj['iduserrole']; ?>">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $role_obj['name']; ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="status">Status</label>
        <select id="status" class="form-control"  name="status">            
            <option value="0" <?php echo $role_obj['status']=='0'?'selected':'';?>>Active</option>
            <option value="1" <?php echo $role_obj['status']=='1'?'selected':'';?>>In Active</option>
            <option value="9" <?php echo $role_obj['status']=='9'?'selected':'';?>>Delete</option>
          </select>
        
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block">Update</button>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#update_user").length > 0) {
      $("#update_user").validate({
        rules: {
          name: {
            required: true,
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          
        },
      })
    }
  </script>
</body>
</html>