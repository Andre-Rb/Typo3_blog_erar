<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Dawin.' . $_EXTKEY,
	'Pluginerar',
	'BlogPlugin_Eraud-Arabe'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_pluginerar';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_pluginerar.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Blog_Eraud-Arabe');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_blogerar_domain_model_post', 'EXT:blog_erar/Resources/Private/Language/locallang_csh_tx_blogerar_domain_model_post.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_blogerar_domain_model_post');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_blogerar_domain_model_author', 'EXT:blog_erar/Resources/Private/Language/locallang_csh_tx_blogerar_domain_model_author.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_blogerar_domain_model_author');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_blogerar_domain_model_category', 'EXT:blog_erar/Resources/Private/Language/locallang_csh_tx_blogerar_domain_model_category.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_blogerar_domain_model_category');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_blogerar_domain_model_comment', 'EXT:blog_erar/Resources/Private/Language/locallang_csh_tx_blogerar_domain_model_comment.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_blogerar_domain_model_comment');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_blogerar_domain_model_tag', 'EXT:blog_erar/Resources/Private/Language/locallang_csh_tx_blogerar_domain_model_tag.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_blogerar_domain_model_tag');
