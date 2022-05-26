<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php include('includes/banner.php'); ?>

<?php
    if(isset($_SESSION['login']))
    {
        ?>
            <section class="section">
                <div class="container">
          
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card-box myprofile mt-3">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h4 class="main-heading"> Profile</h4>
                                        <div class="underline mb-0"></div>
                                        <hr class="my-0">
                                    </div>

                                    <?php 
                                        $uid = $_SESSION['auth']['auth_id'];
                                        $userquery = "SELECT * FROM users where id='$uid' LIMIT 1";
                                        $userquery_run = mysqli_query($con, $userquery); 
                                        $data = mysqli_fetch_array($userquery_run);
                                        
                                        if(mysqli_num_rows($userquery_run) > 0)
                                        {
                                            ?>
                                            <form action="code.php" method="POST">
                                            <div class="col-md-10">
                <h4 class="main-heading fw-bold mb-1 text-center text-black">DETAILS OF INTRODUCER</h4>
               
                
                <br><br>
            </div>
          
                   
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="">First Name</label>
                                        <input type="text" class="form-control alphaonly"  value="<?= $data['fname']; ?>"required name="fname">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="">Last Name</label>
                                        <input type="text" class="form-control alphaonly"  value="<?= $data['lname']; ?>" required name="lname">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="">Phone</label>
                                        <input type="number" onblur="PhoneNumvalidate()" id="mobilenumber" class="form-control" value="<?= $data['phone']; ?>" required name="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                       
                                    </div>
                                </div>
                                
                               
                                <div class="form-group mb-3">
                                <div class="col-md-6">
                                <label for="relation">Relationship with inmate</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder=""  value="<?= $data['relation']; ?>"name="relation">
                                </div>
                                <br><br>
                                <div class="form-group mb-3">
                                <div class="col-md-6">
                                
                                </div>
                                <br><br>

 <!-- INMATE DETAILS -->

                                 <div class="col-md-10">
                                <h4 class="main-heading fw-bold mb-1 text-center text-black">DETAILS OF INMATE</h4>
                                <br><br>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="">First Name</label>
                                        <input type="text" class="form-control alphaonly"  value="<?= $data['finame']; ?>"required name="finame">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="">Last Name</label>
                                        <input type="text" class="form-control alphaonly"   value="<?= $data['laname']; ?>"required name="laname">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                <div class="col-md-6 mb-3">
                                    <label class="">Choose Gender</label>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender"<?= $data['gender'] == "Male"?'checked':''; ?> value="Male" id="male">
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                </div>

                                
                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender"<?= $data['gender'] == "Female"?'checked':''; ?> value="Female" id="female">
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                        <label class="">Age</label>
                                        <input type="text" class="form-control"   value="<?= $data['age']; ?>"required name="age">
                                    </div>
                                </div>
                                
                                    <div class="form-group mb-3">
                                        <label class="">Hobbies</label>
                                        <input type="text" class="form-control"   value="<?= $data['hobbies']; ?>"required name="hobbies">
                                    </div>
                                </div>
                                
                                    <div class="form-group mb-3">
                                        <label class="">Medical Condition</label>
                                        <input type="text" class="form-control "  value="<?= $data['medicine']; ?>" required name="medicine">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="">Health Condition</label>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="health"<?= $data['health'] == "bedridden"?'checked':''; ?>  value="bedridden" id="bedridden">
                                        <label class="form-check-label" for="bedridden">
                                            Bedridden
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="health"<?= $data['health'] == "normal"?'checked':''; ?>  value="normal" id="normal">
                                        <label class="form-check-label" for="normal">
                                            Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="health"<?= $data['health'] == "help"?'checked':''; ?>  value="help" id="help">
                                        <label class="form-check-label" for="help">
                                            Can walk with help
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group mb-3">
                                        <label class="">Name of Consulting doctor and Hospital</label>
                                        <input type="text" required class="form-control" value="<?= $data['doctor']; ?>" name="doctor">
                                    </div>
                                </div>
                                                    <div class="col-md-6 my-auto">
                                                        <div class="text-end">
                                                            <button type="submit" name="update_profile_btn" class="btn btn-primary mt-2">Update Profile</button>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                    <?php }else{ ?>
                                        <h4>Something Went Wrong</h4>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
    }
    else
    {
        redirect("login.php","Login to access profile page");
    }
?>

<?php include('includes/footer.php'); ?>
