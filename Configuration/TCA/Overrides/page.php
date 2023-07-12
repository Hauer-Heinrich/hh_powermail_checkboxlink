<?php
defined('TYPO3') || die();

call_user_func(function() {
    $extensionKey = 'hh_powermail_checkboxlink';

    // make PageTsConfig selectable
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        $extensionKey,
        'Configuration/TsConfig/AllPage.typoscript',
        'EXT:'.$extensionKey.' :: Powermail Checkbox Link'
    );
});
