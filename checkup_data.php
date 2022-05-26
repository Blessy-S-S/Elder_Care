<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php include('includes/banner.php'); ?>
<?php
session_abort();
?>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="main-heading">Weekly Checkup Details  </h4>
                    </div>
                    <table class="table table-bordered print" >
      <thead>
       <tr>
        <th>Token Number </th>
        <th>Name </th>
        <th>Blood pressure </th>
        <th>Blood Sugar</th>
        <th>Cholesterol</th>
        <th>Review</th>
        <th>Consulted Doctor</th>
        <th>Date</th>
        <th>Action</th>
        
        </tr>
        </thead>
        <tbody>
          <?php
         session_start();
          $uid = $_SESSION['auth']['auth_id'];
          
         
$user_qry = "SELECT c.id,c.bp,c.sugar,c.chol,c.review,c.cons,c.created_at,u.finame FROM checkup c,users u where u.id='$uid' AND c.user_id='$uid' ";


          $user_res=mysqli_query($con,$user_qry);
          while($user_data=mysqli_fetch_assoc($user_res))
          {
          ?>
         
            <tr>
            <td><?= $user_data['id']; ?></td>
            <td><?php echo $user_data['finame']; ?></td>
            
            <td><?= $user_data['bp']; ?></td>
            <td><?= $user_data['sugar']; ?></td>
            <td><?= $user_data['chol']; ?></td>
            <td><?= $user_data['review']; ?></td>
            <td><?= $user_data['cons']; ?></td>
            <td> <?= date("d-m-Y h:i A", strtotime($user_data['created_at'])); ?></td>
            <td>
            <a href="checkup_data_print.php?id=<?php echo $user_data['id']; ?>"  class="btn btn-primary">View</a>
            </td>
            
           
          </tr>
          <?php

          }
          ?>
          
        </tbody>
      </table>

      
    </div>
  </div>
</div>
