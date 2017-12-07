<!DOCTYPE html>
<html lang="en">
<head>
	<title>Myanants | We Connect Service Providers</title>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">    
	<link rel="shortcut icon" href="favicon.ico">  

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>	

	<?php echo $this->Html->css('home/bootstrap/css/bootstrap.min'); ?>
	<?php echo $this->Html->css('home/font-awesome/css/font-awesome'); ?>
	<?php echo $this->Html->css('home/prism/prism'); ?>
	<?php echo $this->Html->css('styles'); ?>
	<?php echo $this->Html->css('mobile'); ?>
</head> 

<body data-spy="scroll">
	<?php $user_id = AuthComponent::user('id'); ?>

	<!---//Facebook button code-->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<!-- ******HEADER****** --> 
	<header id="header" class="header">  
		<div class="container">            
			<div class="hidden-sm hidden-xs col-md-3" style="margin-top: -3%;margin-bottom: -1%;">        
				<h1>
					<a href="http://myanants.com/">
						<img src='http://myanants.com/img/mm.png' class="logoimg" />
					</a>
				</h1><!--//logo-->
			</div>    

			<div class="hidden-md hidden-lg col-md-3" style="margin-top: -3%;margin-bottom: -1%;">        
				<h1 class="logo pull-left">
					<a class="scrollto" href="http://myanants.com/">
						<img src='http://myanants.com/img/mm.png' class="logoimg" />
					</a>
				</h1><!--//logo-->
			</div>

			<nav id="main-nav" class="main-nav navbar-right" role="navigation">
				<div class="navbar-header">
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button><!--//nav-toggle-->
				</div><!--//navbar-header-->            
				<div class="navbar-collapse collapse" id="navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="nav-item">
							<a href="tel:09961868686">
								<img src='http://myanants.com/img/phone-icon.png' class="img-responsive phone-icon-sm" />
							</a>
						</li>
						<li class="nav-item">
							<?php if(empty($user_id)) : ?>
								<?php echo $this->Html->link("LOGIN", array('controller' => 'users', 'action' => 'login')) ;?>
							<?php else: ?>
								<?php echo $this->Html->link("LOGOUT", array('controller' => 'users', 'action' => 'logout')) ;?>
							<?php endif; ?>
						</li>
						<li class="nav-item">
							<?php if(empty($user_id)) : ?>
								<?php echo $this->Html->link("REGISTER", array('controller' => 'users', 'action' => 'add')) ;?>
							<?php endif; ?>
						</li>

						<li class="nav-item">
							<?php
								$currentUrl = Router::url($this->here, true);
								if (strpos($currentUrl, '/mya/') !== false || $currentUrl == 'http://myanants.com/') {
									echo $this->Html->link('English', array('language'=>'eng'));
								} elseif (strpos($currentUrl, '/eng/') !== false) {
									echo $this->Html->link('ျမန္မာ', array('language'=>'mya'));
								}
							?>	
						</li>

					</ul><!--//nav-->
				</div><!--//navabr-collapse-->
			</nav><!--//main-nav-->
		</div>
	</header><!--//header-->
	
	<!-- ******PROMO****** -->
	<section id="promo" class="promo section offset-header">
		<div class="container text-center">
			<!-- <h2 class="hidden-sm hidden-xs title">Myan<span class="highlight">Ants</span></h2> -->
			<p class="hidden-sm hidden-xs intro">
				<?php echo __('Are you looking for Aircon Servicing , Home Cleaning , Plumbing ,Electrical and Wiring Fixing ?'); ?> <br/>
				<?php echo __('Whatever you need , MyanAnts is here ! !'); ?> <br/>
			</p>

			<div class="btns">


				<?php echo $this->Html->link(__('Air Conditioner Maintenance'), array('controller' => 'servicerequest', 'action' => 'add','1'),array('class' => 'btn btn-cta-primary' )) ;?>

				<?php echo $this->Html->link(__('Cleaning Service'), array('controller' => 'servicerequest', 'action' => 'add','2'),array('class' => 'btn btn-cta-primary' )) ;?>

				<?php echo $this->Html->link(__('Electrical and Wiring'), array('controller' => 'servicerequest', 'action' => 'add','3'),array('class' => 'btn btn-cta-primary' )) ;?>

				<?php echo $this->Html->link(__('Other Services'), array('controller' => 'servicerequest', 'action' => 'add','4'),array('class' => 'btn btn-cta-primary' )) ;?>


				<a class="hidden-lg hidden-md btn btn-cta-primary" href="tel:09961868686" target="_blank">
					<center><img src='http://myanants.com/img/phone-icon.png' class="img-responsive phone-icon-sm" /></center>
				</a>
			</div>

			<ul class="meta list-inline">
			</ul><!--//meta-->
		</div><!--//container-->

		<div class="social-media">
			<div class="social-media-inner container text-center">
				<ul class="list-inline">

					<li class="twitter-follow">
						<a href="https://www.facebook.com/MyanAnts/" class="twitter-follow-button" data-show-count="false">
						Facebook</a>
					</li><!--//twitter-follow-->

					<li class="twitter-tweet">
						<a href="https://www.linkedin.com/company/13391896/" class="twitter-share-button" data-via="3rdwave_themes" data-hashtags="bootstrap">LinkedIn</a>
					</li><!--//twitter-tweet-->
				</ul>
			</div>
		</div>
	</section><!--//promo-->
	
	<!-- ******ABOUT****** --> 
	<section id="about" class="about section">
		<div class="container">
			<h2 class="title text-center">
				<?php echo __('What is MyanAnts?'); ?>
			</h2>
			<p class="intro text-center">

				<?php echo __('Myanants is a technology startup which connects trustworthy and qualified service providers to customers via online or offline.Services available now by Myanants are Air conditioning service, Plumbing service, Electrical & Wiring  and Cleaning service.'); ?>
			</p>
			<div class="row">
				<div class="item col-md-3 col-sm-6 col-xs-12">
					<div class="icon-holder">
						<i class="fa fa-heart"></i>
					</div>
					<div class="content">
						<h3 class="sub-title">
						<?php echo __('Book Online or Offline'); ?>
						</h3>
						<p>
						<?php echo __('Customers can book anytime via www.myanants.com or call 09 06 186 8686 or 09 95 200 4939 at your convenient time.We connect you to the most reliable service providers.'); ?>
					</p>
					</div><!--//content-->
				</div><!--//item-->

				<div class="item col-md-3 col-sm-6 col-xs-12">
					<div class="icon-holder">
						<i class="fa fa-clock-o"></i>
					</div>
					<div class="content">
						<h3 class="sub-title">
							<?php echo __('Pick the service'); ?>
						</h3>
						<p>
							<?php echo __('Select the services we offer.Then answer some specific questions about what you need.We’ll share these informations to the service provider who can complete your task.'); ?>
						</p>
					</div><!--//content-->
				</div><!--//item-->

				<div class="item col-md-3 col-sm-6 col-xs-12">
					<div class="icon-holder">
						<i class="fa fa-crosshairs"></i>
					</div>
					<div class="content">
						<h3 class="sub-title">
							<?php echo __('How Myanants work?'); ?>
						</h3>
						<p>
							<?php echo __('Myanants connects the customers with trustworthy and  qualified services providers who can satisfy their wants.'); ?>
						</p>
					</div><!--//content-->
				</div><!--//item-->

				<div class="item col-md-3 col-sm-6 col-xs-12">
					<div class="icon-holder">
						<i class="fa fa-crosshairs"></i>
					</div>
					<div class="content">
						<h3 class="sub-title">
							<?php echo __('Pay Only After Work Is Done'); ?>
						</h3>
						<p>
							<?php echo __('Make the payment only after work is completed.'); ?>
						</p>

					</div><!--//content-->
				</div><!--//item-->

				<div class="clearfix visible-md"></div>    
				             
			</div><!--//row-->            
		</div><!--//container-->
	</section><!--//about-->
	
		
	<!-- ******CONTACT****** --> 
	<section id="contact" class="contact section has-pattern">
		<div class="container">
			<div class="contact-inner">
				<div class="clearfix"></div>
				<div class="info text-center">
					<h4 class="sub-title">Get Connected</h4>
					<ul class="social-icons list-inline">
						<li><a href="https://www.facebook.com/MyanAnts/" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://www.linkedin.com/company/13391896/"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="http://instagram.com/"><i class="fa fa-instagram"></i></a></li>              
					</ul>
				</div><!--//info-->
			</div><!--//contact-inner-->
		</div><!--//container-->
	</section><!--//contact-->  
	  
	<!-- ******FOOTER****** --> 
	<footer class="footer">
		<div class="container text-center">
			<small class="copyright">© 2017 MyanAnts. All rights reserved.</small>
		</div><!--//container-->
	</footer><!--//footer-->
	 
	<?php echo $this->Html->script('home/jquery-1.11.3.min'); ?>   
	<?php echo $this->Html->script('home/jquery.easing.1.3'); ?>   
	<?php echo $this->Html->script('home/bootstrap/js/bootstrap.min'); ?>   
	<?php echo $this->Html->script('home/jquery-scrollTo/jquery.scrollTo.min'); ?>   
	<?php echo $this->Html->script('home/prism/prism'); ?>   
	<?php echo $this->Html->script('home/main'); ?>   
</body>
</html> 

<script type="text/javascript">
	$('select').on('change', function() {
		location.replace("http://myanants.com/"+this.value+"/users/index");
	})
</script>