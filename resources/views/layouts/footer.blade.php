@php
	$allPages = \App\Page::where('is_active', true)->get();
@endphp

<footer class="footer-area">
	<div class="footer-widget">
		<div class="container">
			<div class="row footer-widget-wrapper pt-100 pb-70">
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget-box about-us">
						<a href="#" class="footer-logo">
							<img src="{{get_setting('footer_logo')}}" alt="" />
						</a>
						<p class="mb-4">
							{{get_setting('footertext')}}
						</p>
						<ul class="footer-contact">
							<li>
								<a href="tel:+21236547898"><i class="far fa-phone"></i>{{get_setting('phone')}}</a>
							</li>
							<li><i class="far fa-map-marker-alt"></i>{{get_setting('address')}}</li>
							<li>
								<a href="#">
									<i class="far fa-envelope"></i><span class="__cf_email__">{{get_setting('email')}}</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-2">
					<div class="footer-widget-box list">
						<h4 class="footer-widget-title">Quick Links</h4>
						<ul class="footer-list">
							<li>
								<a href="{{route('contact.page')}}"><i class="fas fa-angle-double-right"></i> Contact Us</a>
							</li>
							<li>
								<a href="{{route('faqs.page')}}"><i class="fas fa-angle-double-right"></i> FAQ'S</a>
							</li>
							@foreach($allPages as $page)
								<li>
									<a href="{{route('all.pages', $page->slug)}}"><i class="fas fa-angle-double-right"></i> {{$page->title}}</a>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="footer-widget-box list">
						<h4 class="footer-widget-title">Our Services</h4>
						<ul class="footer-list">
							<li>
								<a href="#"><i class="fas fa-angle-double-right"></i> Heating Services</a>
							</li>
							<li>
								<a href="#"><i class="fas fa-angle-double-right"></i> AC Installation</a>
							</li>
							<li>
								<a href="#"><i class="fas fa-angle-double-right"></i> Cooler Cleaning</a>
							</li>
							<li>
								<a href="#"><i class="fas fa-angle-double-right"></i> Maintenance And Repair</a>
							</li>
							<li>
								<a href="#"><i class="fas fa-angle-double-right"></i> AC Duct Cleaning</a>
							</li>
							<li>
								<a href="#"><i class="fas fa-angle-double-right"></i> Quality Testing</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="footer-widget-box list">
						<h4 class="footer-widget-title">Office Time</h4>
						<div class="textwidget row">
							<div class="col-md-6 col-sm-6 col-xs-5">
								<ul>
									<li>Sunday</li>
									<li>Monday</li>
									<li>Tuesday</li>
									<li>Wendsday</li>
									<li>Thursday</li>
									<li>Friday</li>
									<li>Saturday</li>
								</ul>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-7">
								<ul>
									<li>09am – 06pm</li>
									<li>09am – 06pm</li>
									<li>09am – 06pm</li>
									<li>09am – 06pm</li>
									<li>09am – 06pm</li>
									<li>Closed</li>
									<li>Closed</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-6 align-self-center">
					<p class="copyright-text">&copy; Copyright <span id="date"></span> <a href="#"> aircool </a> All Rights Reserved.</p>
				</div>
				<div class="col-md-6 align-self-center">
					<ul class="footer-social">
						<li>
							<a href="#"><i class="fab fa-facebook-f"></i></a>
						</li>
						<li>
							<a href="#"><i class="fab fa-twitter"></i></a>
						</li>
						<li>
							<a href="#"><i class="fab fa-linkedin-in"></i></a>
						</li>
						<li>
							<a href="#"><i class="fab fa-youtube"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>