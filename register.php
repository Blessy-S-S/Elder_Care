<?php include('includes/header.php');
if(isset($_SESSION['login']))
{
    redirect("index.php","Logout to register new account");
}
?>
<?php include('includes/navbar.php'); ?>

<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card login-border shadow mt-3">
                    <div class="card-header login-head-border bg-primary">

                    <!-- MAKING SOME CHANGES -->
                        <h2 class="heading fw-bold mb-1 text-center text-white">APPLICATION FORM</h2>
                        <br>
                    </div>
                    <div class="col-md-10">
                <h4 class="main-heading fw-bold mb-1 text-center text-black">DETAILS OF INTRODUCER</h4>
               
                
                <br><br>
            </div>
          
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="">First Name</label>
                                        <input type="text" onblur="userCheck()" id="word" class="form-control" required name="fname">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="">Last Name</label>
                                        <input type="text" onblur="lastnameCheck()" id="lastname" class="form-control"  required name="lname">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="">Phone</label>
                                        <input type="number" onblur="PhoneNumvalidate()" id="mobilenumber" class="form-control" required name="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="">Email address</label>
                                        <input type="email" onblur="mailCheck()" id="email" required class="form-control" name="email">
                                    </div>
                                </div>
                                
                               
                                <div class="form-group mb-3">
                                <div class="col-md-6">
                                <label for="relation">Relationship with inmate</label>
                                <input type="text" onblur="relationCheck()" id="relationship" class="form-control"  name="relation">
                                </div>
                               
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
                                        <input type="text" onblur="firstnameCheck()" id="firstname" class="form-control" required name="finame">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="">Last Name</label>
                                        <input type="text" onblur="secondnameCheck()" id="secondname" class="form-control"  required name="laname">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="">Choose Gender</label>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="Male" id="male">
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="Female" id="female">
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="">Date of Birth</label>
                                        <input  type="date" class="form-control"  required name="age">
                                    </div>
                                </div>
                                
                                    <div class="form-group mb-3">
                                        <label class="">Hobbies</label>
                                        <input type="text" onblur="hobbiesCheck()" id="hobbies" class="form-control"  required name="hobbies">
                                    </div>
                                </div>
                                
                                    <div class="form-group mb-3">
                                        <label class="">Medical Condition </label>
                                        <input type="text" class="form-control"  required name="medicine">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="">Health Condition</label>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="health" value="bedridden" id="bedridden">
                                        <label class="form-check-label" for="bedridden">
                                            Bedridden
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="health" value="normal" id="normal">
                                        <label class="form-check-label" for="normal">
                                            Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="health" value="help" id="help">
                                        <label class="form-check-label" for="help">
                                            Can walk with help
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group mb-3">
                                        <label class="">Name of Consulting doctor and Hospital</label>
                                        <input type="text" required class="form-control" name="doctor">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group mb-3">
                                        <label class="">Password</label>
                                        <input type="password" required class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group mb-3">
                                        <label class="">Confirm Password</label>
                                        <input type="password" required class="form-control" name="cpassword">
                                    </div>
                                </div>
                               
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" name="reg_btn" class="btn btn-primary px-5">Register</button>
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include('includes/footer.php') ?>