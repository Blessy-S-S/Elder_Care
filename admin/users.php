<?php include('includes/header.php') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="pl-3 pt-3">
                    <h4 class="heading">All Users</h4>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Guardian</th>
                                    <th>Inmate name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Profile</th>
                                    <th>Status</th>
                                    <th>Ban</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $all_users = "SELECT * FROM users"; 
                                $all_users_run = mysqli_query($con, $all_users);
                                
                                if(mysqli_num_rows($all_users_run) > 0):
                                    foreach($all_users_run as $row)
                                    {
                                        $_SESSION['nid']=$row['id'];
                                    ?>
                                    <tr>
                                        <td> <?= $row['id']; ?> </td>
                                        <td> <?= $row['fname']; ?>&nbsp;<?= $row['lname']; ?> </td>
                                        <td> <?= $row['finame']; ?>&nbsp;<?= $row['laname']; ?> </td>
                                        <td> <?= $row['phone']; ?> </td>
                                        <td> <?= $row['email']; ?> </td>
                                        <td> <a href="profile_view.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">View</a>  </td>
                                        <td> <?= $row['status'] == '0'?'<span class="bg-success badge p-2">Active</span>':'<span class="bg-danger badge p-2">Banned</span>'; ?> </td>
                                        <td> 
                                            <form action="code.php" method="POST">
                                                <?php if($row['status'] == '0') :?>                                                        
                                                    <button type="submit" value="<?= $row['id']; ?>" class="btn btn-danger btn-sm" name="ban_user">Active</button>
                                                <?php  else: ?>
                                                    <button type="submit" value="<?= $row['id']; ?>" class="btn btn-success btn-sm" name="unban_user">Inactive</button>
                                                <?php  endif; ?>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                else :
                                ?>
                                <tr class="text-center">
                                    <td colspan="9"><h1>No records Found </h1></td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>



<?php include('includes/footer.php') ?>
