<?php
   /**
	*	Placeto CMS.
	*		A lightweight, easy to use PHP content management system. Written
	*		to be as fast as possible and to use as little memory as possible.
	*		Placeto provides browser caching, server caching, deflating, and
	*		gzip compression, if necessary to cut down on bandwidth and cpu
	*		usage.
	*
	*	Example Config
    *		Here's an example config file, in the case you wish to manually
    *		make one, instead of using the setup tool.
	*
	*	@package placeto
	*	@subpackage config
	*	@version 1.2
	*
	*	@author Benjamin Jay Young <blaher@blahertech.org>
	*	@link http://www.blahertech.org/projects/placeto/ Placeto CMS
	*	@link http://www.blahertech.org/ BlaherTech.org
	*	@license http://www.gnu.org/licenses/gpl.html GPL v3
	*	@copyright BlaherTech 2009-2010
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

   /**
    * @name $config
    * @global array $config The array of set attributes of the site configuration.
	*/
	$config=array();
	// url of domain, no directory
	$config['site']='http://placeto.blahertech.net';
	// entire url directory of placement, no ending '/'
	$config['directory']='/beta';

   /**
	* @name $database
    * @global array $database The array of set attributes of the database conenction.
	*/
	$database=array();
	// database type: mysql, oci (Oracle), sqlite, pgsql (PostgreSQL), informix
	$database['type']='mysql';
	// server location, most likely 'localhost'
	$database['host']='localhost';
	// the user name you login with
	$database['user']='blaherte_placeto';
	// the password
	$database['pass']='90marcusofotecalp09';
	// the database that placeto goes in
	$database['dbname']='blaherte_plbeta';
	// the table prefixes
	$database['prefix']='placeto_';

	// the encoding type
	$config['encoding']='utf-8';
	// your mime-type and encoding string
	$config['mimetype']='text/html';
?>