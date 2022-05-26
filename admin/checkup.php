<?php 

include('includes/header.php') 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            <?php
             if(isset($_SESSION['status']))
             {
                 //echo "<h4>" .$_SESSION['status'] ."</h4>";
                 //unset($_SESSION['status']);
             }
            ?>
                <div class="card">
                    <div class="card-header">
                        <h4> Weekly checkup details  </h4>
                    </div>
                    <div class="card-body">

                    <form action="code.php" method="POST">
                        
                        <div class="form-group">
                            <label for="">Blood Pressure</label>
                            <input type="text" onblur="checkupValidate()" id="checkup" class="form-control" required name="bp"  >
                        </div>
                        <div class="form-group">
                            <label for="">Blood Sugar</label>
                            <input type="text" onblur="checkupValidate()" id="checkup" class="form-control" required name="sugar"  >
                        </div>
                        <div class="form-group">
                            <label for="">Cholesterol screening</label>
                            <input type="text" onblur="checkupValidate()" id="checkup" class="form-control" required name="chol" >
                        </div>
                        <div class="form-group">
                            <label for="">Weekly update about health Condition</label>
                            <input type="text" name="review" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">Medicines Prescribed</label>
                            <input type="text" name="pres" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Name of the Consulted doctor</label>
                            <input type="text" name="cons" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="save_data-btn">SAVE DATA</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php include('includes/footer.php') ?> 
  </body>
</html>