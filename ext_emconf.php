<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "hh_powermail_checkboxlink"
 *
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF['hh_powermail_checkboxlink'] = [
    'title' => 'Hauer-Heinrich - Checkbox field with RTE for EXT:powermail',
    'description' => 'Additional field for EXT:powermail. Adds one checkbox with RTE as Label/Description. Usage for e. g. gdpr-checkbox with link.',
    'category' => 'plugin',
    'author' => 'Christian Hackl',
    'author_email' => 'web@hauer-heinrich.de',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '0.2.0',
    'constraints' => [
        'depends' => [
            'php' => '>=8.2.0',
            'typo3' => '12.4.0-13.4.99',
            'extbase' => '12.4.0-13.4.99',
            'fluid' => '12.4.0-13.4.99',
            'powermail'=> '8.0.0-13.0.99'
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'HauerHeinrich\\HhPowermailCheckboxlink\\' => 'Classes'
        ],
    ],
];
