<?php
session_start();
include('config/dbcon.php');

// User login code
if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "SELECT * FROM users where email='$email' AND password='$password' LIMIT 1";
    $query_run = mysqli_query($con, $query); 
    foreach($query_run as $row)
    {
        $user_id = $row['id'];
        $fname = $row['fname'];
        $lname = $row['lname'];
    }
    $check_row = mysqli_num_rows($query_run) > 0;
    if($check_row)
    {
        if(isset($_SESSION['admin']) && isset($_SESSION['adminlogin']))
        {
            unset($_SESSION['admin']);
            unset($_SESSION['adminlogin']);
        }
        $_SESSION['auth'] = [
            'auth_id' => $user_id,
            'email' => $email,
            'fname' => $fname,
            'lname' => $lname,
        ];
        $_SESSION['login'] = "true";
        $_SESSION['status'] = "Logged In Successfully";
        header('location: index.php');
    }
    else
    {
        $_SESSION['status'] = "Invalid credentials";
        header('location: login.php');
    }
}

// User register code


if(isset($_POST['reg_btn']))
{

    $dob = $_POST['age'];
    $diff = (date('Y') - date('Y', strtotime($dob)));
    

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $relation = $_POST['relation'];
    

    $finame= $_POST['finame'];
    $laname = $_POST['laname'];
    $age = $diff;
    $hobbies = $_POST['hobbies'];
    $medicine = $_POST['medicine'];
    $health = $_POST['health'];
    $doctor = $_POST['doctor'];

    
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $verify_token = md5(rand());

    $check_email = "SELECT * FROM users where email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email); 

    if(mysqli_num_rows($check_email_run) > 0)
    {
        redirect("register.php","Email already registered");
    }
    else
    {
        if($password != $cpassword)
        {
            $_SESSION['status'] = "Passords do not match";
            header('location: register.php');
        }
        else
        {
            $query = "INSERT INTO users (fname,lname,phone,gender,email,relation,finame,laname,age,hobbies,medicine,health,doctor,password,verify_token) 
            VALUES ('$fname','$lname','$phone','$gender','$email','$relation','$finame','$laname','$age','$hobbies','$medicine','$health','$doctor','$password','$verify_token')"; 
            $query_run = mysqli_query($con, $query);

            if($query_run)
            {
                $_SESSION['status'] = "You have registered Successfully";
                header('location: login.php');
            } 
            else{
                echo "Something went wrong";
            }
        }
    }
}

// Confirm room booking
if(isset($_POST['confirm_book_btn']))
{
    if($_POST['confirm_book_btn'] == "1")
    {
        $paymentmode = "Cash";
    }
    else if($_POST['confirm_book_btn'] == "2")
    {
        $paymentmode = "Online Payment";
    }
    $roomid = $_POST['bookroomid'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $userid = $_SESSION['auth']['auth_id'];
    $roomprice = $_POST['totalprice'];
    if(isset($_SESSION['login']))
    {
        $userid = $_SESSION['auth']['auth_id'];
    }
    else
    {
        redirect("login.php","Login to continue your booking");
        exit(0);
    }

    $chk_aval ="SELECT room_id FROM bookings WHERE room_id='$roomid'AND( 
    (checkin <= '$checkin' AND checkout >='$checkout') OR 
    (checkin >= '$checkin' AND checkin <='$checkout') OR 
    (checkin <= '$checkin' AND checkout >='$checkin')  )";


    $chk_aval_run = mysqli_query($con, $chk_aval);

    $roomqty_query = "SELECT * FROM rooms WHERE id='$roomid' LIMIT 1";
    $roomqty_query_run = mysqli_query($con, $roomqty_query);
    $omrow = mysqli_fetch_array($roomqty_query_run);
    $roomqty = $omrow['room_qty'];

    if(mysqli_num_rows($chk_aval_run) < $roomqty)
    {

        $check_user = "SELECT * FROM bookings where user_id='$userid' LIMIT 1";
        $check_user_run = mysqli_query($con, $check_user); 
    
        if(mysqli_num_rows($check_user_run) > 0)
        {
            redirect("bookings.php","You have already booked");
        }

        $conf_book_query = "INSERT INTO bookings (room_id, user_id, checkin, checkout, price, payment_mode)
        VALUES ('$roomid','$userid','$checkin','$checkout','$roomprice','$paymentmode')";

        $conf_book_query_run = mysqli_query($con, $conf_book_query);



        


        
        if($conf_book_query_run)
        {
            redirect("bookings.php","Your room has been successfully booked");
        }
        else{
            redirect("index.php","Something went Wrong!");
        }       
    }
    else
    {
        redirect("index.php","Something went Wrong!");
    }
}


// Update User Profile
if(isset($_POST['update_profile_btn']))
{
    $uid = $_SESSION['auth']['auth_id']; 
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $relation = $_POST['relation'];
   

    $finame= $_POST['finame'];
    $laname = $_POST['laname'];
    $hobbies = $_POST['hobbies'];
    $medicine = $_POST['medicine'];

    $update_query = "UPDATE users SET fname='$fname', lname='$lname', phone='$phone', gender='$gender', relation='$relation',  finame='$finame', laname='$laname', hobbies='$hobbies', medicine='$medicine' WHERE id='$uid' ";
    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        redirect("profile.php","Profile Updated Successfully");
    } 
    else{
        redirect("profile.php","Something went Wrong");
    }
}

//Medicine intake

if(isset($_POST['submit_medicine_btn']))
{
    $userid = $_SESSION['auth']['auth_id'];

    $monmor = $_POST['monmor'];
    $monnoon = $_POST['monnoon'];
    $monnight = $_POST['monnight'];

    $tuemor = $_POST['tuemor'];
    $tuenoon = $_POST['tuenoon'];
    $tuenight = $_POST['tuenight'];

    $wedmor = $_POST['wedmor'];
    $wednoon = $_POST['wednoon'];
    $wednight = $_POST['wednight'];

    $thumor = $_POST['thumor'];
    $thunoon = $_POST['thunoon'];
    $thunight = $_POST['thunight'];

    $frimor = $_POST['frimor'];
    $frinoon = $_POST['frinoon'];
    $frinight = $_POST['frinight'];

    $satmor = $_POST['satmor'];
    $satnoon = $_POST['satnoon'];
    $satnight = $_POST['satnight'];

    $sunmor = $_POST['sunmor'];
    $sunnoon = $_POST['sunnoon'];
    $sunnight = $_POST['sunnight'];

    

    

    $quer = "INSERT INTO medicine (uid,monmor,monnoon,monnight,tuemor,tuenoon,tuenight,wedmor,wednoon,wednight,thumor,thunoon,thunight,frimor,frinoon,frinight,satmor,satnoon,satnight,sunmor,sunnoon,sunnight)
     VALUES ('$userid','$monmor' ,'$monnoon' ,'$monnight','$tuemor' ,'$tuenoon' ,'$tuenight', '$wedmor' ,'$wednoon' ,'$wednight' ,'$thumor' ,'$thunoon' ,'$thunight' ,'$frimor' ,'$frinoon' , '$frinight' ,'$satmor' ,'$satnoon' ,'$satnight' ,'$sunmor' ,'$sunnoon' ,'$sunnight')";
    $query_run = mysqli_query($con, $quer);

    if($query_run)
    {
        redirect("medicine.php","Successfully inserted");
       
    }
    else
    {
        redirect("medicine.php","insertion failed"); 
    }

}




?>

