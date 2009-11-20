<?php
	/**
	*	Placeto CMS
	*		A lightweight, easy to use PHP content management system. Written to be as fast as possible and to use as little memory as possible. Placeto forces browser caching, provides gzip compression if necessary and to cut down on bandwidth and cpu time.
	*
	*	Author: Benjamin Jay Young
	*		http://www.blahertech.org/projects/placeto
	*
	*	This source code is released under the GPL License.
	*
	*	//////////////////////////////////////////////////
	*
	*	define.php is to define all nessicary variables and fetches content from the database.
	*
	*	It fetches the tables and stores them in $content and $prefs accordingly.
	**/

	//$location is your URI fetched from .htaccess
	if (isset($_GET['url']))
	{
		$location='/'.$_GET['url'];
	}
	else
	{
		$location=$_SERVER['PHP_SELF'];
	}

	//for those who are trying to view your config or any other file, damn them
	while (stristr($location, '../'))
	{
		$location=str_replace('../', '', $location);
	}

	//used for later
	$path=$location;

	//checks to make sure that $location didn't go wacky
	$location=str_replace('index.php', '', $location);
	if (($config['directory']!=='/' || $config['directory']==NULL) && $config['directory']===substr($location, 0, strlen($config['directory'])))
	{
		$location=substr($location, strlen($config['directory']), strlen($location));
	}
	if (substr($location, strlen($location)-1)==='/' && strlen($location)!==1)
	{
		$location=substr($location, 0, strlen($location)-1);
	}

	//start fetching your tables
	$content=mysql_fetch_assoc(mysql_query('SELECT * FROM '.$prefix.'content WHERE page="'.$location.'"'));
	//$nf = page not found in the db
	$nf=false;
	if ($content==NULL)
	{
		$content=mysql_fetch_assoc(mysql_query('SELECT * FROM '.$prefix.'content WHERE page="/error"'));
		$nf=true;
	}
	$prefs=mysql_fetch_assoc(mysql_query('SELECT * FROM '.$prefix.'preferences'));

	if (!isset($dependent))
	{
		$dependent=$content['dependent'];
	}

	unset($result);
?>