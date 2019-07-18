<?php
/**
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Buddy\Tests;

use Buddy\Buddy;

class BuddyTest extends \PHPUnit_Framework_TestCase
{
    public function testInstantiating()
    {
        $buddy = new Buddy();
        $this->assertInstanceOf('Buddy\Buddy', $buddy);
        $this->assertTrue(method_exists($buddy, 'add'));
        $this->assertTrue(method_exists($buddy, 'sub'));
    }

    public function testAdd()
    {
        $buddy = new Buddy();
        $this->assertEquals(3, $buddy->add(1, 2));

    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage v1 is not an integer
     */
    public function testAddWrongV1()
    {
        $buddy = new Buddy();
        $buddy->add('1', 2);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage v2 is not an integer
     */
    public function testAddWrongV2()
    {
        $buddy = new Buddy();
        $buddy->add(1, '2');
    }

    public function testSub()
    {
        $buddy = new Buddy();
        $this->assertEquals(1, $buddy->sub(3, 2));

    }

    public function testFib()
    {
        $buddy = new Buddy();
        $this->assertEquals(0, $buddy->fib(0));
        $this->assertEquals(1, $buddy->fib(1));
        $this->assertEquals(4, $buddy->fib(5));
        $this->assertEquals(10, $buddy->fib(55));
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage v1 is not an integer
     */
    public function testSubWrongV1()
    {
        $buddy = new Buddy();
        $buddy->sub('3', 2);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage v2 is not an integer
     */
    public function testSubWrongV2()
    {
        $buddy = new Buddy();
        $buddy->sub(3, '2');
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage n is not an integer
     */
    public function testFibWrongN()
    {
        $buddy = new Buddy();
        $buddy->fib('1');
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage n must be greater or equal 0
     */
    public function testFibNLessThan0()
    {
        $buddy = new Buddy();
        $buddy->fib(-1);
    }
}