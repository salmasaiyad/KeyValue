<?php
declare(strict_types=1);

namespace LeanScale\KeyValue\Model;

use LeanScale\KeyValue\Api\Data\KeyvalueInterface;
use LeanScale\KeyValue\Api\Data\KeyvalueInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Keyvalue extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'leanscale_keyvalue_keyvalue';
    protected $dataObjectHelper;

    protected $keyvalueDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param KeyvalueInterfaceFactory $keyvalueDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \LeanScale\KeyValue\Model\ResourceModel\Keyvalue $resource
     * @param \LeanScale\KeyValue\Model\ResourceModel\Keyvalue\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        KeyvalueInterfaceFactory $keyvalueDataFactory,
        DataObjectHelper $dataObjectHelper,
        \LeanScale\KeyValue\Model\ResourceModel\Keyvalue $resource,
        \LeanScale\KeyValue\Model\ResourceModel\Keyvalue\Collection $resourceCollection,
        array $data = []
    ) {
        $this->keyvalueDataFactory = $keyvalueDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve keyvalue model with keyvalue data
     * @return KeyvalueInterface
     */
    public function getDataModel()
    {
        $keyvalueData = $this->getData();
        
        $keyvalueDataObject = $this->keyvalueDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $keyvalueDataObject,
            $keyvalueData,
            KeyvalueInterface::class
        );
        
        return $keyvalueDataObject;
    }
}

