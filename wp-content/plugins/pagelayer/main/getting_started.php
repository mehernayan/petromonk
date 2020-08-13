<?php

//////////////////////////////////////////////////////////////
//===========================================================
// getting_started.php
//===========================================================
// PAGELAYER
// Inspired by the DESIRE to be the BEST OF ALL
// ----------------------------------------------------------
// Started by: Pulkit Gupta
// Date:	   23rd Jan 2017
// Time:	   23:00 hrs
// Site:	   http://pagelayer.com/wordpress (PAGELAYER)
// ----------------------------------------------------------
// Please Read the Terms of use at http://pagelayer.com/tos
// ----------------------------------------------------------
//===========================================================
// (c)Pagelayer Team
//===========================================================
//////////////////////////////////////////////////////////////

// Are we being accessed directly ?
if(!defined('PAGELAYER_VERSION')) {
	exit('Hacking Attempt !');
}

?>

<link rel="stylesheet" href="<?php echo PAGELAYER_CSS.'/font-awesome5.min.css';?>">

<div class="pagelayer-getting-started">
	<div class="pagelayer-getting-started-container">
		<div class="pagelayer-getting-started-block">
			<div class="pagelayer-getting-started-logo">
				<?php echo (!defined('SITEPAD')) ? '<img src="'.PAGELAYER_URL.'/images/pagelayer-logo-256.png'.'"/>' : '<img src="'.sitepad_assets_url().'/images/logo256.png'.'"/>' ?>
			</div>
			<div class="pagelayer-getting-started-desc">
				<h1><?php _e('Welcome to '); 
					echo (!defined('SITEPAD')) ? '<span>Pagelayer</span>' : '<span>Sitepad</span>';?></h1>
				<h6><?php echo (!defined('SITEPAD')) ? _e('Thanks for Choosing Pagelayer - The most advanced frontend drag & drop page builder. Its very easy to use and very light on the browser.') : _e('Thanks for Choosing Sitepad - Build Professional websites using an Easy to Use Editor and Publish static web pages.');?></h6>
			</div>
			<div class="pagelayer-getting-started-video">
				<?php echo (!defined('SITEPAD')) ? '<iframe width="700" height="400" src="https://www.youtube.com/embed/t8Iz-v-qce8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' : '<iframe height="400" width="700" src="https://www.youtube.com/embed/8e3ROkKoFwA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';?>
			</div>
			<div class="pagelayer-getting-started-desc">
				<h6><?php echo (!defined('SITEPAD')) ? _e('Pagelayer makes it easy to create webpage in WordPress. You can watch the video tutorial or read our guide on how to create your first page.') : _e('Sitepad makes it easy to create stunning Websites. You can watch the video tutorial or read our guide on how to create your first page.');?></h6>
				<div class="pagelayer-getting-started-btn">
					<a href="<?php echo admin_url('/post-new.php?post_type=page')?>" class="button button-primary btn-sc"><?php _e('Create Your First Page');?></a>
					<a href="<?php echo (!defined('SITEPAD')) ? "https://pagelayer.com/getting-started/" : "#"; ?>" class="button button-secondary btn-sc" target="_blank"><?php _e('Watch the Full Guide');?></a>
				</div>
			</div>
		</div>
		<div class="pagelayer-features">
			<div class="pagelayer-getting-started-desc">
				<h1><?php echo (!defined('SITEPAD')) ? _e('Pagelayer Features') : _e('Sitepad Features');?></h1>
				<h6><?php echo (!defined('SITEPAD')) ? "Pagelayer" : "Sitepad"; _e(' is an awesome page builder allows you to create and design you website instantly in a simple way possible. It is user-friendly with fully customizable widgets where user does not require any developer skills.');?></h6>
				<div class="pagelayer-features-list">
				<?php $style = (defined('SITEPAD')) ? 'style="width:30%; height: 265px"' : ''; ?>
					<div class="feature-block-card" <?php echo $style; ?>>
						<div class="feature-block">
							<?php echo (!defined('SITEPAD')) ? '<i class="fas fa-mouse-pointer" aria-hidden="true">' : '<i class="fas fa-paper-plane" aria-hidden="true"></i>' ?></i>
						</div>
						<div class="feature-block-content">
							<h5><?php echo (!defined('SITEPAD')) ? _e('Drag & Drop Editor') : _e('One Click Publish', 'pagelayer')?></h5>
							<p><?php echo (!defined('SITEPAD')) ? _e('Design your page by dragging widgets from given choices of widget.') : _e('Just pick a theme, customize the content add images, audio, videos and click Publish.');?></p>
						</div>
					</div>
					<div class="feature-block-card" <?php echo $style; ?>>
						<div class="feature-block">
							<?php echo (!defined('SITEPAD')) ? '<i class="fa fa-th-list" aria-hidden="true">' : '<i class="fas fa-random" aria-hidden="true"></i>' ?></i>
						</div>
						<div class="feature-block-content">
							<h5><?php echo (!defined('SITEPAD')) ? _e('Widgets') : _e('Static Pages')?></h5>
							<p><?php echo (!defined('SITEPAD')) ? _e('We have large number of widgets so you can design your page by selecting the widget from widget area.') : _e('SitePad publishes static web pages (HTML, CSS, JS) to your domain so your site performs faster.');?></p>
						</div>
					</div>
					<div class="feature-block-card" <?php echo $style; ?>>
						<div class="feature-block">
							<?php echo (!defined('SITEPAD')) ? '<i class="fa fa-pencil" aria-hidden="true">' : '<i class="fas fa-mobile-alt" aria-hidden="true"></i>' ?></i>
						</div>
						<div class="feature-block-content">
							<h5><?php echo (!defined('SITEPAD')) ? _e('In-line Editing') : _e('Responsive')?></h5>
							<p><?php echo (!defined('SITEPAD')) ? _e('Simply click on any text and by typing you can add your new text.') : _e('Websites created by SitePad are responsive and compatible with all screen sizes.');?></p>
						</div>
					</div>
					<div class="feature-block-card" <?php echo $style; ?>>
						<div class="feature-block">
							<?php echo (!defined('SITEPAD')) ? '<i class="fa fa-clone" aria-hidden="true">' : '<i class="fas fa-share-square" aria-hidden="true"></i>' ?></i>
						</div>
						<div class="feature-block-content">
							<h5><?php echo (!defined('SITEPAD')) ? _e('Duplicate') : _e('Social Media')?></h5>
							<p><?php echo (!defined('SITEPAD')) ? _e('Simply click on this option and it will create exact copy of existing element by saving your time.') : _e('Add links to your social media pages like Facebook, Twitter, LinkedIn, YouTube & many more.');?></p>
						</div>
					</div>
					<div class="feature-block-card" <?php echo $style; ?>>
						<div class="feature-block">
							<?php echo (!defined('SITEPAD')) ? '<i class="fa fa-snowflake-o fa-spin" aria-hidden="true">' : '<i class="fas fa-check" aria-hidden="true"></i>' ?></i>
						</div>
						<div class="feature-block-content">
							<h5><?php echo (!defined('SITEPAD')) ? _e('Animation') : _e('Easy to Use')?></h5>
							<p><?php echo (!defined('SITEPAD')) ? _e('Create your page more attractive with animation effects that trigger when the element is in display area.') : _e('Simple Drag and Drop Interface to create beautiful websites without any technical knowledge.');?></p>
						</div>
					</div>
					<div class="feature-block-card" <?php echo $style; ?>>
						<div class="feature-block">
							<?php echo (!defined('SITEPAD')) ? '<i class="fa fa-text-width" aria-hidden="true">' : '<i class="fas fa-cog" aria-hidden="true"></i>' ?></i>
						</div>
						<div class="feature-block-content">
							<h5><?php echo (!defined('SITEPAD')) ? _e('Styling Options') : _e('Control Panel Integration')?></h5>
							<p><?php echo (!defined('SITEPAD')) ? _e('With large number of styling options you can design your page the way you want such as: background overlay, box shadow etc.') : _e('SitePad is integrated with several popular control panels like cPanel, Directadmin, etc.');?></p>
						</div>
					</div>
					<div class="feature-block-card" <?php echo $style; ?>>
						<div class="feature-block">
							<?php echo (!defined('SITEPAD')) ? '<i class="fa fa-paint-brush" aria-hidden="true">' : '<i class="fas fa-th-large" aria-hidden="true"></i>' ?></i>
						</div>
						<div class="feature-block-content">
							<h5><?php echo (!defined('SITEPAD')) ? _e('Real Time Design') : _e('Multiple Sites')?></h5>
							<p><?php echo (!defined('SITEPAD')) ? _e('Whenever you make changes on your page it gets updated instantly on your page. It helps you design your page quickly by saving your time.') : _e('Create multiple sites each having different themes, appearences and content.');?></p>
						</div>
					</div>
					<div class="feature-block-card" <?php echo $style; ?>>
						<div class="feature-block">
							<?php echo (!defined('SITEPAD')) ? '<i class="fa fa-font" aria-hidden="true">' : '<i class="fas fa-copy" aria-hidden="true"></i>' ?></i>
						</div>
						<div class="feature-block-content">
							<h5><?php echo (!defined('SITEPAD')) ? _e('Typography') : _e('Replicate Objects')?></h5>
							<p><?php echo (!defined('SITEPAD')) ? _e('With this feature you can beautify your page content by changing font-size, weight, transform, decoration. You can also add google fonts.') : _e('Replicate objects in the drag and drop editor interface to use your customizations multiple times.');?></p>
						</div>
					</div>
					<div class="feature-block-card" <?php echo $style; ?>>
						<div class="feature-block">
							<?php echo (!defined('SITEPAD')) ? '<i class="fa fa-cubes" aria-hidden="true">' : '<i class="fas fa-shopping-cart" aria-hidden="true"></i>' ?></i>
						</div>
						<div class="feature-block-content">
							<h5><?php echo (!defined('SITEPAD')) ? _e('Easily Customizable') : _e('WHMCS Module')?></h5>
							<p><?php echo (!defined('SITEPAD')) ? _e('Each widget has multiple options to fully customize the widget such as change font colors, sizing and spacing.') : _e('User can Directly Access SitePad Website Builder from WHMCS Client Area.');?></p>
						</div>
					</div>
				<div class="pagelayer-getting-started-btn">
					<a href=" <?php echo (!defined('SITEPAD')) ? "https://pagelayer.com/" : "http://sitepad.com/"?>" class="button button-secondary btn-sc" target="_blank" style="margin-top:20px;"><?php echo (!defined('SITEPAD')) ? _e('Why Pagelayer?') : _e('Why Sitepad?');?></a>
				</div>
			</div>
		</div>
	</div>
