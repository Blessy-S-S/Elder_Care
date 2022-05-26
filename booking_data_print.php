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
      <h2>Room Booking Data</h2>
      <table class="table table-bordered print">
      <thead>
       <tr>
        <th>Room</th>
        <th>User Id </th>
        <th>User Name </th>
        <th>Joining Date</th>
        <th>Duration</th>
        <th>Price</th>
        <th>Booked on</th>
        </tr>
        </thead>
        <tbody>
          <?php
          session_start();
          $uid = $_SESSION['auth']['auth_id'];
          $user_qry = "SELECT b.room_id,b.user_id,b.checkin,b.checkout,b.price,b.created_at,u.fname FROM bookings b,users u where u.id='$uid' && b.user_id='$uid' LIMIT 1";




          $user_res=mysqli_query($con,$user_qry);
          while($user_data=mysqli_fetch_assoc($user_res))
          {
          ?>
         
            <tr>
            <label><?php  ?></label>
            <td><?php echo $user_data['room_id']; ?></td>
            <td><?php echo $user_data['user_id']; ?></td>
            <td><?php echo $user_data['fname']; ?></td>
            <td> <?= date("d-m-Y", strtotime( $user_data['checkin'])); ?></td>
            <td> <?= date("d-m-Y", strtotime( $user_data['checkout'])); ?></td>
            <td><?= $user_data['price']; ?></td>
            <td> <?= date("d-m-Y h:i A", strtotime($user_data['created_at'])); ?></td>
          </tr>
          <?php
            
            
          }
          ?>
          
        </tbody>
      </table>

     
        <button onclick="window.print();" class="btn btn-primary btn-sm" id="print-btn">Print</button>
        <a href="bookings.php" class="btn btn-primary btn-sm">Back</a>
    </div>
  </div>
</div>

</body>
</html>

