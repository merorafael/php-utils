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
