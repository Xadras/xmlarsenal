<?php

/**
 * pvprewards.php
 * 
 * The script handles caching and output of the pvprewards.xml with respective values.
 *
 * @author Amras Taralom <amras-taralom@streber24.de>
 * @version 1.0, last modified 2009/10/10
 * @package XMLArsenal
 * @license http://opensource.org/licenses/gpl-3.0.html GNU General Public License version 3 (GPLv3)
 *
*/

require_once './includes/autoload.inc.php';
require_once './includes/config.inc.php';
require_once './includes/functions.inc.php';

echo fgettemplate('./xml-templates/pvprewards.xml', array('LANGUAGE'=>$language));


?>