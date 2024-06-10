<!-- Main Slider Section Starts -->
<section class="main-slider">
    <div class="container-fluid">
        <ul class="main-slider-carousel owl-carousel owl-theme slide-nav">
            <?php
			foreach ($sliders as $key => $value) {
				$elements = json_decode($value['elements'], true);
				?>
            <li class="slider-wrapper">
                <div class="image" style="background-image: url(<?php echo base_url('uploads/frontend/slider/' . $elements['image']) ?>)" ></div>
                <div class="slider-caption <?php echo $elements['position'];  ?>">
                    <div class="container">
                        <div class="wrap-caption">
                            <h1><?php echo $value['title']; ?></h1>
                            <div class="text center"><?php echo $value['description']; ?></div>
                            <div class="link-btn">
                                <a href="<?php echo $elements['button_url1']; ?>" class="btn">
                                    <?php echo $elements['button_text1']; ?>
                                </a>
                                <a href="<?php echo $elements['button_url2']; ?>" class="btn btn1">
                                    <?php echo $elements['button_text2']; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-overlay"></div>
            </li>
            <?php } ?>
        </ul>
    </div>
</section>
<div class="container px-md-0 main-container">
    <!-- Features Section Starts -->
    <div class="notification-boxes row">
        <!-- Latest News  -->
 <!--Latest News Section -->
    
<div class="main-section" style="background:#f0f3fa">
  <div class="container">
    <!----CAMPUS NEWS SECTION----->
    <div class="event">
      <h2 class="heading">Latest News</h2>
      <div>
       <marquee id="marquee" direction="up" scrollamount="7" style="height:240px;">
          <ul>
            <li>
              <i>04-June-2024 :</i> <a href="">I PUC Admsision List for 2024 Released !viewlist </a><img src="https://rb.gy/w04epe">
            </li>
            <li>
              <i>04-June-2024: <a href="">I PUC NEET Timetable - 2024  </a></i>  <img src="https://rb.gy/w04epe">
            </li>
            <li>
              <i>04-June-2024: <a href="">I PUC Timetable - 2024 </a></i>  <img src="https://rb.gy/w04epe">
            </li>
            <li>
              <i>04-June-2024: <a href="">II PUC Timetable - 2024 </a></i>  <img src="https://rb.gy/w04epe">
            </li>
            <li>
              <i>04-June-2024: <a href="">II PUC NEET Timetable - 2024 </a></i>  <img src="https://rb.gy/w04epe">
            </li>
            <br>
          </ul>
        </marquee>
      </div>
    </div>
    <!-----CAMPUS NEWS SECTION----->
    <div class="event campus-news">
      <h2 class="heading">Upcoming Events</h2>
      <div>
        <ul>
          <li>
            <span class="campus-img">
              <img src="https://ssrpuc.sadvidya.in/uploads/frontend/about/1.png">
            </span>
            <div>
              <h2>Admissions Open</h2>
              <h6>For I PUC at Sadvidya Semi Residential PU College</h6>
              <p>Enroll now for the upcoming First Pre-University Course (I PUC) admissions at SSRPUC, Mysuru.</p>
            </div>
          </li>
          <li>
            <span class="campus-img">
              <img src="https://ssrpuc.sadvidya.in/uploads/frontend/about/2.png">
            </span>
            <div>
              <h2>Admissions Open</h2>
              <h6>For Integrated Programs at SSRPUC, Mysuru</h6>
              <p>Apply now for Integrated JEE/NEET programs at Sadvidya Semi Residential PU College and begin your journey towards a successful career in engineering or medicine.</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <!------EVENT SECTION------>
    <div class="event">
      <h2 class="heading">Notice Board</h2>
      <div>
        <ul>
          <li>
            <span class="event-date">11 <br> Feb </span> Stay updated with the latest announcements from SSRPUC, Mysuru.
          </li>
          
        </ul>
      </div>
    </div>
  </div>
