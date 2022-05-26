<?php include('includes/header.php'); ?>



<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2> Receipt</h2>
      <?php 
        //session_start();
                                  
            $uid =$_GET['id'];
            $all_users = "SELECT r.room_name,u.fname,u.finame,b.checkin,b.checkout,b.price,b.payment_mode,b.created_at FROM bookings b, users u,rooms r where u.id='$uid' AND b.user_id='$uid'  LIMIT 1"; 
            $all_users_run = mysqli_query($con, $all_users);
                               
            while($user_data=mysqli_fetch_assoc($all_users_run))
            {
              //$_SESSION['nid']=$user_data['id'];
            ?>
      <table border=5>
      
      <tr>
      <th> Room</th><br>
        <td><?php echo $user_data['room_name']; ?></td>
      </tr>
      <tr>
        <th>Introducer </th>
        <td><?php echo $user_data['fname']; ?></td>
      </tr>
      <tr>
        <th>Inmate </th>
        <td><?php echo $user_data['finame']; ?></td>
      </tr>
      <tr>
        <th>Joining Date</th>
        <td> <?= date("d-m-Y", strtotime( $user_data['checkin'])); ?></td>
      </tr>
      <tr>
        <th>Duration</th>
        <td> <?= date("d-m-Y", strtotime( $user_data['checkout'])); ?></td>
      </tr>
      <tr>
        <th>Price</th>
        <td><?= $user_data['price']; ?></td>
      </tr>
      <tr>
        <th>Payment Mode</th>
        <td><?= $user_data['payment_mode']; ?></td>
      </tr>
      <tr>
        <th>Booked Date</th>
        <td> <?= date("d-m-Y h:i A", strtotime($user_data['created_at'])); ?></td>
      </tr>
 

        
          <?php
          }
          ?>
         
          
        </tbody>
      </table>
      <br>
<a href="bookings.php" class="btn btn-primary btn-sm">Back</a>

      
                               
                                    
