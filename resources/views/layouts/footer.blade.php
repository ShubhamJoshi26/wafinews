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
        <div class="utf_copyright_info"> <span>Copyright © 2022 All Rights Reserved.</span> </div>
      </div>        
    </div>      
    <div id="back-to-top" class="back-to-top">
      <button class="btn btn-primary" title="Back to Top"> <i class="fa fa-angle-up"></i> </button>
    </div>
  </div>
</div>

<!-- Javascript Files --> 
<script src="/assets/js/jquery-3.2.1.min.js"></script> 
<script src="/assets/js/popper.min.js"></script> 
<script src="/assets/js/bootstrap.min.js"></script> 
<script src="/assets/js/owl.carousel.min.js"></script> 
<script src="/assets/js/jquery.colorbox.js"></script>
<script src="/assets/js/smoothscroll.js"></script> 
<script src="/assets/js/custom_script.js"></script> 