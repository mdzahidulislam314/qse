<footer class="footer">
	<div class="footer-body">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="footer-section">
						<h4 class="footer-section-title">About {{ get_setting('site_moto') }}</h4>
						<!-- /.footer-section-title -->

						<div class="footer-section-body">
							<p>{{ get_setting('footer_text') }}</p>
						</div>
						<!-- /.footer-section-body -->
					</div>
					<!-- /.footer-section -->
				</div>
				<!-- /.columns large-3 medium-12 -->

				<div class="col-md-4">
					<div class="footer-section">
						<h4 class="footer-section-title">Quick Links</h4>
						<!-- /.footer-section-title -->

						<div class="footer-section-body">
							<ul class="list-links">
								<li>
									<a href="index.html">Home</a>
								</li>

								<li>
									<a href="about-us.html">About Us</a>
								</li>

								<li>
									<a href="activities.html">Activities</a>
								</li>
								<li>
									<a href="projects.html">Projects</a>
								</li>

								<li>
									<a href="gallery.html">Gallery</a>
								</li>

								<li>
									<a href="contact.html">Contact Us</a>
								</li>
							</ul>
							<!-- /.list-links -->
						</div>
						<!-- /.footer-section-body -->
					</div>
					<!-- /.footer-section -->
				</div>
				<!-- /.columns large-3 medium-12 -->

				<div class="col-md-4">
					<div class="footer-section">
						<h4 class="footer-section-title">Contact Us</h4>
						<!-- /.footer-section-title -->

						<div class="footer-section-body">
							<p><b>Address:</b> {{ get_setting('address') }}</p>

							<div class="footer-contacts">
								<p>
									<b> <i class="fa fa-phone"></i> Phone: </b>

									{{ get_setting('phone') }}
								</p>

								<p>
									<b> <i class="fa fa-envelope-o"></i> Email: </b>

									{{ get_setting('email') }}
								</p>
							</div>
							<!-- /.footer-contacts -->
						</div>
						<!-- /.footer-section-body -->
					</div>
					<!-- /.footer-section -->
				</div>
				<!-- /.columns large-3 medium-12 -->
			</div>
			<!-- /.row -->
		</div>
	</div>
	<!-- /.footer-body -->

	<div class="bwt-footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-6 copyright">
					<div class="left-text">Copyright &copy; {{ get_setting('site_moto') }} 2024. All Rights Reserved</div>
				</div>
			</div>
		</div>
	</div>
</footer>