<?php

$EM_CONF[$_EXTKEY] = array (
	'title' => 'EXT:find goodies',
	'description' => '',
	'category' => 'plugin',
	'version' => '1.0.0',
	'state' => 'stable',
	'clearcacheonload' => true,
	'author' => '',
	'author_email' => '',
	'constraints' =>
	array (
		'depends' =>
		array (
			'typo3' => '7.6.0-8.9.99',
		),
		'conflicts' =>
		array (
		),
		'suggests' =>
		array (
		),
	),
	'uploadfolder' => true,
	'createDirs' => '',
	'author_company' => '',
    'autoload' => [
        'psr-4' => [
            ["CedricZiel\\FindGoodies\\" => "Classes/"]
        ]
    ]
);
