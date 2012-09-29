<?php echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<base href="<?php placeto('base'); ?>" />
		<title><?php placeto('title'); ?></title>
		<meta http-equiv="content-type" name="type" content="text/html; charset=utf-8" />
		<meta http-equiv="content-language" name="language" content="en" />
		<meta name="description" content="<?php placeto('desc'); ?>" />
		<meta name="keywords" content="<?php placeto('keywords'); ?>" />
		<meta name="author" content="Benjamin Jay Young" />
		<meta name="copyright" content="Copyright 2004-2010 BlaherTech" />
		<meta name="revised" content="<?php placeto('lastmod'); ?>" />
		<meta name="robots" content="all" />
		<meta name="viewport" content="width=800" />
		<meta name="google-site-verification" content="ciWWhHl7CRYD3ld36E3yp87My02_THKfSQy8XssU70Y" />
		<meta name="generator" content="Placeto CMS" />
		<!--<meta http-equiv="pics-Label" content='(pics-1.1 "http://www.icra.org/pics/vocabularyv03/" l gen true for "http://blahertech.com" r (n 0 s 0 v 0 l 0 oa 0 ob 0 oc 0 od 0 oe 0 of 0 og 0 oh 0 c 1) gen true for "http://www.blahertech.com" r (n 0 s 0 v 0 l 0 oa 0 ob 0 oc 0 od 0 oe 0 of 0 og 0 oh 0 c 1))' />-->
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
		<link rel="icon" href="/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="/include/styles.css" />
        <link rel="meta" href="http://www.blahertech.com/labels.rdf" type="application/rdf+xml" title="ICRA labels" />
<?php if ($location!=='/')echo '		<link rel="stylesheet" type="text/css" href="/include/inside.css" />',"\n"; ?>
		<link rel="canonical" href="<?php placeto('canonical'); ?>" />
        <!--<script type="text/javascript" src="/include/konami.js"></script>-->
        <script type="text/javascript" src="/include/tracker.js"></script>
<?php if ($location==='/about/portfolio'){?>
        <script type="text/javascript" src="/include/jquery.js"></script>
        <script type="text/javascript" src="/include/portfolio.js"></script>
<?php }?>
	</head>
	<body id="blahertech">
		<div id="stretcher">
		<div id="wrapper">
            <div id="header">
                <div id="logo">
                    <a href="/" tabindex="1" accesskey="h" rel="home" rev="home"><img src="/images/logo.png" alt="<?php placeto('site'); ?>" title="Click to go Home" /></a>
                </div>
<?php
	if ($location!=='/')
	{
?>
                <div id="contact">
                    <h3>Perfect Website Designs</h3>
                    <p>Great looking websites that are semantic, accessible and informative.</p>
                    <p>(330) 353-8533 | <a href="/contact">Contact Us</a></p>
                </div>
<?php
	}
?>
                <ul id="nav">
                    <?php placeto_nav(); ?>
                </ul>
                <br class="clear" />
            </div>
			<br class="clear" />
			<div id="bread"><?php placeto_breadcrumb(); ?></div>
<?php
	if ($location!=='/')
	{
?>
			<form action="/search" id="search"><div>
                <input type="hidden" name="cx" value="partner-pub-3565189203151473:82fz7i-qnxi" />
                <input type="hidden" name="cof" value="FORID:11" />
                <input type="hidden" name="ie" value="UTF-8" />
                <input type="text" name="q" size="32" />
                <input type="image" name="sa" class="img" value="Search" title="Search" src="/images/search.jpg" />
            </div></form>
<?php
	}
?>
			<br class="clear" />
			<h1><?php placeto('header'); ?></h1>
			<?php placeto('content'); ?>
			<br class="clear" />
<?php
	if ($location!=='/')
	{
?>
			<div id="ballon"></div>
<?php
	}
?>
		</div>
<?php
	if ($location==='/')
	{
?>
			<div id="bottom">
            	<ul>
                	<li class="first">
                    	<a href="/about">About the Company</a>
                    	<ul>
                        	<li><a href="/about/history">History</a></li>
                            <li><a href="/about/portfolio">Portfolio</a></li>
                            <li><a href="/about/staff">Staff</a></li>
                            <li><a href="/news">News</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                        </ul>
                    </li>
                    <li>
                    	<a href="/services">Our Services</a>
                    	<ul>
                        	<li><a href="/services/design">Website Design</a></li>
                            <li><a href="/services/hosting">Hosting</a></li>
                            <li><a href="/services/development">Website Development</a></li>
                            <li><a href="/services/database">Database Development</a></li>
                            <li><a href="/services/seo">Advanced Search Engine Optimization</a></li>
                        </ul>
                    </li>
                    <li class="last">
                    	Miscellaneous
                    	<ul>
                        	<li><a href="/">Home</a></li>
                            <li><a href="/prices">Prices</a></li>
                            <li><a href="/search">Search</a></li>
                            <li><a href="/sitemap">Sitemap</a></li>
                            <li><a href="/links">Links</a></li>
                        </ul>
                    </li>
                </ul>
                <br class="clear" /><br />
            </div>
			<div id="ballon"></div>
<?php
	}
?>
        </div>
		<div id="footer">
			<div id="wrap">
				<div class="edge"></div>
                
				<div id="panel">
                    &copy; 2010 BlaherTech, LLC. All rights reserved.<br />
                    Canton, Ohio. &nbsp; Phone: (330) 353-8533
				</div>
				
				<div class="edge"></div>
			</div>

		</div>
	</body>
</html>