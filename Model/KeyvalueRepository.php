<?php
declare(strict_types=1);

namespace LeanScale\KeyValue\Model;

use LeanScale\KeyValue\Api\Data\KeyvalueInterfaceFactory;
use LeanScale\KeyValue\Api\Data\KeyvalueSearchResultsInterfaceFactory;
use LeanScale\KeyValue\Api\KeyvalueRepositoryInterface;
use LeanScale\KeyValue\Model\ResourceModel\Keyvalue as ResourceKeyvalue;
use LeanScale\KeyValue\Model\ResourceModel\Keyvalue\CollectionFactory as KeyvalueCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

class KeyvalueRepository implements KeyvalueRepositoryInterface
{

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $searchResultsFactory;

    protected $keyvalueCollectionFactory;

    protected $keyvalueFactory;

    private $storeManager;

    protected $dataObjectHelper;

    protected $dataKeyvalueFactory;

    protected $dataObjectProcessor;

    protected $searchCriteriaBuilder;

    private $collectionProcessor;

    protected $extensionAttributesJoinProcessor;
    /**
     * @param ResourceKeyvalue $resource
     * @param KeyvalueFactory $keyvalueFactory
     * @param KeyvalueInterfaceFactory $dataKeyvalueFactory
     * @param KeyvalueCollectionFactory $keyvalueCollectionFactory
     * @param KeyvalueSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        ResourceKeyvalue $resource,
        KeyvalueFactory $keyvalueFactory,
        KeyvalueInterfaceFactory $dataKeyvalueFactory,
        KeyvalueCollectionFactory $keyvalueCollectionFactory,
        KeyvalueSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->resource = $resource;
        $this->keyvalueFactory = $keyvalueFactory;
        $this->keyvalueCollectionFactory = $keyvalueCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataKeyvalueFactory = $dataKeyvalueFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \LeanScale\KeyValue\Api\Data\KeyvalueInterface $keyvalue
    ) {
        /* if (empty($keyvalue->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $keyvalue->setStoreId($storeId);
        } */
        $keyvalueData = $this->extensibleDataObjectConverter->toNestedArray(
            $keyvalue,
            [],
            \LeanScale\KeyValue\Api\Data\KeyvalueInterface::class
        );
        
        $keyvalueModel = $this->keyvalueFactory->create()->setData($keyvalueData);
        
        try {
            $this->resource->save($keyvalueModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the keyvalue: %1',
                $exception->getMessage()
            ));
        }
        return $keyvalueModel->getDataModel();
    }
    /**
     * {@inheritdoc}
     */
     public function update(
        \LeanScale\KeyValue\Api\Data\KeyvalueInterface $keyvalue
    ) {
        /* if (empty($keyvalue->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $keyvalue->setStoreId($storeId);
        } */
        $keyValueModel = $this->getByCode($keyvalue->getKey());
        $keyvalueData = $this->extensibleDataObjectConverter->toNestedArray(
            $keyvalue,
            [],
            \LeanScale\KeyValue\Api\Data\KeyvalueInterface::class
        );
        $keyvalueModel = $this->keyvalueFactory->create()->load($keyvalue->getKey(),'key')->setValue($keyvalue->getValue());
        
        try {
            $this->resource->save($keyvalueModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the keyvalue: %1',
                $exception->getMessage()
            ));
        }
        return $keyvalueModel->getDataModel();
    }
    /**
     * {@inheritdoc}
     */
    public function getByCode($keyvalueId)
    {
        $keyvalue = $this->keyvalueFactory->create();
        // $keyvalue->load($keyvalueId,'key');
        $this->resource->load($keyvalue, $keyvalueId,'key');
        if (!$keyvalue->getId()) {
            throw new NoSuchEntityException(__("Keyvalue with code \"%1\" does not exist.", $keyvalueId));
        }
        return $keyvalue->getDataModel();
    }
    /**
     * {@inheritdoc}
     */
     public function get($keyvalueId)
     {
         $keyvalue = $this->keyvalueFactory->create();
         //$keyvalue->load($keyvalueId,'key');
         $this->resource->load($keyvalue, $keyvalueId);
         if (!$keyvalue->getId()) {
             throw new NoSuchEntityException(__("Keyvalue with id \"%1\" does not exist.", $keyvalueId));
         }
         return $keyvalue->getDataModel();
     }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->keyvalueCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \LeanScale\KeyValue\Api\Data\KeyvalueInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
     public function getAllData() {
        $collection = $this->keyvalueCollectionFactory->create();
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getData();
        }
        return $items;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \LeanScale\KeyValue\Api\Data\KeyvalueInterface $keyvalue
    ) {
        try {
            $keyvalueModel = $this->keyvalueFactory->create();
            $this->resource->load($keyvalueModel, $keyvalue->getKeyvalueId());
            $this->resource->delete($keyvalueModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Keyvalue: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($keyvalueId)
    {
        return $this->delete($this->get($keyvalueId));
    }
    /**
     * {@inheritdoc}
     */
    public function deleteByCode($keyvalueId)
    {
        try {
            $keyvalueModel = $this->keyvalueFactory->create();
            $this->resource->load($keyvalueModel, $keyvalueId, 'key');
            if (!$keyvalueModel->getId()) {
                throw new NoSuchEntityException(__("Keyvalue with id '%1' does not exist.", $keyvalueId));
            }
            $this->resource->delete($keyvalueModel);
            return true;
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Keyvalue: %1',
                $exception->getMessage()
            ));
        }
        return false;
    }
}

