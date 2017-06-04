<?php

namespace Mero\Utils;

class Collection implements \ArrayAccess
{
    /**
     * @var array Array primitive
     */
    protected $container;

    public function __construct(array $array = [])
    {
        $this->container = $array;
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset])
            ? $this->container[$offset]
            : null;
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        if (null === $offset) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Counts all elements in the collection.
     *
     * @return int Number of elements
     */
    public function count()
    {
        return count($this->container);
    }

    /**
     * Finds all values matching the closure condition.
     *
     * @param \Closure $closure
     *
     * @return array|Collection
     */
    public function find(\Closure $closure)
    {
        foreach ($this->container as &$it) {
            if ($closure($it) === true) {
                return $it;
            }
        }
    }

    /**
     * Finds the first value matching the closure condition.
     *
     * @param \Closure $closure
     *
     * @return array|Collection
     */
    public function findAll(\Closure $closure)
    {
        $newCollection = new Collection();
        foreach ($this->container as &$it) {
            if ($closure($it) === true) {
                $newCollection[] = $it;
            }
        }

        return $newCollection;
    }

    /**
     * Iterates through this collection transforming each entry into a new value using the
     * transform closure returning a list of transformed values.
     *
     * @param \Closure $closure
     *
     * @return array|Collection
     */
    public function collect(\Closure $closure)
    {
        $newCollection = new Collection();
        foreach ($this->container as &$it) {
            $newCollection[] = $closure($it);
        }

        return $newCollection;
    }
}
