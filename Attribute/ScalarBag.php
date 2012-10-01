<?php

namespace TheodoEvolution\HttpFoundationBundle\Attribute;

use Symfony\Component\HttpFoundation\Session\SessionBagInterface;

/**
 * ScalarBag class.
 *
 * @author Benjamin Grandfond <benjamin.grandfond@gmail.com>
 */
class ScalarBag implements SessionBagInterface
{
    private $name = 'attributes';

    /**
     * @var string
     */
    private $storageKey;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * Constructor.
     *
     * @param string $storageKey The key used to store flashes in the session.
     */
    public function __construct($storageKey)
    {
        $this->storageKey = $storageKey;
        $this->value = '';
    }

    /**
     * Gets this bag's name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set this bag's name
     *
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Initializes the Bag
     *
     * @param array $array
     */
    public function initialize(array &$array)
    {
        $this->value = !empty($array) ? reset($array) : null;
        $array = $this->value;
    }

    /**
     * Gets the storage key for this bag.
     *
     * @return string
     */
    public function getStorageKey()
    {
        return $this->storageKey;
    }

    /**
     * Clears out data from bag.
     *
     * @return mixed Whatever data was contained.
     */
    public function clear()
    {
        $this->value = null;
    }

    /**
     * @param $value
     */
    public function set($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->get();
    }
}