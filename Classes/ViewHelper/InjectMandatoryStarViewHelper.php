<?php
namespace HauerHeinrich\HhPowermailCheckboxlink\ViewHelper;

/***************************************************************
 * Copyright notice
 *
 * (c) 2025 Christian Hackl <https://github.com/teisi>
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 *
 * **************************************************************
 * ViewHelper to inject mandatory star into content (text) if css "nolabel" is set and field is "mandatory"
 *
 * Example:
 * <html xmlns:f="http://typo3.org/ns/TYPO3/CMS/Fluid/ViewHelpers"
 *   xmlns:hhpcb="http://typo3.org/ns/HauerHeinrich/HhPowermailCheckboxlink/ViewHelper"
 *   data-namespace-typo3-fluid="true">
 *
 * <f:format.html><hhpcb:injectMandatoryStar content="{field.text}" mandatory="{field.mandatory}" fieldCss="{field.css}" /></f:format.html>
 */

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class InjectMandatoryStarViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('content', 'string', 'RTE content', true);
        $this->registerArgument('mandatory', 'bool', 'Is field mandatory?', false, false);
        $this->registerArgument('fieldCss', 'string', 'CSS classes of field', false, '');
    }

    public function render() {
        $content = $this->arguments['content'];
        $mandatory = (bool)$this->arguments['mandatory'];
        $fieldCss = (string)$this->arguments['fieldCss'];

        // Nur wenn mandatory UND nolabel - wenn nolabel nicht gesetzt ist, nichts tun da das Sternchen schon im Label ist
        if (!$mandatory || stripos($fieldCss, 'nolabel') === false) {
            return $content;
        }

        $star = ' <span class="mandatory">*</span>';

        // Prüfen ob HTML-Tags vorhanden sind
        if (!preg_match('/<\/[^>]+>$/', trim($content))) {
            // Kein HTML vorhanden dann sternachen hinten anhängen
            return $content . $star;
        }

        // ansonsten vor dem letzten schließenden Tag einfügen
        return preg_replace('/(<\/[^>]+>\s*)$/', $star . '$1', $content, 1);
    }
}
