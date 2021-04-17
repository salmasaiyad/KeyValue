<?php
declare(strict_types=1);

namespace LeanScale\KeyValue\Api\Data;

interface KeyvalueInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const KEYVALUE_ID = 'id';
    const VALUE = 'value';
    const KEY = 'key';

    /**
     * Get id
     * @return string|null
     */
    public function getKeyvalueId();

    /**
     * Set id
     * @param string $keyvalueId
     * @return \LeanScale\KeyValue\Api\Data\KeyvalueInterface
     */
    public function setKeyvalueId($keyvalueId);

    /**
     * Get key
     * @return string|null
     */
    public function getKey();

    /**
     * Set key
     * @param string $key
     * @return \LeanScale\KeyValue\Api\Data\KeyvalueInterface
     */
    public function setKey($key);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \LeanScale\KeyValue\Api\Data\KeyvalueExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \LeanScale\KeyValue\Api\Data\KeyvalueExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \LeanScale\KeyValue\Api\Data\KeyvalueExtensionInterface $extensionAttributes
    );

    /**
     * Get value
     * @return string|null
     */
    public function getValue();

    /**
     * Set value
     * @param string $value
     * @return \LeanScale\KeyValue\Api\Data\KeyvalueInterface
     */
    public function setValue($value);
}

