<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php include('includes/slider.php'); ?>

<section class="py-3 bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4 class="main-heading text-white">ELDER CARE</h4>
                <div class="underline bg-white mx-auto"></div>
                <p class="text-white">
                    Get the Best Care for your elder ones.
                </p>
            </div>
            
        </div>
    </div>
</section>


<!-- SERVICES -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="main-heading">Our Features</h4>
                <div class="underline mb-0"></div>
                <hr class="my-0">
            </div>
<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-6 col-sm-6 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="service">
              <a href="#" class="d-block"><img src="uploads/nurse.jfif" alt="Image" class="img-fluid"></a>
              <div class="service-inner">
              <h5><b>24X7 NURSING STAFF</b></h5>
                <p></p>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="service">
              <a href="#" class="d-block"><img src="uploads/food.jpeg" alt="Image" class="img-fluid"></a>
              <div class="service-inner">
              <h5><b>EXCELLENT CUISINE</b></h5>
                <p></p>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="service">
              <a href="#" class="d-block"><img src="uploads/skill3.jfif" alt="Image" class="img-fluid"></a>
              <div class="service-inner">
              <h5><b>SKILL DEVELOPMENT</b></h5>
                <p></p>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="service">
              <a href="#" class="d-block"><img src="uploads/phy1.png" alt="Image" class="img-fluid"></a>
              <div class="service-inner">
                <h5><b>PHYSICAL ACTIVITIES</b></h5>
                <p></p>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

<!-- END OF SERVICES -->

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="main-heading">Available Rooms</h4>
                <div class="underline mb-0"></div>
                <hr class="my-0">
            </div>
            
            <div class="col-md-12 mt-4">
                <div class="row">
                    <?php
                        $room_query = " SELECT * FROM rooms WHERE status='0' ";
                        $room_query_run = mysqli_query($con, $room_query);

                        if(mysqli_num_rows($room_query_run) > 0)
                        {
                            foreach($room_query_run as $room)
                            {
                                ?>
                                    <div class="col-md-4">
                                        <a href="view.php?room=<?= $room['id']; ?>" class="text-decoration-none">
                                            <div class="card-box">
                                                <div class="roomimage">
                                                    <img src="uploads/<?= $room['room_image']; ?>" class="" alt="<?= $room['room_name'] ?>">
                                                </div>
                                                <div class="card-box-body">
                                                    <h4 class="card-heading"><?= $room['room_name']; ?>
                                                        <button class="btn btn-sm btn-primary float-end text-white">₹<?= $room['price']; ?></button>
                                                    </h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                                <h2 class="heading">No rooms found</h2>
                            <?php
                        }
                    ?>

                </div>
            </div>
        </div>    
    </div>
</section>


<section class="section bg-lightgray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-3 text-center">
                <h4 class="main-heading">Our Testimonials</h4>
                <div class="underline mx-auto"></div>
                <p>
                    What people tell about our home
                </p>
            </div>

            <div class="col-md-8">
                    <div class="owl-carousel testimonials owl-theme">

                        <div class="item text-center">
                            <div class="testi-card">
                                <div class="testi-content">
                                    <p>
                                        <i class="left-q-icon text-white fa fa-quote-left "> </i>
                                       I loved their services. Best place to leave your elder ones
                                    </p>
                                    <h5 class="testi-title">Raju</h5>
                                </div>
                            </div>
                        </div>

                        <div class="item text-center">
                            <div class="testi-card">
                                <div class="testi-content">
                                    <p>
                                        <i class="left-q-icon text-white fa fa-quote-left "> </i>
                                        It is one of the best place.
                                    </p>
                                    <h5 class="testi-title">Sahal SM</h5>
                                </div>
                            </div>
                        </div>

                        <div class="item text-center">
                            <div class="testi-card">
                                <div class="testi-content">
                                    <p>
                                        <i class="left-q-icon text-white fa fa-quote-left "> </i>
                                       The best....
                                    </p>
                                    <h5 class="testi-title">Muniraj</h5>
                                </div>
                            </div>
                        </div>
                        
                    </div>
            </div>
        </div>
    </div>
</section>


<?php include('includes/footer.php'); ?>

<script>
$(document).ready(function () {
        
    $('.testimonials').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })

});
</script>