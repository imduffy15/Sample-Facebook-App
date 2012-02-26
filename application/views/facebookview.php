<?php
	if(isset($loginUrl)) { //This setups the redirect if the app requires authorization
	?>
		<script type="text/javascript">
		    top.location.href = '<? echo $loginUrl; ?>'
		</script>
	<?
		exit;
	}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
	  xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
		<link href="<?php echo base_url(); ?>static/styles/SampleApp.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
			var SampleApp = {};
			SampleApp.config = {};
			SampleApp.config.staticRoot = "<?php echo base_url(); ?>static/";
			SampleApp.config.fbAppRoot = "<?php echo $appUrl; ?>/";
			SampleApp.config.appId = "<?php echo $appId; ?>";
		</script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>static/js/SampleApp.js"></script>
	</head>
	<body>	
		<div class="header">
			<h1><span style="color:red">Friend</span> Collage</h1>
		</div>
		<div class="container">
		<?php
			foreach($friends_list['data'] as $friend) {
				echo '<img src="http://graph.facebook.com/'.$friend['id'].'/picture" />';
			}
		?>
		</div>
		<div id="fb-root"></div>
	</body>
</html>