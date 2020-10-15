<footer class="footer">
  <div class="foo-div">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-4 col-sm-4">
                          <div class="address-div">
                              <h5><?php the_field('location_one_title', 'option'); ?></h5>
                              <?php the_field('location_one', 'option'); ?>
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-4">
                          <div class="address-div" style="text-align: center;">
                              <h5><?php the_field('location_two_title', 'option'); ?></h5>
                              <?php the_field('location_two', 'option'); ?>
                          </div>
                      </div>
                      <div class="col-md-4 col-sm-4">
                          <div class="address-div" style="text-align: right;">
                              <h5><?php the_field('location_three_title', 'option'); ?></h5>
                              <?php the_field('location_three', 'option'); ?>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="foo-logo foo-social">
                              <h4>Follow Us</h4>
                              <ul>
                                  <li>
                                    <a href="<?php the_field('facebook_link', 'option'); ?>" target="_blank">
                                      <img src="<?=THEME_URL?>assets/images/fb.png" alt="">
                                    </a>
                                  </li>
                                  <li>
                                    <a href="<?php the_field('twitter_link', 'option'); ?>" target="_blank">
                                      <img src="<?=THEME_URL?>assets/images/twitter.png" alt="">
                                    </a>
                                  </li>
                                  <li>
                                    <a href="<?php the_field('linkedin_link', 'option'); ?>" target="_blank">
                                      <img src="<?=THEME_URL?>assets/images/linkedin.png" alt="">
                                    </a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
             <!-- <div class="col-md-3">
                  <div class="foo-logo foo-contact">
                      <h4>CONTACT FORM</h4>
                      <php echo do_shortcode('[gravityform id="1" title="false" name="false" description="false" ajax="true"]'); ?>
                  </div>
              </div>-->
			  
          </div>
		  <div class="zero-fuel">
				  <h4><?php the_field('footer_hash_text', 'option'); ?></h4>
			  </div>
      </div>
	 
  </div>
      
  <div class="foo-copyright">
      <h5><?php the_field('copy_right_text', 'option'); ?></h5>
  </div>
</footer>

<?php if(is_home() || is_front_page()) { ?>
<script language="javascript">
    function autoResizeDiv() {
        document.getElementById('sec-banner').style.height = window.innerHeight + 'px';
    }
    window.onresize = autoResizeDiv;
    autoResizeDiv();
</script>

<?php } ?>

    
<script type="text/javascript">
$(document).ready(function(){  
  $('.testimonial').slick({
    slidesToShow: 1,
    slidesToScroll: 3,
    autoplay: false,
    autoplaySpeed: 2000,
    dots: false,
    centerMode:true,
    centerPadding:'0',
    vertical:false,
    verticalSwiping:false,
    arrows: true,
    responsive: [
          {
            breakpoint: 1030,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: false
            }
          },
          {
            breakpoint: 769,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: false
            }
          },
          {
            breakpoint: 600,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
          ]
  });
  
  $('#menu-header-menu').append('<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-511 nav-item popmake-download-brochure"><a href="#" class="nav-link"><i class="fa fa-cloud-download"></i> Brochure</a></li>');
});

$(document).on({
    ajaxStart: function(){
        $("body").addClass("loading"); 
    },
    ajaxStop: function(){ 
        $("body").removeClass("loading"); 
    }    
});
$('#contactUsForm').submit(function(event) {
	event.preventDefault();
	$('#contactUsNameValidation').hide();
	$('#contactUsEmailValidation').hide();
	$('#contactUsMessageValidation').hide();
	let app = $(this);
	let contact_name = $('#reg_name').val();
	let contact_email = $('#reg_email').val();
	let contact_phone = $('#reg_phone').val();
	let contact_message = $('#reg_message').val();
	var pass = true;
	if(contact_name.trim() == ''){
		pass = false;
		$('#contactUsNameValidation').show();
	}
	if(contact_email.trim() == '' || !ValidateEmail(contact_email)){
		pass = false;
		$('#contactUsEmailValidation').show();
	}
	if(contact_message.trim() == ''){
		pass = false;
		$('#contactUsMessageValidation').show();
	}
	if(!pass){
		return;
	}
	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: '<?php echo admin_url('admin-ajax.php');?>',
		data: {
			action: 'post_contact',
			'name': contact_name,
			'phone': contact_phone,
			'email': contact_email,
			'message': contact_message
		},
		beforeSend: function() {
		},
		success: function(data) {
			alert(data.message);
			window.location = 'http://localhost:8888/skyvenco';
		},
		error: function(error) {
			console.log(error)
		}
	})
});

function ValidateEmail(inputText) {
	//var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	//if(inputText.value.match(mailformat)) {
	//	return true;
	//}
	//else {
	//	return false;
	//}
	const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(inputText))
}

function submitDownloadBrochure(){
	$('#downloadBrochureNameValidation').hide();
	$('#downloadBrochureEmailValidation').hide();
	let download_name = $('#download_name').val();
	let download_email = $('#download_email').val();
	var pass = true;
	if(download_name.trim() == ''){
		pass = false;
		$('#downloadBrochureNameValidation').show();
	}
	if(download_email.trim() == '' || !ValidateEmail(download_email)){
		pass = false;
		$('#downloadBrochureEmailValidation').show();
	}
	if(!pass){
		return;
	}
	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: '<?php echo admin_url('admin-ajax.php');?>',
		data: {
			action: 'post_download_brochure',
			'name': download_name,
			'email': download_email
		},
		beforeSend: function() {
		},
		success: function(data) {
			if(data.title == 'Success'){
				//alert(data.message);
				PUM.close(541);
				window.location='<?=SITE_URL?>download.php?file=<?php urlencode(the_field('download_file', 'option')); ?>';				
			}else{
				alert(data.message);
			}
			
		},
		error: function(error) {
			console.log(error)
		}
	})
}
</script>

<?php wp_footer(); ?>


</body>
</html>
