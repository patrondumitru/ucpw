<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">	
	<base href="<?php echo $base_url; ?>" />

	<title><?php echo $page_title; ?></title>

	<?php
		foreach ($meta_data as $name => $content)
		{
			if (!empty($content))
				echo "<meta name='$name' content='$content'>".PHP_EOL;
		}
		foreach ($stylesheets as $media => $files)
		{
			foreach ($files as $file)
			{
				$url = starts_with($file, 'http') ? $file : base_url($file);
				echo "<link href='$url' rel='stylesheet' media='$media'>".PHP_EOL;	
			}
		}
		
		foreach ($scripts['head'] as $file)
		{
			$url = starts_with($file, 'http') ? $file : base_url($file);
			echo "<script src='$url'></script>".PHP_EOL;
		}
	?>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<link rel="manifest" href="<?php echo base_url("/assets/dist/favicon/manifest.json");?>">
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url("/favicon/apple-icon-57x57.png");?>">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url("/favicon/apple-icon-60x60.png");?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url("/favicon/apple-icon-72x72.png");?>">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url("/favicon/apple-icon-76x76.png");?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url("/favicon/apple-icon-114x114.png");?>">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url("/favicon/apple-icon-120x120.png");?>">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url("/favicon/apple-icon-144x144.png");?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url("/favicon/apple-icon-152x152.png");?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url("/favicon/apple-icon-180x180.png");?>">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url("/favicon/android-icon-192x192.png");?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url("/favicon/favicon-32x32.png");?>">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url("/favicon/favicon-96x96.png");?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url("/favicon/favicon-16x16.png");?>">
<link rel="manifest" href="<?php echo base_url("/favicon/manifest.json");?>">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo base_url("/favicon/ms-icon-144x144.png");?>">
<meta name="theme-color" content="#ffffff">

</head>
<body class="<?php echo $body_class; ?>" id="page-top">

