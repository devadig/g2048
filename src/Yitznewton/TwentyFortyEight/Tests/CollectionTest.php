<?php

namespace Yitznewton\TwentyFortyEight\Tests;

use Yitznewton\TwentyFortyEight\Collection;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testToArray()
    {
        $array = [1,2,3];
        $arrayObj = new Collection($array);
        $this->assertSame($array, $arrayObj->toArray());
    }

    public function testCount()
    {
        $arrayObj = new Collection([1,2,3]);
        $this->assertEquals(3, count($arrayObj));
    }

    public function testAppend()
    {
        $arrayObj = new Collection([1,2,3]);
        $this->assertEquals(new Collection([1,2,3,4]), $arrayObj->append(4));
    }

    public function testSlice()
    {
        $arrayObj = new Collection([1,2,3]);
        $this->assertEquals(new Collection([2,3]), $arrayObj->slice(1));
        $this->assertEquals(new Collection([2]), $arrayObj->slice(1, 1));
    }

    public function testMerge()
    {
        $array0 = new Collection([1,2,3]);
        $array1 = new Collection([4]);
        $this->assertEquals(new Collection([1,2,3,4]), $array0->merge($array1));
    }

    public function testIndex()
    {
        $arrayObj = new Collection([1,2,3]);
        $this->assertEquals(2, $arrayObj->index(1));

        $this->setExpectedException(\OutOfRangeException::class);
        $arrayObj->index(999);
    }

    public function testDelete()
    {
        $arrayObj = new Collection([1,2,3,4,3,5,3,6,3,7]);
        $this->assertEquals(new Collection([1,2,4,5,6,7]), $arrayObj->delete(3));
    }
}
