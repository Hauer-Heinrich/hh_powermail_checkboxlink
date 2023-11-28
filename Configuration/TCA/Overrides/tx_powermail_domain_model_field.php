<?php
defined('TYPO3') || die();

$extensionKey = 'hh_powermail_checkboxlink';

// Typo3 extension manager gearwheel icon (ext_conf_template.txt)
$extensionConfiguration = $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS'][$extensionKey];
$textToRichText = $extensionConfiguration['textToRichText'];

/**
 * extend powermail fields tx_powermail_domain_model_field
 */
$rteColumn = [];
$tempColumns = [
    'prefill_value' => [
        'label' => 'LLL:EXT:hh_powermail_checkboxlink/Resources/Private/Language/locallang.xlf:rte_checkboxlink_value.label',
        'description' => 'LLL:EXT:hh_powermail_checkboxlink/Resources/Private/Language/locallang.xlf:rte_checkboxlink_value.description',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'max' => 255,
            'eval' => 'trim',
        ]
    ],
    'text' => [
        'label' => 'LLL:EXT:hh_powermail_checkboxlink/Resources/Private/Language/locallang.xlf:data_protection_text.label',
        'config' => [
            'enableRichtext' => true,
            'richtextConfiguration' => 'rte_checkboxlink',
            'eval' => 'trim',
        ]
    ],
];
if ($textToRichText === '1') {
    $rteColumn = [
        'text' => [
            'config' => [
                'enableRichtext' => true,
                'richtextConfiguration' => 'rte_checkboxlink',
                'eval' => 'trim',
            ]
        ]
    ];

    $GLOBALS['TCA']['tx_powermail_domain_model_field']['types']['text'] = [
        'showitem' => $GLOBALS['TCA']['tx_powermail_domain_model_field']['types']['text']['showitem'],
        'columnsOverrides' => [...$rteColumn]
    ];

    // \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    //     'tx_powermail_domain_model_field',
    //     array_merge($tempColumns, $rteColumn)
    // );
}

$GLOBALS['TCA']['tx_powermail_domain_model_field']['types']['rte_checkboxlink'] = [
    'showitem' => '
        title,
        type,
        text,
        prefill_value,
        --div--;LLL:EXT:powermail/Resources/Private/Language/locallang_db.xlf:tx_powermail_domain_model_field.sheet1,
            mandatory,
            --palette--;Layout;43,
            --palette--;LLL:EXT:powermail/Resources/Private/Language/locallang_db.xlf:tx_powermail_domain_model_field.marker_title;5,
        --div--;LLL:EXT:powermail/Resources/Private/Language/locallang_db.xlf:tabs.access,
            sys_language_uid,
            l10n_parent,
            l10n_diffsource,
            hidden,
            starttime,
            endtime
    ',
    'columnsOverrides' => [...$tempColumns]
];
