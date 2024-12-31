<footer id="footer" class="footer">
    <div class="utf_footer_main">
      <div class="container">
        <div class="row">
		  <div class="col-lg-4 col-sm-12 col-xs-12 footer-widget contact-widget">
            <h3 class="widget-title">About Us</h3>
            <ul>
              <li> <p>{{ @$footerInfo->description }}</p></li>
            </ul>
			<ul class="unstyled utf_footer_social">
                @foreach ($socialLinks as $link)
                <li>
                    <a href="{{ $link->url }}">
                        <i class="{{ $link->icon }}"></i>
                    </a>
                </li>
                @endforeach
		    </ul>
          </div>
		  
          <div class="col-lg-4 col-sm-12 col-xs-12 footer-widget widget-categories">
            <h3 class="widget-title"> {{ @$footerGridOneTitle->value }}</h3>
            <ul>
                @foreach (@$footerGridOne as $gridOne)
                    <li>
                        <i class="fa fa-angle-double-right"></i>
                        <a href="{{ $gridOne->url }}">{{ $gridOne->name }}</a>
                    </li>
                @endforeach
            </ul>
          </div>
		  
		  <div class="col-lg-4 col-sm-12 col-xs-12 footer-widget">
            <h3 class="widget-title">{{ @$footerGridTwoTitle->value }}</h3>
            <div class="utf_list_post_block">
              <ul class="utf_list_post">
                @foreach (@$footerGridTwo as $gridTwo)
                    <li>
                        <a href="{{ $gridTwo->url }}">{{ $gridTwo->name }}</a>
                    </li>
                @endforeach
              </ul>
            </div>            
          </div>
                    
        </div>
      </div>
    </div>    
</footer>


<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 text-center">
        <div class="utf_copyright_info"> <span>Copyright © {{date('Y')}} All Rights Reserved.</span> </div>
      </div>        
    </div>      
    <div id="back-to-top" class="back-to-top">
      <button class="btn btn-primary" title="Back to Top"> <i class="fa fa-angle-up"></i> </button>
    </div>
  </div>
</div>



<!-----------------------Popup Form ----------------->

 <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal-box">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg show-modal" data-toggle="modal"
                            data-target="#myModal">
                            Enquire Now
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content clearfix">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                    <div class="modal-body pop-body">
                                        <h3 class="title">Connect With Us</h3>
                                        <!--<p class="description">Login here Using Email & Password</p>-->
                                       
                                        <div class="form-group">
                                            <span class="input-icon"><i class="fa fa-user"></i></span>
                                            <input type="Name" class="form-control" placeholder="Enter Your Name">
                                        </div>
                                         <div class="form-group">
                                            <span class="input-icon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control" placeholder="Enter Your Email">
                                        </div>
                                        <div class="form-group">
                                            <span class="input-icon"><i class="fas fa-comment"></i></span>
                                            <input type="message" class="form-control" placeholder="Message">
                                        </div>
                                        
                                        
                                        <button class="btn btn-primary solid blank">Submit Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<!-----------------------End Popup Form ----------------->







  <div class="floating_btn">
    <a target="_blank" href="https://api.whatsapp.com/send?phone=+91- 9315769585&text=hello">
      <div class="contact_icon">
      <i class="fab fa-whatsapp"></i>
      </div>
    </a>
    <p class="text_icon">Talk to us?</p>
  </div>

<!-- Javascript Files --> 
<script src="/assets/js/jquery-3.2.1.min.js"></script> 
<script src="/assets/js/popper.min.js"></script> 
<script src="/assets/js/bootstrap.min.js"></script> 
<script src="/assets/js/owl.carousel.min.js"></script> 
<script src="/assets/js/jquery.colorbox.js"></script>
<script src="/assets/js/smoothscroll.js"></script> 
<script src="/assets/js/custom_script.js"></script> 