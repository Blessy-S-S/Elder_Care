<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php include('includes/banner.php'); ?>


<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="main-heading">My Bookings</h4>
                <div class="underline mb-0"></div>
                <hr class="my-0">
            </div>
        </div>

        <div class="row justify-content-center">
                    <?php
                        if(isset($_SESSION['login']))
                        {
                            $uid = $_SESSION['auth']['auth_id'];
                            $today = date("Y-m-d");
                            $all_bookings_query = " SELECT * FROM bookings WHERE user_id='$uid' ";
                            $all_bookings_query_run =  mysqli_query($con, $all_bookings_query);

                            
                            if(mysqli_num_rows($all_bookings_query_run) > 0)
                            {
                                $new_bookings_query = " SELECT  b.checkin,b.checkout,b.price, b.created_at, r.id, r.room_name  FROM bookings b, rooms r WHERE b.user_id='$uid' AND b.room_id= r.id AND b.checkin >= '$today' ";
                                $new_bookings_query_run = mysqli_query($con, $new_bookings_query);
                                if(mysqli_num_rows($new_bookings_query_run) > 0)
                                {
                                    ?>  
                                        <div class="col-md-12 mt-4">
                                            <div class="card">
                                                
                                                <div class="card-body">
                                                    <table class="myTable table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Room</th>
                                                                <th>Joining Date</th>
                                                                <th>Duration</th>
                                                                <th>Price</th>
                                                                <th>Booked on</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        foreach($new_bookings_query_run as $newroom)
                                                        {
                                                            ?>  
                                                                <tr>
                                                                    <td><?= $newroom['room_name']; ?></td>
                                                                    <td> <?= date("d-m-Y", strtotime($newroom['checkin'])); ?></td>
                                                                    <td> <?= date("d-m-Y", strtotime($newroom['checkout'])); ?></td>
                                                                    <td><?= $newroom['price']; ?></td>
                                                                    <td> <?= date("d-m-Y h:i A", strtotime($newroom['created_at'])); ?></td>
                                                                </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <a href="booking_data_print.php" class="btn btn-primary">Print</a>
                                        </div>

                                    <?php
                                }


                            }
                            else
                            {
                                ?>
                                
                                        <div class="col-md-6 text-center">
                                            <div class="card shadow-sm">
                                                <div class="card-body">
                                                    <h2 class="heading">You have not Made Any Bookings</h2>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                            }
                        }
                        else
                        {
                            redirect("login.php","Login to view your bookings");
                        }
                    ?>

        </div>    
    </div>
</section>

<?php include('includes/footer.php'); ?>

