<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en" xml:lang="en">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"></meta>
    <head>
        <title>Absurd Project</title>
        <meta name="description" content="Absurd test task"></meta>
		<style type="text/css" media="all"> @import url("<?php echo str_replace('index.php/', '', Functions::path()); ?>view/css/style.css"); </style>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="<?php echo str_replace('index.php/', '', Functions::path()); ?>view/js/lightbox.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo str_replace('index.php/', '', Functions::path()); ?>view/css/lightbox.css"></link>
		<?php if(Config::factory('sitepath.useAJAX')){ ?><!-- use jQuery latest or load from local dir -->
		<!--script type="text/javascript" src="<?php echo str_replace('index.php/', '', Functions::path()); ?>view/js/jquery-1.9.1.min.js?123456"></script-->
		<?php } ?>
    </head>
    <body class="body">
		<div id="page">
			<div id="menu">
				<ul style="height:60px;">
					<li class="menu-first"><?php echo __('Products'); ?>
						<ul>
							<li><a href="<?php echo Functions::path(); ?>product/listing"><?php echo __('List'); ?></a></li>
							<li><a href="<?php echo Functions::path(); ?>product/add"><?php echo __('Add new'); ?></a></li>
							<li><a href="<?php echo Functions::path(); ?>product/modify"><?php echo __('Modify'); ?></a></li>
						</ul>
					</li>
					<li class="menu-second"><?php echo __('Categories'); ?>
						<ul>
							<li><a href="<?php echo Functions::path(); ?>category/listing"><?php echo __('List'); ?></a></li>
							<li><a href="<?php echo Functions::path(); ?>category/add"><?php echo __('Add new'); ?></a></li>
							<li><a href="<?php echo Functions::path(); ?>category/modify"><?php echo __('Modify'); ?></a></li>
						</ul>
					</li>
					<li class="menu-third"><?php echo __('Language'); ?>
						<ul>
							<li><a href="<?php 
								if($_SERVER["REQUEST_URI"] == '/') { echo 'site/index';} else {echo $_SERVER["REQUEST_URI"]; }
								 echo (stristr($_SERVER["REQUEST_URI"],'?') ? '&' : '/?'); ?>lang=hu"><?php echo __('hu'); ?></a></li>
							<li><a href="<?php 
								if($_SERVER["REQUEST_URI"] == '/') { echo 'site/index';} else {echo $_SERVER["REQUEST_URI"]; }
								 echo (stristr($_SERVER["REQUEST_URI"],'?') ? '&' : '/?'); ?>lang=en"><?php echo __('en'); ?></a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div id="panel">
				<p><?php echo $content; ?></p>
			</div>
			<div style="clear:both;"></div>
			<div id="footer">Powered By Jetro © 2013</div>
		</div>
			<?php 
				echo I18n::display();
			?>
    </body>
</html>
<?php if(Config::factory('sitepath.useAJAX')){ ?>
		<script>
			$(document).ready(function(){
				$('.act').on('click',function(event){
					event.preventDefault();
					console.log(this.name);
					$.ajax({
						url: this.href,
						type: 'GET',
						success: function(res) {
							console.log(res);
							$('#panel').html(res);
						}
					});
				});
				$(function() {
					$('#gallery a').lightBox({fixedNavigation:true});
				});
			});
			
		</script>
<?php } ?>