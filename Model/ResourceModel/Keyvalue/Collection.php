<?php
declare(strict_types=1);

namespace LeanScale\KeyValue\Model\ResourceModel\Keyvalue;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \LeanScale\KeyValue\Model\Keyvalue::class,
            \LeanScale\KeyValue\Model\ResourceModel\Keyvalue::class
        );
    }
}

