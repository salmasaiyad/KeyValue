<?php
declare(strict_types=1);

namespace LeanScale\KeyValue\Model\Data;

use LeanScale\KeyValue\Api\Data\KeyvalueInterface;

class Keyvalue extends \Magento\Framework\Api\AbstractExtensibleObject implements KeyvalueInterface
{

    /**
     * Get id
     * @return string|null
     */
    public function getKeyvalueId()
    {
        return $this->_get(self::KEYVALUE_ID);
    }

    /**
     * Set id
     * @param string $keyvalueId
     * @return \LeanScale\KeyValue\Api\Data\KeyvalueInterface
     */
    public function setKeyvalueId($keyvalueId)
    {
        return $this->setData(self::KEYVALUE_ID, $keyvalueId);
    }

    /**
     * Get key
     * @return string|null
     */
    public function getKey()
    {
        return $this->_get(self::KEY);
    }

    /**
     * Set key
     * @param string $key
     * @return \LeanScale\KeyValue\Api\Data\KeyvalueInterface
     */
    public function setKey($key)
    {
        return $this->setData(self::KEY, $key);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \LeanScale\KeyValue\Api\Data\KeyvalueExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \LeanScale\KeyValue\Api\Data\KeyvalueExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \LeanScale\KeyValue\Api\Data\KeyvalueExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get value
     * @return string|null
     */
    public function getValue()
    {
        return $this->_get(self::VALUE);
    }

    /**
     * Set value
     * @param string $value
     * @return \LeanScale\KeyValue\Api\Data\KeyvalueInterface
     */
    public function setValue($value)
    {
        return $this->setData(self::VALUE, $value);
    }
}

