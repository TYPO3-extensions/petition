<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Guy Sinden <sinden@abis-freiburg.de>
 *  Bastian Bringenberg <typo3@bastian-bringenberg.de>, Bastian Bringenberg
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
 * @package petiton
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Petition_Domain_Repository_PetitionsEntryRepository extends Tx_Extbase_Persistence_Repository {
    protected $defaultOrderings = array ('uid' => Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING);

    public function findByPetition($petition){
        $query = $this->createQuery();
        $query->matching($query->logicalAnd($query->equals('hidden', '0'), $query->equals('petition', $petition)));
        $query->setOrderings($this->defaultOrderings);
        return $query->execute();
    }

	/**
	 * Find hidden petitionsEntry by UID
	 *
	 * @var int $uid The entries UID
	**/
    public function findHiddenByUid($uid){
        $query = $this->createQuery();
		$query->getQuerySettings()->setRespectEnableFields(false);
        $query->matching($query->logicalAnd($query->equals('hidden', '1'), $query->equals('uid', $uid)));
        $query->setOrderings($this->defaultOrderings);
        return $query->execute();
    }
}
?>
