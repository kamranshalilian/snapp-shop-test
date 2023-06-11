<?php

class ProblemTest extends PHPUnit\Framework\TestCase
{

    // const DOUBLE_EPS = 1e-16;
    // public function test1()
    // {
    //     $fun = Problem::make_pipeline(
    //         function ($x) {
    //             return $x * 3;
    //         },
    //         function ($x) {
    //             return $x + 1;
    //         },
    //         function ($x) {
    //             return $x / 2;
    //         }
    //     );
    //     $data = random_int(0, 100000);
    //     $value = $data;
    //     $data *= 3;
    //     $data += 1;
    //     $data /= 2;

    //     $this->assertEquals($fun($value), $data, self::DOUBLE_EPS);
    // }
    // public function test2()
    // {
    //     $fun = Problem::make_pipeline(
    //         function ($x) {
    //             return $x ^ 5;
    //         },
    //         function ($x) {
    //             return $x + 1;
    //         },
    //         function ($x) {
    //             return $x / 2;
    //         },
    //         function ($x) {
    //             return $x ^ 3;
    //         },
    //         function ($x) {
    //             return $x - 5;
    //         },
    //         function ($x) {
    //             return $x + 10;
    //         },
    //         function ($x) {
    //             return $x * 0.5;
    //         }
    //     );
    //     $data = random_int(0, 1000);
    //     $value = $data;
    //     $data ^= 5;
    //     $data += 1;
    //     $data /= 2;
    //     $data ^= 3;
    //     $data -= 5;
    //     $data += 10;
    //     $data *= 0.5;
    //     $test = $fun($value);
    //     $this->assertEquals($test, $data, self::DOUBLE_EPS);
    // }

}
