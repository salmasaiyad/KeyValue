<?php
declare(strict_types=1);

namespace LeanScale\KeyValue\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface KeyvalueRepositoryInterface
{

    /**
     * Save Keyvalue
     * @param \LeanScale\KeyValue\Api\Data\KeyvalueInterface $keyvalue
     * @return \LeanScale\KeyValue\Api\Data\KeyvalueInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \LeanScale\KeyValue\Api\Data\KeyvalueInterface $keyvalue
    );

    /**
     * Update Keyvalue
     * @param \LeanScale\KeyValue\Api\Data\KeyvalueInterface $keyvalue
     * @return \LeanScale\KeyValue\Api\Data\KeyvalueInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
     public function update(
        \LeanScale\KeyValue\Api\Data\KeyvalueInterface $keyvalue
    );
    
    /**
     * Retrieve Keyvalue
     * @param string $keyvalueId
     * @return \LeanScale\KeyValue\Api\Data\KeyvalueInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
     public function getByCode($keyvalueId);

    /**
     * Retrieve Keyvalue
     * @param string $keyvalueId
     * @return \LeanScale\KeyValue\Api\Data\KeyvalueInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($keyvalueId);
    
    /**
     * Retrieve all data.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \LeanScale\KeyValue\Api\Data\KeyvalueSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getAllData ();

    /**
     * Retrieve Keyvalue matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \LeanScale\KeyValue\Api\Data\KeyvalueSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
     public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria 
    );

    /**
     * Delete Keyvalue
     * @param \LeanScale\KeyValue\Api\Data\KeyvalueInterface $keyvalue
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \LeanScale\KeyValue\Api\Data\KeyvalueInterface $keyvalue
    );

    /**
     * Delete Keyvalue by ID
     * @param string $keyvalueId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($keyvalueId);

    /**
     * Delete Keyvalue by CODE
     * @param string $keyvalueId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
     public function deleteByCode($keyvalueId);
}