</div>

<style>

.pagelayer-getting-started{
	padding-top: 50px;
}

.pagelayer-getting-started-container{
	margin: 0 auto;
	max-width: 1000px;
	padding: 0;
	text-align: center;
}

.pagelayer-getting-started-block{
	background-color: #fff;
	border: 2px solid #e1e1e1;
	border-radius: 2px;
	margin-bottom: 30px;
	position: relative;
	padding-top: 40px;
}

.pagelayer-getting-started-logo img{
	width: 10%;
	height: auto;
}

.pagelayer-getting-started-desc{
	padding: 40px;
}

.pagelayer-getting-started-desc h1{
	color: #222;
	font-size: 24px;
	margin: 0 0 24px 0;
}

.pagelayer-getting-started-desc h6{
	font-size: 16px;
	font-weight: 400;
	line-height: 1.6;
	margin: 0 85px 0 85px;
}

.pagelayer-getting-started-btn{
	max-width: 600px;
	margin: 0 auto 0 auto;
	margin-top: 36px !important;
}

.btn-sc{
	font-size: 14px !important;
	min-height: 46px !important;
	line-height: 3.14285714 ! important;
	padding: 0px 36px !important;
}

.button-primary{
	margin-right: 20px !important;
	border-radius: 3px !important;
}

.pagelayer-features{
	background-color: #fff;
	border: 2px solid #e1e1e1;
	border-radius: 2px 2px 0 0;
	position: relative;
}

.feature-block-card{
	width: 25%;
	display: inline-block;
	margin: 60px 10px 0 10px;
	vertical-align: top;
	box-shadow: 0px 0px 20px 0px rgba(0,0,0,.1);
	padding: 20px;
	height: 220px;
}

.feature-block{
	background: linear-gradient(to right, rgb(116, 116, 191), rgb(52, 138, 199));
	border-radius: 50%;
	width: 54px;
	height: 54px;
	position: relative;
	display: inline-block;
}

.feature-block i{
	font-size: 30px;
	color: #fff;
	position: absolute;
	top: 13px;
	left: 0;
	right: 0;
}

.feature-block-content h5{
	color: #222;
	font-size: 20px;
	margin: 10px 0 0 0;
}

.feature-block-content p{
	color: #222;
	font-size: 16px;
	margin-top: 10px;
}

.fa-spin{
	-webkit-animation: fa-spin 2s infinite linear;
	animation: fa-spin 2s infinite linear;
}
</style>