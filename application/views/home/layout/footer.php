<!-- Footer Starts -->
<footer class="main-footer">
    <div class="footer-area" style="background: <?php echo $cms_setting['footer_background_color'] ?> url(<?=base_url('assets/frontend/images/0.png')?>);">
        <div class="container px-md-0">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="footer-logo">
                        <img src="<?php echo base_url('uploads/frontend/images/' . $cms_setting['logo']); ?>" alt="Logo">
                    </div>
                    <?php if ($global_config['footer_branch_switcher']) {  ?>
                    <div class="footer-select mb-3 mt-4">
                        <div class="form-group">
                            <?php
                                $branch_list = $this->home_model->branch_list();
                                $default_branch = $this->home_model->getDefaultBranch();
                                echo form_dropdown("branch_id", $branch_list, $default_branch, "class='form-control' id='activateSchool'
                                data-plugin-selectTwo");
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                    <p class="footer-dec"><?php echo $cms_setting['footer_about_text']; ?></p>
                    <ul class="social">
                    <?php if (!empty($cms_setting['facebook_url'])) { ?>
                        <li><a href="<?php echo $cms_setting['facebook_url']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <?php } if (!empty($cms_setting['twitter_url'])) { ?>
                        <li><a href="<?php echo $cms_setting['twitter_url']; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <?php } if (!empty($cms_setting['youtube_url'])) { ?>
                        <li><a href="<?php echo $cms_setting['youtube_url']; ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    <?php } if (!empty($cms_setting['google_plus'])) { ?>
                        <li><a href="<?php echo $cms_setting['google_plus']; ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                    <?php } if (!empty($cms_setting['linkedin_url'])) { ?>
                        <li><a href="<?php echo $cms_setting['linkedin_url']; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    <?php } if (!empty($cms_setting['instagram_url'])) { ?>
                        <li><a href="<?php echo $cms_setting['instagram_url']; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <?php } if (!empty($cms_setting['pinterest_url'])) { ?>
                        <li><a href="<?php echo $cms_setting['pinterest_url']; ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                    <?php } ?>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h4>Address</h4>
                    <ul class="list-unstyled address-list">
                        <li class="clearfix address">
                            <i class="fas fa-map-marker-alt"></i> <?php echo $cms_setting['address']; ?>
                        </li>
                        <li class="clearfix">
                            <i class="fas fa-phone"></i> <?php echo $cms_setting['mobile_no']; ?>
                        </li>
                        
                        <li class="clearfix">
                            <i class="fas fa-envelope"></i> <a href="mailto:<?php echo $cms_setting['email']; ?>"><?php echo $cms_setting['email']; ?></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h4>Quick Links</h4>
                    <ul class="list-unstyled quick-links">
                        <?php
                            $school = $this->uri->segment(1);
                            if (empty($school)) {
                                $branchID = $this->home_model->getDefaultBranch();
                                $r = $this->db->select('url_alias')->get_where('front_cms_setting', array('branch_id' => $branchID))->row();
                                $school = $r->url_alias;
                            }
							$result = web_menu_list(1);
							foreach ($result as $row) {
                                if ($cms_setting['online_admission'] == 0 && $row['alias'] == 'admission') continue;
								$url = "#";
                                if ($row['invisible'] == 0) {
                                    $url = $this->home_model->genURL($row, $school);
							?>
                        <li><a href="<?php echo $url; ?>"><i class="fa fa-angle-right"></i> <?php echo $row['title']; ?></a></li>
                        <?php } } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright" style="background-color: <?php echo $cms_setting['copyright_bg_color'] ?>; color: <?php echo $cms_setting['copyright_text_color'] ?>;">
        <div class="container px-md-0 clearfix text-center">
            <?php echo $cms_setting['copyright_text']; ?>
        </div>
    </div>
    <!-- Copyright Ends -->
</footer>
<!-- Footer Ends -->

<?php 
$config = $this->home_model->whatsappChat();
$config = $this->application_model->checkArrayDBVal($config, 'whatsapp_chat');
if ($config['frontend_enable_chat'] == 1) {
?>
<div class="whatsapp-popup">
    <div class="whatsapp-button">
        <i class="fab fa-whatsapp i-open"></i>
        <i class="far fa-times-circle fa-fw i-close"></i>
    </div>
    <div class="popup-content">
        <div class="popup-content-header">
            <i class="fab fa-whatsapp"></i>
            <h5><?php echo $config['header_title'] ?><span><?php echo $config['subtitle'] ?></span></h5>
        </div>
        <div class="whatsapp-content">
            <ul>
            <?php $whatsappAgent = $this->home_model->whatsappAgent(); 
                foreach ($whatsappAgent as $key => $value) {
                    $online = "offline";
                    if (strtolower($value->weekend) != strtolower(date('l'))) {
                        $now = time();
                        $starttime = strtotime($value->start_time);
                        $endtime = strtotime($value->end_time);
                        if ($now >= $starttime && $now <= $endtime) {
                            $online = "online";
                        }
                    }
            ?>
                <li class="<?php echo $online ?>">
                    <a class="whatsapp-agent" href="javascript:void(0)" data-number="<?php echo $value->whataspp_number; ?>">
                        <div class="whatsapp-img">
                            <img src="<?php echo get_image_url('whatsapp_agent', $value->agent_image); ?>" class="whatsapp-avatar" width="60" height="60">
                        </div>
                        <div>
                            <span class="whatsapp-text">
                                <span class="whatsapp-label"><?php echo $value->agent_designation; ?> - <span class="status"><?php echo ucfirst($online) ?></span></span> <?php echo $value->agent_name; ?>
                            </span>
                        </div>
                    </a>
                </li>
            <?php } ?>
            </ul>
        </div>
        <div class="content-footer">
            <p><?php echo $config['footer_text'] ?></p>
        </div>
    </div>
</div>
<?php } ?>

<a href="#" class="back-to-top"><i class="far fa-arrow-alt-circle-up"></i></a>
<!-- JS Files -->
<script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/js/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/plugins/shuffle/jquery.shuffle.modernizr.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/select2/js/select2.full.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert.min.js');?>"></script>
<script src="<?php echo base_url('assets/frontend/plugins/magnific-popup/jquery.magnific-popup.min.js');?>"></script>
<script src="<?php echo base_url('assets/frontend/js/jquery.marquee.min.js');?>"></script>
<script src="<?php echo base_url('assets/frontend/js/custom.js'); ?>"></script>



<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Slick Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<!-- Initialize Slick Carousel -->
<script>
    $(document).ready(function(){
        $('.carousel').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
</script>

<?php
$alertclass = "";
if($this->session->flashdata('alert-message-success')){
    $alertclass = "success";
} else if ($this->session->flashdata('alert-message-error')){
    $alertclass = "error";
} else if ($this->session->flashdata('alert-message-info')){
    $alertclass = "info";
}
if($alertclass != ''):
    $alert_message = $this->session->flashdata('alert-message-'. $alertclass);
?>
<script type="text/javascript">
    swal({
        toast: true,
        position: 'top-end',
        type: '<?php echo $alertclass?>',
        title: '<?php echo $alert_message?>',
        confirmButtonClass: 'btn btn-1',
        buttonsStyling: false,
        timer: 8000
    })
</script>
<?php endif; ?>

<script>
    var marquee = document.getElementById('marquee');

    marquee.addEventListener('mouseover', function () {
        this.stop();
    });

    marquee.addEventListener('mouseout', function () {
        this.start();
    });
</script>

 <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".owl-carousel-4col").owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true, // Enable autoplay
                autoplayTimeout: 4000, // Set autoplay interval in milliseconds (2000ms = 2 seconds)
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 4,
                    },
                },
            });
        });
    </script>