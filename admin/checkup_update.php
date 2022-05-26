<?php include('includes/header.php') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="pl-3 pt-3">
                    <h4 class="heading">All Inmates</h4>
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Guardian name</th>
                                    
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","elder");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM users WHERE CONCAT(finame) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);
                                        

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                $_SESSION['nid']=$items['id'];
                                                ?>
                                                <tr>
                                                    <td><?= $items['id']; ?></td>
                                                    <td><?= $items['finame']; ?> <?= $items['laname']; ?></td>
                                                    <td><?= $items['fname']; ?> <?= $items['lname']; ?></td>
                                                    
                                                    <td>
                                                    <a href="checkup.php?id=<?= $items['id']; ?>" class="btn btn-primary btn-sm">Add details</a>
                                                    </td>
                                                </tr>
                                                
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
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





                
