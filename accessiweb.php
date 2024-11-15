<?php
/**
 * @package    Joomla.Plugin.System.AccessiWeb
 * @copyright  Copyright (C) 2024 Dunp scpl. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
 
defined('_JEXEC') or die;

class PlgSystemAccessiweb extends \Joomla\CMS\Plugin\CMSPlugin
{
    public function onAfterRender()
    {
        $app = \Joomla\CMS\Factory::getApplication();
        
        // Verifica che siamo nel frontend
        if ($app->isClient('site')) {
            // Recupera i parametri dal backend
            $licenseKey = $this->params->get('licenseKey', '');
            $primaryColor = $this->params->get('primaryColor', '#0d6efd');
            $positionX = $this->params->get('positionX', 'left');
            $positionY = $this->params->get('positionY', 'bottom');
            $offsetX = $this->params->get('offsetX', 10);
            $offsetY = $this->params->get('offsetY', 10);
            $unitX = $this->params->get('unitX', 'px');
            $unitY = $this->params->get('unitY', 'px');
            $iconSize = $this->params->get('iconSize', 'medium');
            
            // Script da iniettare nel footer della pagina
            $script = '
            <script>
            (function(){
                const s = document.createElement("script"),
                e = !document.body ? document.querySelector("head") : document.body;
                s.src = "https://www.accessiweb.it/widget/acsw.js";
                s.async = true;
                s.onload = function(){
                    acsw.init({
                        LicenseKey: "' . $licenseKey . '",
                        PrimaryColor: "' . $primaryColor . '",
                        PositionX: "' . $positionX . '",
                        PositionY: "' . $positionY . '",
                        OffsetX: ' . $offsetX . ',
                        OffsetY: ' . $offsetY . ',
                        UnitX: "' . $unitX . '",
                        UnitY: "' . $unitY . '",
                        IconSize: "' . $iconSize . '"
                    });
                };
                e.appendChild(s);
            })();
            </script>';

            // Recupera il corpo della pagina
            $body = $app->getBody();

            // Inietta lo script prima del tag di chiusura </body>
            $body = str_replace('</body>', $script . '</body>', $body);

            // Aggiorna il corpo della pagina con il nuovo contenuto
            $app->setBody($body);
        }
    }
}
