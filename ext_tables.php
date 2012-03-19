<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Dropbox File List');

t3lib_div::loadTCA('tx_dldropboxsync_domain_model_filemeta');
if (!isset($TCA['tx_dldropboxsync_domain_model_filemeta']['ctrl']['type'])) {
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$TCA['tx_dldropboxsync_domain_model_filemeta']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumns = array();
	$tempColumns[$TCA['tx_dldropboxsync_domain_model_filemeta']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:dl_dbfilelist/Resources/Private/Language/locallang_db.xml:tx_dldbfilelist_domain_model_files.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:dl_dbfilelist/Resources/Private/Language/locallang_db.xml:tx_dldbfilelist_domain_model_files.tx_extbase_type.0','0'),
			),
			'size' => 1,
			'maxitems' => 1,
			'default' => 'Tx_DlDbfilelist_Files'
		)
	);
	t3lib_extMgm::addTCAcolumns('tx_dldropboxsync_domain_model_filemeta', $tempColumns, 1);
}

$TCA['tx_dldropboxsync_domain_model_filemeta']['types']['Tx_DlDbfilelist_Files']['showitem'] = $TCA['tx_dldropboxsync_domain_model_filemeta']['types']['1']['showitem'];
$TCA['tx_dldropboxsync_domain_model_filemeta']['columns'][$TCA['tx_dldropboxsync_domain_model_filemeta']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:dl_dbfilelist/Resources/Private/Language/locallang_db.xml:tx_dldbfilelist_domain_model_files','Tx_DlDbfilelist_Files');
t3lib_extMgm::addToAllTCAtypes('tx_dldropboxsync_domain_model_filemeta', $TCA['tx_dldropboxsync_domain_model_filemeta']['ctrl']['type'],'','after:hidden');

$tmp_dl_dbfilelist_columns = array(

	'downloads' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:dl_dbfilelist/Resources/Private/Language/locallang_db.xml:tx_dldbfilelist_domain_model_files.downloads',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
);

t3lib_extMgm::addTCAcolumns('tx_dldropboxsync_domain_model_filemeta',$tmp_dl_dbfilelist_columns);

$TCA['tx_dldropboxsync_domain_model_filemeta']['columns'][$TCA['tx_dldropboxsync_domain_model_filemeta']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:dl_dbfilelist/Resources/Private/Language/locallang_db.xml:tx_dldropboxsync_domain_model_filemeta.tx_extbase_type.Tx_DlDbfilelist_Files','Tx_DlDbfilelist_Files');

$TCA['tx_dldropboxsync_domain_model_filemeta']['types']['Tx_DlDbfilelist_Files']['showitem'] = $TCA['tx_dldropboxsync_domain_model_filemeta']['types']['1']['showitem'];
$TCA['tx_dldropboxsync_domain_model_filemeta']['types']['Tx_DlDbfilelist_Files']['showitem'] .= ',--div--;LLL:EXT:dl_dbfilelist/Resources/Private/Language/locallang_db.xml:tx_dldbfilelist_domain_model_files,';
$TCA['tx_dldropboxsync_domain_model_filemeta']['types']['Tx_DlDbfilelist_Files']['showitem'] .= 'downloads';

?>