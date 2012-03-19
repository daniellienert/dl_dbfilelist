<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Daniel Lienert <develop@lienert.cc>, Daniel Lienert
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package dl_dbfilelist
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_DlDbfilelist_Controller_FilesController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$filess = $this->filesRepository->findAll();
		$this->view->assign('filess', $filess);
	}

	/**
	 * action show
	 *
	 * @param $files
	 * @return void
	 */
	public function showAction(Tx_DlDbfilelist_Domain_Model_Files $files) {
		$this->view->assign('files', $files);
	}

	/**
	 * action new
	 *
	 * @param $newFiles
	 * @dontvalidate $newFiles
	 * @return void
	 */
	public function newAction(Tx_DlDbfilelist_Domain_Model_Files $newFiles = NULL) {
		$this->view->assign('newFiles', $newFiles);
	}

	/**
	 * action create
	 *
	 * @param $newFiles
	 * @return void
	 */
	public function createAction(Tx_DlDbfilelist_Domain_Model_Files $newFiles) {
		$this->filesRepository->add($newFiles);
		$this->flashMessageContainer->add('Your new Files was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $files
	 * @return void
	 */
	public function editAction(Tx_DlDbfilelist_Domain_Model_Files $files) {
		$this->view->assign('files', $files);
	}

	/**
	 * action update
	 *
	 * @param $files
	 * @return void
	 */
	public function updateAction(Tx_DlDbfilelist_Domain_Model_Files $files) {
		$this->filesRepository->update($files);
		$this->flashMessageContainer->add('Your Files was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $files
	 * @return void
	 */
	public function deleteAction(Tx_DlDbfilelist_Domain_Model_Files $files) {
		$this->filesRepository->remove($files);
		$this->flashMessageContainer->add('Your Files was removed.');
		$this->redirect('list');
	}

}
?>