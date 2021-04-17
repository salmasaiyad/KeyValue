<?php
declare(strict_types=1);

namespace LeanScale\KeyValue\Api\Data;

interface KeyvalueSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Keyvalue list.
     * @return \LeanScale\KeyValue\Api\Data\KeyvalueInterface[]
     */
    public function getItems();

    /**
     * Set key list.
     * @param \LeanScale\KeyValue\Api\Data\KeyvalueInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

