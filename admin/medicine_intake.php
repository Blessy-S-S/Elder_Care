<?php include('includes/header.php') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="pl-3 pt-3">
                    <h4 class="heading"> Inmates Medicine Details</h4>
                    <hr>
                </div>
               

    

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                        <thead>
                      <tr>
                      <th scope="col">Days</th>
                      <th scope="col">Morning</th>
                      <th scope="col">Noon</th>
      
                       <th scope="col">Night</th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                              
                       
            <?php 
            $con = mysqli_connect("localhost","root","","elder");
            if(isset($_GET['search']))
             {
                $fname = $_GET['search'];
                $uid= "SELECT * FROM `users` WHERE finame='$fname'";
                $medicine_query_ID= mysqli_query($con, $uid);
                foreach($medicine_query_ID as $row)
                {
                    $userid= $row['id'];
                }

                $medicine_query = "SELECT * FROM `medicine` WHERE `uid` = $userid ";                                        
                $medicine_query_run= mysqli_query($con, $medicine_query);
                if(mysqli_num_rows($medicine_query_run) > 0):
                foreach($medicine_query_run as $row)
                {
                    
                
                
                ?>

      <th scope="row">Monday</th>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['monmor']; ?>'></td>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['monnoon']; ?>'></td>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['monnight']; ?>'></td>
    </tr>
    <tr>
      <th scope="row">Tuesday</th>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['tuemor']; ?>'></td>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['tuenoon']; ?>'></td>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['tuenight']; ?>'></td>
    </tr>
    <tr>
      <th scope="row">Wednesday</th>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['wedmor']; ?>'></td>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['wednoon']; ?>'></td>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['wednight']; ?>'></td>
    </tr>
    <tr>
      <th scope="row">Thursday</th>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['thumor']; ?>'></td>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['thunoon']; ?>'></td>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['thunight']; ?>'></td>
    </tr>
    <tr>
      <th scope="row">Friday</th>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['frimor']; ?>'></td>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['frinoon']; ?>'></td>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['frinight']; ?>'></td>
    </tr>
    <tr>
      <th scope="row">Saturday</th>
      <td><input type="" class="form-control-sm" value='<?php echo $row['satmor']; ?>'></td>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['satnoon']; ?>'></td>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['satnight']; ?>'></td>
    </tr>
    <tr>
      <th scope="row">Sunday</th>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['sunmor']; ?>'></td>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['sunnoon']; ?>'></td>
      <td><input type="text" class="form-control-sm" value='<?php echo $row['sunnight']; ?>'></td>
    </tr>
    </tbody>
    </table>

    <?php
                                        }
                                   else :
                                    ?>
                                    <tr class="text-center">
                                        <td colspan="9"><h1>No records Found </h1></td>
                                    </tr>
                                    <?php endif; 
                                    }?>

                           
