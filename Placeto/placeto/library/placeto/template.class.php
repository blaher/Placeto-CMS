<?php
   /**
	*	Placeto CMS.
	*		A lightweight, easy to use PHP content management system. Written
	*		to be as fast as possible and to use as little memory as possible.
	*		Placeto provides browser caching, server caching, deflating, and
	*		gzip compression, if necessary to cut down on bandwidth and cpu
	*		usage.
	*
	*	Class.
	*		This is the main abstraction class to fetch all needed data, from
	*		the database and other data resources.
	*
	*	@package placeto
	*	@subpackage class
	*	@version 1.0.4
	*
	*	@author Benjamin Jay Young <blaher@blahertech.org>
	*	@link http://www.blahertech.org/projects/placeto/ Placeto CMS
	*	@link http://www.blahertech.org/ BlaherTech.org
	*	@license http://www.gnu.org/licenses/gpl.html GPL v3
	*	@copyright BlaherTech 2009-2012
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
	* The main template class.
	*
	* @version 1.1
	* @author Benjamin Jay Young <blaher@blahertech.org>
	*
	* @param string $strBase Recycle the base to include.
    * @param string $strTemplate The template folder to use.
    * @param string $strParent OPTIONAL:The parent to fallback on, if one.
	*/
	class placeto_Template
	{
		public $p;
		private $strTemplate, $strParent, $strBase;
		
		public function __construct
		(
			P &$p, $strBase, $strTemplate, $strParent=false
		)
		{
			$this->strBase=$strBase.'placeto/templates/';
			$this->set($strTemplate, $strParent);
			
			$this->p=$p;
		}
		
		public function set($strTemplate, $strParent=false)
		{
			$this->strTemplate=$strTemplate;
			$this->strParent=$strParent;
			
			return true;
		}
		
		public function load($strTemplate)
		{
			$p=&$this->p;
		
			return @include($this->strBase.$this->strTemplate.'/'.$strTemplate);
		}
	}
?>