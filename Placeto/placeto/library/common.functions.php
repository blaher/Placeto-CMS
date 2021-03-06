<?php
   /**
	*	Placeto CMS.
	*		A lightweight, easy to use PHP content management system. Written
	*		to be as fast as possible and to use as little memory as possible.
	*		Placeto provides browser caching, server caching, deflating, and
	*		gzip compression, if necessary to cut down on bandwidth and cpu
	*		usage.
	*
	*	Common Functions.
	*		A list of all commonly used functions.
	*
	*	@package placeto
	*	@subpackage class
	*	@version 2.3
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

	// returns the mime type of a given known web extension,
	// this is mostly used in the reattachment of you template includes.
   /**
	* Fetches the MIME type of an file extension.
	*
	* @version 1.0
	* @author Benjamin Jay Young <blaher@blahertech.org>
	*
	* @access public
    * @param string $strExtension Extension (e.g. '.png', '.gif', '.jpeg').
    * @param string $strBase The base, easily grabbed from the placeto object.
	* @return string MIME type of extension.
	*/
	function placeto_extension(&$strExtension, &$strBase='./')
	{
		// TODO: Add support if they sent the param as the entire file name.
		include($strBase.'placeto/library/resources/array/extensions.array.php');
		if (isset($aryExtensions[$strExtension]))
		{
			// if we have a match
			return $aryExtensions[$strExtension];
		}
		else
		{
			// eeerrrrrrr!!!!
			unset($aryExtensions);
			return false;
		}
	}
?>
