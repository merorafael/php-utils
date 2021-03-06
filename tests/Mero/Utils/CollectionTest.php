<?php

namespace Mero\Utils;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testClassName()
    {
        $this->assertEquals(Collection::className(), 'Mero\Utils\Collection');
    }

    public function testCount()
    {
        $collection = new Collection(['Element1', 'Element2']);
        $count = $collection->count();

        $this->assertEquals(2, $count);
    }

    public function testCurrent()
    {
        $collection = new Collection(['Element1', 'Element2']);
        $current = $collection->current();

        $this->assertEquals('Element1', $current);
    }

    public function testNext()
    {
        $collection = new Collection(['Element1', 'Element2']);
        $next = $collection->next();

        $this->assertEquals('Element2', $next);
    }

    public function testKey()
    {
        $collection = new Collection(['Element1', 'Element2']);
        $this->assertEquals(0, $collection->key());
        $collection->next();
        $this->assertEquals(1, $collection->key());
    }

    public function testValid()
    {
        $collection = new Collection(['Element1']);
        $this->assertTrue($collection->valid());
        $collection->next();
        $this->assertFalse($collection->valid());
    }

    public function testRewind()
    {
        $collection = new Collection(['Element1', 'Element2']);
        $collection->next();
        $this->assertEquals('Element2', $collection->current());
        $collection->rewind();
        $this->assertEquals('Element1', $collection->current());
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

    public function testToArray()
    {
        $collection = new Collection(['Element1']);
        $array = $collection->toArray();

        $this->assertEquals(['Element1'], $array);
    }

    public function testFindFound()
    {
        $collection = new Collection([1, 2, 3, 4]);

        $result = $collection->find(function ($it) {
            return $it == 4;
        });

        $this->assertEquals(4, $result);
    }

    public function testFindNotFound()
    {
        $collection = new Collection([1, 2, 3, 4]);

        $result = $collection->find(function ($it) {
            return $it == 5;
        });

        $this->assertNull($result);
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

    public function testEach()
    {
        $collection = new Collection([1, 2, 3]);

        $expected = 0;
        $collection->each(function ($it) use (&$expected) {
            $this->assertEquals(++$expected, $it);
        });
    }

    public function testEachWithIndex()
    {
        $collection = new Collection([1, 2, 3]);

        $expectedIndex = 0;
        $expectedValue = 0;
        $collection->eachWithIndex(function ($value, $index) use (&$expectedIndex, &$expectedValue) {
            $this->assertEquals($expectedIndex++, $index);
            $this->assertEquals(++$expectedValue, $value);
        });
    }
}
