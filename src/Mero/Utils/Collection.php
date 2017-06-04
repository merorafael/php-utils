<?php

namespace Mero\Utils;

class Collection implements \Countable, \Iterator, \ArrayAccess
{
    use ClassNameTrait;

    /**
     * @var array Array primitive
     */
    protected $elements;

    public function __construct(array $array = [])
    {
        $this->elements = $array;
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return count($this->elements);
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return current($this->elements);
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        return next($this->elements);
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return key($this->elements);
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return isset($this->elements[$this->key()]);
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        reset($this->elements);
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return isset($this->elements[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return isset($this->elements[$offset])
            ? $this->elements[$offset]
            : null;
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        if (null === $offset) {
            $this->elements[] = $value;
        } else {
            $this->elements[$offset] = $value;
        }
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        unset($this->elements[$offset]);
    }

    /**
     * Gets the PHP array representation of this collection.
     *
     * @return array PHP array representation of this collection
     */
    public function toArray()
    {
        return $this->elements;
    }

    /**
     * Finds the first value matching the closure condition.
     *
     * @param \Closure $closure
     *
     * @return mixed
     */
    public function find(\Closure $closure)
    {
        foreach ($this->elements as &$it) {
            if ($closure($it) === true) {
                return $it;
            }
        }

        return;
    }

    /**
     * Finds all values matching the closure condition.
     *
     * @param \Closure $closure
     *
     * @return array|Collection
     */
    public function findAll(\Closure $closure)
    {
        $collection = new Collection();
        foreach ($this->elements as &$it) {
            if ($closure($it) === true) {
                $collection[] = $it;
            }
        }

        return $collection;
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
        $collection = new Collection();
        foreach ($this->elements as &$it) {
            $collection[] = $closure($it);
        }

        return $collection;
    }

    /**
     * Iterates through an Collection, passing each item to the given closure.
     *
     * @param \Closure $closure
     *
     * @return Collection
     */
    public function each(\Closure $closure)
    {
        foreach ($this->elements as &$it) {
            $closure($it);
        }

        return $this;
    }

    /**
     * Iterates through an Collection, passing each item and the item's index (a counter starting at zero)
     * to the given closure.
     *
     * @param \Closure $closure
     *
     * @return Collection
     */
    public function eachWithIndex(\Closure $closure)
    {
        foreach ($this->elements as $index => &$it) {
            $closure($it, $index);
        }

        return $this;
    }
}
