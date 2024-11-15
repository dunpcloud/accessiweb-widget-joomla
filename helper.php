<?php
/**
 * @package    Joomla.Plugin.System.AccessiWeb
 * @copyright  Copyright (C) 2024 Dunp scpl. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// Impedisce l'accesso diretto al file
defined('_JEXEC') or die;

// Helper class for AccessiWeb plugin
class AccessiwebHelper
{
    public static function getAccessWidgetHTML()
    {
        return '<div class="accessiweb-widget">AccessiWeb: Accessibilità per tutti.</div>';
    }
}
