<?php
   /**
	*	Placeto CMS.
	*		A lightweight, easy to use PHP content management system. Written
	*		to be as fast as possible and to use as little memory as possible.
	*		Placeto provides browser caching, server caching, deflating, and
	*		gzip compression, if necessary to cut down on bandwidth and cpu
	*		usage.
	*
	*	Engine.
	*		The engine is what handles the requested content and generates
	*		everything on demand, manipulating what needs to be where and what
	*		is provided, based on what is in the database, template, and
	*		modules.
	*
	*	@package placeto
	*	@subpackage engine
	*	@version 1.0.5
	*
	*	@author Benjamin Jay Young <blaher@blahertech.org>
	*	@link http://www.blahertech.org/projects/placeto/ Placeto CMS
	*	@link http://www.blahertech.org/ BlaherTech.org
	*	@license http://www.gnu.org/licenses/gpl.html GPL v3
	*	@copyright BlaherTech 2009-2011
	*
	*	This program is free software: you can redistribute it and/or modify it
	*	under the terms of the GNU General Public License as published by the
	*	Free Software Foundation, either version 3 of the License, or (at your
	*	option) any later version. This program is distributed in the hope that
	*	it will be useful,  but WITHOUT ANY WARRANTY; without even the implied
	*	warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See
	*	the GNU General Public License for more details. You should have
	*	received a copy of the GNU General Public License along with this
	*	program, as license.txt.  If not, see <http://www.gnu.org/licenses/>.
	*/

	define('TOKEN', '30c42e373acf6f3322f72875e59e677d'); // md5('placeto_token')

	// checks base
	if (!isset($BASE))
	{
		// TODO: Add better support for finding it, if it's not set.
		$BASE='./';
	}
	// multiple site support check
	if (!isset($CONFIG_NAME))
	{
		// TODO: Check if the default exists, if not, get one that exists.
		$CONFIG_NAME='default.config.php';
	}
	else if (substr(strrev($CONFIG_NAME), 0, 4)!=='php.')
	{
		$CONFIG_NAME.='.php';
	}

	// make sure that config.php is ready or go to setup
	if (!file_exists($BASE.'placeto/config/'.$CONFIG_NAME))
	{
		header('Location: '.$BASE.'placeto/setup');
		die();
	}
	
	require_once($BASE.'placeto/config/'.$CONFIG_NAME);
	require_once($BASE.'placeto/library/placeto.class.php');
	require_once($BASE.'placeto/library/common.functions.php');
	$CONFIG['base']=$BASE;
	$placeto=new Placeto($DATABASE, $CONFIG);

	unset($CONFIG, $CONFIG_NAME, $DATABASE, $BASE);

	if (isset($DEPENDENT))
	{
		$placeto->content->dependent->set($DEPENDENT);
		unset($DEPENDENT);
	}

	//TODO: Put this in to placeto->modules
	//include_once($placeto->config->base().'placeto/engine/modules.php');
	
/*//*/if ($_GET['vars']=='true') {var_dump(get_defined_vars());}

	if ($placeto->content->found===false)
	{
		// used for files in the template
		require('reattach.php'); //TODO: Put this in to placeto->template
	}
	else if
	(
		$placeto->content->dependent==='1'
		|| (
			$placeto->content->dependent==='2'
			&& isset($_GET[$placeto->content->dependent->param])
		)
	)
	{
		// independent pages in the db
		eval('?>'.$placeto->content->main);
		//placeto_mod_end();
	}
	else
	{
		// normal pages in the db
		$placeto->display(); // stop, template time!
		//placeto_mod_end();
	}

	// watch Asta swim away and await for his next request
	//include('cleanup.php');

	if (isset($TIME))
	{
		$TIME=microtime(true)-$TIME;
		echo '<!-- Page Fetched in: ',$TIME,' seconds. -->';
	}
	exit(0); // 0 means success
?>