<?php
/*Template Name: ContactUs */
get_header(); ?>
	<div class="contact_us_form_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
					<form action="" method="POST" id="contactUsForm" novalidate="novalidate">
						<div class="contact_us_form">
							<div class="row">
								<div class="col-md-6">
									<div class="container">
										<div class="row">
											
											<div class="col-12">
												<h4>Message Us</h4>
											</div>                                        
											<div class="col-12 form-group">
												<input type="text" class="form-control" id="reg_name" placeholder="Name *">
												<span class="error" id="contactUsNameValidation" style="display:none;">* Name is required</span>
											</div>
											<div class="col-12 form-group">
												<input type="email" class="form-control" id="reg_email" placeholder="Email *">
												<span class="error" id="contactUsEmailValidation" style="display:none;">* Valid Email is required</span>
											</div>
											<div class="col-12 form-group">
												<input type="text" class="form-control" id="reg_phone" placeholder="Phone Number">
											</div>
											<div class="col-12 form-group">
												<textarea class="form-control" id="reg_message" placeholder="Message *"></textarea>
												<span class="error" id="contactUsMessageValidation" style="display:none;">* Message is required</span>
											</div>
											<div class="col-12 form-group">
												<button type="submit" class="btn submit-btn">SEND MESSAGE</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 mb-20">
									<div class="container">
										<div class="row ml-50 location-info">
											<div class="col-12">
												<h4>Offices</h4>
											</div> 
											<div class="col-12">
												<h5>TEXAS</h5>
											</div> 
											<div class="col-12">
												<p>1201 International Pkwy</p>
												<p>Suite #300</p>
												<p>Richardson, TX 75081</p>                                            
											</div> 
											<div class="col-12 mt-15">
												<h5>CALIFORNIA</h5>
											</div> 
											<div class="col-12">
												<p>5370 North Chestnut Avenu</p>
												<p>M/S OF 18</p>
												<p>Fresno, CA 93740</p>                                            
											</div>
											<div class="col-12 mt-15">
												<h5>NEW YORK</h5>
											</div> 
											<div class="col-12">
												<p>120 Hawley St</p>
												<p>Binghamton, NY 13901</p>                                           
											</div>
											<div class="col-12 mt-15">
												<ul>
												  <li>
													<a href="https://www.facebook.com/Skyven-Technologies-449963128381477/?ref=bookmarks" target="_blank">
													  <img src="http://localhost:8888/skyvenco/wp-content/uploads/2020/10/facebook.png" alt="">
													</a>
												  </li>
												  <li style="margin: 0 10px;">
													<a href="https://twitter.com/SkyvenTech" target="_blank">
													  <img src="http://localhost:8888/skyvenco/wp-content/uploads/2020/10/twitter.png" alt="">
													</a>
												  </li>
												  <li>
													<a href="https://www.linkedin.com/company/skyven-technologies/" target="_blank">
													  <img src="http://localhost:8888/skyvenco/wp-content/uploads/2020/10/linkedin.png" alt="">
													</a>
												  </li>
											  </ul>                                      
											</div>
										</div>
									</div>
								</div>
							</div>                        
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();