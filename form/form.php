<?php
include("developers.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 <div class="row">
   <div class="col-sm-4">
    <h3 class="text-primary"> HTML Form to Insert Data</h3>
    <p><?php echo !empty($result)? $result:''; ?></p>
       <!--=================HTML Form=======================-->
      <form method="post" action="table.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Full Name" name="fullName">
       </div>
     
     <div class="form-group">
       <div class="form-check-inline">
         <input type="radio" class="form-check-input" name="gender" value="male">Male
       </div>
      <div class="form-check-inline">
        <input type="radio" class="form-check-input" name="gender" value="female">Female
     </div> 
     </div>

        <div class="form-group">
          <input type="email" class="form-control" placeholder="Email Address" name="email">
       </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Mobile Number" name="mobile">
       </div>

        <div class="form-group">
       
       <textarea class="form-control" name="address" placeholder="Address"></textarea>

       </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="City" name="city">
       </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="State" name="state">
       </div>
 
  <button type="submit"  name="save" class="btn btn-primary">Save</button>
  </form>
    <!--======================== HTML Form============================ -->
   </div>
   <div class="col-sm-8">
   
   </div>
   </div>
</div>
</body>
</html>