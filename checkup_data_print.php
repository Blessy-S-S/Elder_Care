<?php
include 'config/dbcon.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Elder Care</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
</head>
<body>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Checkup data</h2>
      <table class="table table-bordered print">
      <thead>
       <tr>
        <th>Token Number</th>
        <th>Name </th>
        <th>Blood Pressure </th>
        <th>Blood Sugar</th>
        <th>Cholesterol</th>
        <th>Review</th>
        <th>Consulted Doctor</th>
        <th>Date</th>
        </tr>
        </thead>
        <tbody>

        <?php
          session_start();
          $uid = $_SESSION['auth']['auth_id'];
          $id = $_GET['id'];
          $user_qry = "SELECT c.id,c.user_id,u.finame,c.bp,c.sugar,c.chol,c.review,c.cons,c.created_at FROM checkup c,users u where u.id='$uid' && c.user_id='$uid' && c.id='$id'";




          $user_res=mysqli_query($con,$user_qry);
          while($user_data=mysqli_fetch_assoc($user_res))
          {
          ?>
         
            <tr>
            
            <td><?php echo $user_data['id']; ?></td>
            <td><?php echo $user_data['finame']; ?></td>
            <td><?php echo $user_data['bp']; ?></td>
            <td><?php echo $user_data['sugar']; ?></td>
            <td><?php echo $user_data['chol']; ?></td>
            <td><?php echo $user_data['review']; ?></td>
            <td><?php echo $user_data['cons']; ?></td>
            <td><?php echo $user_data['created_at']; ?></td>
            
            
          </tr>
          <?php
            
            
          }
          ?>
          
        </tbody>
      </table>

      <div class="text-center">
        <button onclick="window.print();"  value="<?= $user_data['$id']; ?>" class="btn btn-primary" id="print-btn">Print</button>
       &nbsp; &nbsp; &nbsp; <a href="checkup_data.php" class="btn btn-primary btn-sm">Back</a>

      </div>
     

    </div>
  </div>
</div>

</body>
</html>
