<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Dawin.' . $_EXTKEY,
	'Pluginerar',
	array(
		'Post' => 'list, show, last',
		'Author' => 'list, show',
		'Category' => 'list, show',
		'Tag' => 'list, show',
		'Comment' => 'create, list, show',
		
	),
	// non-cacheable actions
	array(
		'Post' => '',
		'Author' => '',
		'Category' => '',
		'Comment' => 'create',
		'Tag' => '',
		
	)
);
