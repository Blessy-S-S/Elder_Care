<?php include('includes/header.php'); ?>




            <section class="section">
                <div class="container">
          
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card-box myprofile mt-3">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h4 class="main-heading"> Profile view </h4>
                                        <div class="underline mb-0"></div>
                                        <hr class="my-0">
                                    </div>
                                    
                                    <?php 
                                   
                                    $nid = $_GET['id'];
                                $all_users = "SELECT * FROM users where id='$nid'"; 
                                $all_users_run = mysqli_query($con, $all_users);
                                
                                if(mysqli_num_rows($all_users_run) > 0):
                                    foreach($all_users_run as $row)
                                    {
                                        $_SESSION['nid']=$row['id'];
                                    ?>

                                    <div class="col-md-6">
                                    <div class="form-group mb-3">
                                    <label class=""><b>ID of inmate  :</b> <?= $row['id']; ?>  </label> 
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group mb-3">
                                    <label class=""> <b>Name of inmate  :</b> <?= $row['finame']; ?> <?= $row['laname']; ?> </label> 
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group mb-3">
                                    <label class=""><b> Age : </b> <?= $row['age']; ?></label> 
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group mb-3">
                                    <label class=""><b>Gender :</b> <?= $row['gender']; ?></label> 
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group mb-3">
                                    <label class=""><b> Hobbies :</b> <?= $row['hobbies']; ?></label> 
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group mb-3">
                                    <label class=""><b>Consulting Doctor :</b> <?= $row['doctor']; ?></label> 
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group mb-3">
                                    <label class=""><b>Medical condition :</b> <?= $row['medicine']; ?></label> 
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group mb-3">
                                    <label class=""><b> Health Condition :</b> <?= $row['health']; ?> </label> 
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group mb-3">
                                    <label class=""><b>Name of guardian :</b> <?= $row['fname']; ?><?= $row['lname']; ?> </label> 
                                    </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                    <div class="form-group mb-3">
                                    <label class=""><b>Relation with the inmate :</b> <?= $row['relation']; ?></label> 
                                    </div>
                                    </div>
                                    


                            
                            <button onclick="window.print();" class="btn btn-primary btn-sm" id="print-btn">Download </button>
                            
                            <a href="users.php" class="btn btn-primary btn-sm">Back</a>
                            
                             
                            <?php
                                    }
                                else :
                                ?>
                                <tr class="text-center">
                                    <td colspan="9"><h1>No records Found </h1></td>
                                </tr>
                                <?php endif; ?>
                                    
   