</div>
<!--END -->


        <!-- Latest News  -->
    </div>
    <?php
        if (!empty($wellcome)) {
        $elements = json_decode($wellcome[ 'elements' ], true);
        ?>
    <!-- Welcome Section Starts -->
    <section class="welcome-area">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h2 class="main-heading1 lite" style="color: <?php echo $wellcome['color1'] == "" ? '#000' : $wellcome['color1']; ?>"><?php echo $wellcome['title']; ?></h2>
                <div class="sec-title style-two mb-tt">
                    <h2 class="main-heading2"><?php echo $wellcome['subtitle']; ?></h2>
                    <span class="decor"><span class="inner"></span></span>
                </div>
                <?php echo nl2br($wellcome['description']); ?>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="wel-img">
                    <img src="<?php echo base_url('uploads/frontend/home_page/' . $elements['image']); ?>" alt="image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
</div>

<!-- Teachers Section Starts -->
<?php
    if (!empty($teachers)) {
    $elements = json_decode($teachers[ 'elements' ], true);
    ?>

<?php }
if (!empty($testimonial)) {
    ?>
    
<!-- Testimonial Section Starts -->
<section class="testimonial-wrapper" >
    <div class="container px-md-0">
        <div class="sec-title text-center">
            <h2><?php echo $testimonial['title'] ?></h2>
            <p><?php echo nl2br($testimonial['description']); ?></p>
            <span class="decor"><span class="inner"></span></span>
        </div>
        <div class="testimonial-carousel owl-carousel owl-theme">
       
    <div class="item">
        <div class="card">
            <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Card Image 1">
        </div>
    </div>
    <div class="item">
        <div class="card">
            <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Card Image 2">
        </div>
    </div>
    <div class="item">
        <div class="card">
            <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Card Image 2">
        </div>
    </div>
    <div class="item">
        <div class="card">
            <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Card Image 2">
        </div>
    </div>
    <div class="item">
        <div class="card">
            <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Card Image 2">
        </div>
    </div>
    <div class="item">
        <div class="card">
            <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Card Image 2">
        </div>
    </div>
    <!-- Add more items as needed -->
</div>


        </div>
    </div>
</section>
<?php } 
    if (!empty($statistics)) {
    $statisticsElem = json_decode($statistics['elements'], true);
    ?>

<!-- Services Section Starts -->      
<div class="" style="background-image: url(<?php echo base_url('assets/frontend/images/14.png') ?>); padding: 60px 0; background-color: <?php echo $services['color2'] == "" ? '#fff' : $services['color2']; ?>;">
    <div class="container px-md-0">

     <div class="containerv">
        <div class="row">
            <div class="col-md-6">
                <!-- College Information -->
                <h2>College Virtual Tour</h2>
                <p>Welcome to our college virtual tour! Explore our campus facilities and learn more about what we have
                    to offer.</p>
                <p>Here are some key features:</p>
                <ul>
                    <li>State-of-the-art classrooms</li>
                    <li>Modern laboratories</li>
                    <li>Library and study spaces</li>
                    <li>Recreational facilities</li>
                    <li>Student accommodation</li>
                    <li>And much more...</li>
                </ul>
            </div>
            <div class="col-md-6">
                <!-- YouTube Video Embed -->
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/hSSEg6gbm04" frameborder="0"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($services)) { ?>
        
       
    <?php } 
		if (!empty($cta_box)) {
        $elements = json_decode($cta_box[ 'elements' ], true);
		?>
        <div class="book-appointment-box" style="background-color: <?php echo $cta_box['color1'] == "" ? '#464646' : $cta_box['color1']; ?>;">
            <div class="row">
                <div class="col-lg-8 col-md-12 text-center text-lg-left">
                    <h4 style="color: <?php echo $cta_box['color2'] == "" ? '#fff' : $cta_box['color2']; ?>;"><?php echo $cta_box['title']; ?></h4>
                    <h3 style="color: <?php echo $cta_box['color2'] == "" ? '#fff' : $cta_box['color2']; ?>;"><div class="inner-box"><i class="fa fa-phone"></i></div> <?php echo $elements['mobile_no']; ?></h3>
                </div>
                <div class="col-lg-4 col-md-12 text-center text-lg-left">
                    <a href="<?php echo $elements['button_url']; ?>" class="btn btn-main btn-1 text-uppercase"><?php echo $elements['button_text']; ?></a>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
<?php } ?>


<style>
    
    
    /****************EVENT SECTION*************/
.main-section {
  width: 100%;
  float: left;
  padding: 100px 0px 100px 0px;
}

.event {
  width: 100%;
  margin-bottom: 20px; /* Added margin bottom to separate events */
  background-color: #fff;
}

.event i {
  color: red;
  font-size: 14px;
}

.event div {
  padding: 10px;
}

.event .heading {
  padding: 10px;
  color: #fff;
  background: #0055a4;
  text-align: center;
  font-size: 22px;
  font-weight: 400;
  margin-bottom: 10px;
}

.event ul li {
  margin-bottom: 20px;
  list-style: none;
}

.event-date {
  background: red;
  float: left;
  text-align: center;
  font-size: 14px;
  color: #fff;
  padding: 8px 12px;
  margin-right: 10px;
}

.campus-news span {
  width: 80px;
  float: left;
}

.campus-news h2 {
  font-weight: 600;
  font-size: 16px;
}

.campus-news h6 {
  font-weight: 500;
  font-size: 13px;
  color: red;
}

.campus-news p {
  font-size: 14px;
}

/* Responsive styles */
@media screen and (min-width: 768px) {
  .event {
    width: 32%;
    margin-right: 1%;
    float: left;
  }
}

@media screen and (max-width: 767px) {
  .event {
    width: 100%;
    margin-right: 0;
  }
}

 .section-header {
        text-align: center;
    }
    .slick-slide img {
        display: block;
        width: 100%;
        height: auto;
    }
    @media (max-width: 767px) {
        .slick-slide img {
            max-width: 100%;
            max-height: 250px;
        }
    }
    .containerv {
            margin-top: 50px;
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            height: 0;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
</style>

<script></script>



