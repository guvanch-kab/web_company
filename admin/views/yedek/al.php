<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <script src="jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css" />
  <style>
    .form-control {
      margin: 6px 0;
    }
  </style>

</head>

<body>
  <div class="container">
    <form id="myform">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
          <input type="text" class="form-control ady" name="name[]" placeholder="name">
          <input type="password" class="form-control" name="pass[]" placeholder="password">
          <input type="number" class="form-control" name="status[]">
          <input type="submit" value="send" name="send" id="click" class=" btn btn-outline-primary">

        </div>
        <div class="col-md-3"></div>
      </div>
    </form>
    <div id="habar"></div>
  </div>
</body>

</html>
<script>
  $(document).ready(function() {
    $("#myform").submit(function(event) {
      event.preventDefault();

      $.ajax({
        url: 'check_serialize.php',
        method: 'post',
        data: $('#myform').serialize(),

        success: function(response) {
          $("#habar").html(response);
          document.getElementById('myform').reset()
        } // end success func
      }); //end ajax

    });
  });
</script>