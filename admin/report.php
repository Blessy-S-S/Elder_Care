<?php include('includes/header.php') ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="pl-3 pt-3">
                    <div class="card-header">
                    <h4 class="heading">Monthly Report</h4>
                    <hr>
                </div>
                <div class="card-body">
                    <form action=" " method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>From Date </label>
                                    <input type="date" name="checkin" class="form-control"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>To Date </label>
                                    <input type="date" name="checkout" class="form-control"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Click to filter</label><br>
                                   <button type="submit" class="btn btn-primary"> Filter </filter>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
                    <div class="card mt-4">
                        <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    
                                    <th> User ID</th>
                                    <th>price</th>
                                    <th>payment Mode</th>
                                </tr>
                                </thead>

                                <tbody>
                                    

                           <?php
                           $con = mysqli_connect("localhost","root","","elder");

                           if(isset($_GET['checkin']) && isset($_GET['checkout']))
                           {
                               $checkin = $_GET['checkin'];
                                $checkout = $_GET['checkout'];

                                $uid = 
                                $query = "SELECT * FROM bookings  where created_at BETWEEN '$checkin' AND '$checkout' ";
                                $query_run = mysqli_query($con,$query );

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                   foreach($query_run as $row)
                                   {
                                       //echo $row['room_id']; 
                                       ?>
                                        <tr>
                                    <td><?= $row['id']; ?></td>
                                    
                                    <td><?= $row['user_id']; ?></td>
                                    <td><?= $row['price']; ?></td>
                                    <td><?= $row['payment_mode']; ?></td>
                                    </tr>
                                       <?php
                                   }
                                }
                                else
                                {
                                   echo "No Record found";
                                }


                           }
                           
                           ?>
                          
                                 </tbody>
</table>
                        </div>

                    </div>       

                    </div>
                </div>
            </div>
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php include('includes/footer.php') ?>
