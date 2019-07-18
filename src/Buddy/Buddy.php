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

namespace Buddy;

use Exception;

class Buddy
{
    /**
     * @var string
     */
    private $legacyUrl;

    public function __construct()
    {
        $this->legacyUrl = isset($_ENV['LEGACY_URL']) ? $_ENV['LEGACY_URL'] : 'http://localhost:8000';
    }

    /**
     * @param int $v1
     * @param int $v2
     * @return int
     * @throws \Exception
     */
    public function add($v1, $v2)
    {
        if (!is_int($v1)) {
            throw new Exception('v1 is not an integer');
        }
        if (!is_int($v2)) {
            throw new Exception('v2 is not an integer');
        }
        return $v1 + $v2;
    }

    /**
     * @param int $v1
     * @param int $v2
     * @return int
     * @throws \Exception
     */
    public function sub($v1, $v2)
    {
        if (!is_int($v1)) {
            throw new Exception('v1 is not an integer');
        }
        if (!is_int($v2)) {
            throw new Exception('v2 is not an integer');
        }
        return $v1 - $v2;
    }

    /**
     * @param int $n
     * @return int
     * @throws \Exception
     */
    public function fib($n)
    {
        if (!is_int($n)) {
            throw new Exception('n is not an integer');
        }
        if ($n < 0) {
            throw new Exception('n must be greater or equal 0');
        }
        return intval(file_get_contents($this->legacyUrl . '?n=' . $n));
    }
}
