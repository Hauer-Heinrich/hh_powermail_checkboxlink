<?php
defined('TYPO3') || die();

call_user_func(function(string $extensionKey) {
    // make PageTsConfig selectable
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        $extensionKey,
        'Configuration/TsConfig/AllPage.tsconfig',
        'EXT:'.$extensionKey.' :: Powermail Checkbox Link'
    );
}, 'hh_powermail_checkboxlink');
