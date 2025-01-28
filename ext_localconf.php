<?php
defined('TYPO3') || die();

call_user_func(function(string $extensionKey) {

    // Typo3 extension manager gearwheel icon (ext_conf_template.txt)
    $extensionConfiguration = $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS'][$extensionKey];
    $rtePresets = $extensionConfiguration['rtePresets'];

    // Register own rte ckeditor config which comes from lines above
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['rte_checkboxlink'] = $rtePresets;

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
        'plugin.tx_powermail.settings.setup.textToRichText = '.$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['hh_powermail_checkboxlink']['textToRichText']
    );
}, 'hh_powermail_checkboxlink');
