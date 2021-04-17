<?php
declare(strict_types=1);

namespace LeanScale\KeyValue\Model\ResourceModel;

class Keyvalue extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('ls_keyvalue', 'id');
    }
}

