<!DOCTYPE HTML>
<html>
<head>
	<title><?php echo $title ?> </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
    <?php if(!isset($description))
    {
    $description="Treasure hunt competition for adwaita 2013 Women in Engineering ";
    }
    ?>
    <meta name="description" content="<?php echo $description;?>">
    <meta name="author" content="tachyons creations">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set content to full screen on iphones -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!--[if lte IE 6]>
		<link rel="stylesheet" href="//universal-ie6-css.googlecode.com/files/ie6.1.1.css" media="screen, projection">
	<![endif]-->

	<!--[if !lte IE 6]><!-->
        <!-- Load Google Web Font -->
    	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
        <!-- Load style.css: contains all css files concatenated to one single file -->
        <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
		<!--<![endif]-->

		<!-- Load HTMLShiv for IE9 HTML5 support -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->	
		<!--[if lt IE 7]>
			<link href="assets/css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->
		<!-- Your Favoriate Icons -->
		<link rel="shortcut icon" href="<?php echo base_url() ?>assets/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() ?>assets/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() ?>assets/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() ?>assets/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>assets/ico/apple-touch-icon-57-precomposed.png">
    
</head>
<body>
<div id="wrap">
