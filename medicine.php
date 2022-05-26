<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php include('includes/banner.php'); ?>
<?php
session_abort();
?>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="main-heading">Medicines </h4>
                    </div>
                    <form action="code.php" method="POST">
                    <table class="table table-sm">
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
      <th scope="row">Monday</th>
      <td><input type="text" class="form-control-sm" name="monmor"> </td>
      <td><input type="text" class="form-control-sm" name="monnoon"></td>
      <td><input type="text" class="form-control-sm" name="monnight"></td>
    </tr>
    <tr>
      <th scope="row">Tuesday</th>
      <td><input type="text" class="form-control-sm" name="tuemor"> </td>
      <td><input type="text" class="form-control-sm" name="tuenoon"></td>
      <td><input type="text" class="form-control-sm" name="tuenight"></td>
    </tr>
    <tr>
      <th scope="row">Wednesday</th>
      <td><input type="text" class="form-control-sm" name="wedmor"> </td>
      <td><input type="text" class="form-control-sm" name="wednoon"></td>
      <td><input type="text" class="form-control-sm" name="wednight"></td>
    </tr>
    <tr>
      <th scope="row">Thursday</th>
      <td><input type="text" class="form-control-sm" name="thumor"> </td>
      <td><input type="text" class="form-control-sm" name="thunoon"></td>
      <td><input type="text" class="form-control-sm" name="thunight"></td>
    </tr>
    <tr>
      <th scope="row">Friday</th>
      <td><input type="text" class="form-control-sm" name="frimor"> </td>
      <td><input type="text" class="form-control-sm" name="frinoon"></td>
      <td><input type="text" class="form-control-sm" name="frinight"></td>
    </tr>
    <tr>
      <th scope="row">Saturday</th>
      <td><input type="text" class="form-control-sm" name="satmor"> </td>
      <td><input type="text" class="form-control-sm" name="satnoon"></td>
      <td><input type="text" class="form-control-sm" name="satnight"></td>
    </tr>
    <tr>
      <th scope="row">Sunday</th>
      <td><input type="text" class="form-control-sm" name="sunmor"> </td>
      <td><input type="text" class="form-control-sm" name="sunnoon"></td>
      <td><input type="text" class="form-control-sm" name="sunnight"></td>
    </tr>
    </tbody>
    </table>

<div class="form-group text-center">
    <button type="submit" class="btn btn-primary" name="submit_medicine_btn">SUBMIT</button>
 </div>






</div>
</div>
</div>
</div>
</form>
</section>
<?php include('includes/footer.php') ?> 