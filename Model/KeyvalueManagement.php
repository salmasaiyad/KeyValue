<?php
declare(strict_types=1);

namespace LeanScale\KeyValue\Model;

use LeanScale\KeyValue\Model\KeyvalueRepository;

class KeyvalueManagement implements \LeanScale\KeyValue\Api\KeyvalueManagementInterface
{
    protected $keyvalueFactory;

    /**
     * @param KeyvalueRepository $keyvalueFactory
     */
    public function __construct(
        KeyvalueRepository $keyvalueFactory
    ) {
        $this->keyvalueFactory = $keyvalueFactory;
    }

    public function getKeyvalue($param){
        return 'api GET return the $param ' . $param;
    }
    /**
     * {@inheritdoc}
     */
    public function postKeyvalue(\LeanScale\KeyValue\Api\Data\KeyValueInterface $keyvalue)
    {
        return $this->keyvalueFactory->update($keyvalue);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteKeyvalue($param)
    {
        return 'llll';
        //return $this->keyvalueFactory->deleteByCode($param);
    }
}

