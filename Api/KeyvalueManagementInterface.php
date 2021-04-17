<?php
declare(strict_types=1);

namespace LeanScale\KeyValue\Api;

interface KeyvalueManagementInterface
{

    /**
     * GET for keyvalue api
     * @param string $param
     * @return string
     */
    public function getKeyvalue($param);

     /**
     * Update for keyvalue api
     *
     * @param \LeanScale\KeyValue\Api\Data\KeyValueInterface $keyvalue
     * @return \LeanScale\KeyValue\Api\Data\KeyValueInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function postKeyvalue(\LeanScale\KeyValue\Api\Data\KeyValueInterface $keyvalue);

    /**
     * DELETE for keyvalue api
     * @param string $param
     * @return string
     */
    public function deleteKeyvalue($param);
}

