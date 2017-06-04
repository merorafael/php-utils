<?php

namespace Mero\Utils;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testClassName()
    {
        $this->assertEquals(Collection::className(), 'Mero\Utils\Collection');
    }

    public function testOffsetExists()
    {
        $collection = new Collection(['Element1']);

        $this->assertTrue($collection->offsetExists(0));
        $this->assertFalse($collection->offsetExists(1));
    }

    public function testOffsetGet()
    {
        $collection = new Collection(['Element1']);

        $this->assertEquals('Element1', $collection->offsetGet(0));
    }

    public function testOffsetSet()
    {
        $collection = new Collection();
        $collection->offsetSet(null, 'Element1');
        $collection->offsetSet(20, 'Element2');
        $array = $collection->toArray();

        $this->assertEquals('Element1', $array[0]);
        $this->assertEquals('Element2', $array[20]);
    }

    public function testOffsetUnset()
    {
        $collection = new Collection(['Element1']);
        $this->assertEquals('Element1', $collection[0]);
        $collection->offsetUnset(0);
        $this->assertNull($collection[0]);
    }

    public function testCount()
    {
        $collection = new Collection(['Element1', 'Element2']);
        $count = $collection->count();

        $this->assertEquals(2, $count);
    }

    public function testToArray()
    {
        $collection = new Collection(['Element1']);
        $array = $collection->toArray();

        $this->assertEquals(['Element1'], $array);
    }

    public function testFind()
    {
        $collection = new Collection([1, 2, 3, 4]);

        $result = $collection->find(function ($it) {
            return $it == 4;
        });

        $this->assertEquals(4, $result);
    }

    public function testFindAll()
    {
        $collection = new Collection([1, 2, 3, 4, 4]);

        $result = $collection->findAll(function ($it) {
            return $it == 4;
        });

        foreach ($result as $element) {
            $this->assertEquals(4, $element);
        }
    }

    public function testCollect()
    {
        $collection = new Collection([4, 4, 4]);

        $result = $collection->collect(function ($it) {
            return $it * 2;
        });

        foreach ($result as $element) {
            $this->assertEquals(8, $element);
        }
    }
}
