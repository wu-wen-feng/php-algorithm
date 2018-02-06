<?php
// +----------------------------------------------------------------------
// | KXT [ No pains,no gains. ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2027 http://kxt.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: zwj
// +----------------------------------------------------------------------
// | Description: TEST
// +----------------------------------------------------------------------
namespace app\home\controller;

use think\db;
use BlogHelper;
use LinksHelper;

class Test
{

    public function index()
    {
        $arr = array(5, 2, 6, 4, 3, 7, 9, 1, 10);
        //var_dump($this->bubble($arr));
        //var_dump($this->select($arr));
        //var_dump($this->insert($arr));
        //var_dump($this->quick($arr));
        //var_dump($this->bubble2($arr));
        //var_dump($this->select2($arr));
        var_dump($this->select3($arr));
        //var_dump($this->insert2($arr));
        //var_dump($this->quick2($arr));
        exit;
    }


    public function bubble($arr)
    {
        $len = count($arr);
        for ($i = 1; $i < $len; $i++) {
            for ($k = 0; $k < $len - $i; $k++) {
                if ($arr[$k] > $arr[$k + 1]) {
                    $tmp = $arr[$k + 1];
                    $arr[$k + 1] = $arr[$k];
                    $arr[$k] = $tmp;
                }
            }
        }
        return $arr;
    }

    public function select($arr)
    {
        $len = count($arr);
        for ($i = 0; $i < $len - 1; $i++) {
            $p = $i;
            for ($j = $i + 1; $j < $len; $j++) {
                if ($arr[$p] > $arr[$j]) {
                    $p = $j;
                }
            }
            if ($p != $i) {
                $tmp = $arr[$p];
                $arr[$p] = $arr[$i];
                $arr[$i] = $tmp;
            }
        }
        return $arr;
    }

    public function insert($arr)
    {
        $len = count($arr);
        for ($i = 1; $i < $len; $i++) {
            $tmp = $arr[$i];
            for ($j = $i - 1; $j >= 0; $j--) {
                if ($tmp < $arr[$j]) {
                    $arr[$j + 1] = $arr[$j];
                    $arr[$j] = $tmp;
                } else {
                    break;
                }
            }
        }
        return $arr;
    }

    public function quick($arr)
    {
        $length = count($arr);
        if ($length <= 1) {
            return $arr;
        }
        $base_num = $arr[0];
        $left_array = array();
        $right_array = array();
        for ($i = 1; $i < $length; $i++) {
            if ($base_num > $arr[$i]) {
                $left_array[] = $arr[$i];
            } else {
                $right_array[] = $arr[$i];
            }
        }
        $left_array = $this->quick($left_array);
        $right_array = $this->quick($right_array);
        return array_merge($left_array, array($base_num), $right_array);
    }

    public function bubble2($arr)
    {
        $len = count($arr);
        for ($i = 1; $i < $len; $i++) {
            for ($j = 0; $j < $len - $i; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $tmp;
                }
            }
        }
        return $arr;
    }

    public function select2($arr)
    {
        $len = count($arr);
        for ($i = 0; $i < $len - 1; $i++) {
            $k = $i;
            for ($j = $i + 1; $j < $len; $j++) {
                if ($arr[$k] > $arr[$j]) {
                    $k = $j;
                }
            }
            if ($k != $i) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$k];
                $arr[$k] = $tmp;
            }
        }
        return $arr;
    }

    public function select3($arr)
    {
        $len = count($arr);
        $half = intval($len / 2);
        for ($i = 0; $i < $half; $i++) {
            $min = $i;
            $max = $i;
            for ($j = $i + 1; $j < $len - $i; $j++) {
                if ($arr[$j] > $arr[$max]) {
                    $max = $j;
                    continue;
                }
                if ($arr[$j] < $arr[$min]) {
                    $min = $j;
                    continue;
                }
            }
            if ($min != $i) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$min];
                $arr[$min] = $tmp;
            }
            if ($max != $i) {
                $tmp = $arr[$len - $i - 1];
                $arr[$len - $i - 1] = $arr[$max];
                $arr[$max] = $tmp;
            }
        }
        return $arr;
    }

    public function insert2($arr)
    {
        $len = count($arr);
        for ($i = 1; $i < $len; $i++) {
            $tmp = $arr[$i];
            for ($j = $i - 1; $j >= 0; $j--) {
                if ($tmp < $arr[$j]) {
                    $arr[$j + 1] = $arr[$j];
                    $arr[$j] = $tmp;
                } else {
                    break;
                }
            }
        }
        return $arr;
    }

    public function quick2($arr)
    {
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }
        $left = [];
        $right = [];
        $base = $arr[0];
        for ($i = 1; $i < $len; $i++) {
            //$base = $arr[0];
            if ($arr[$i] < $base) {
                $left[] = $arr[$i];
            } else {
                $right[] = $arr[$i];
            }
        }
        $left = $this->quick2($left);
        $right = $this->quick2($right);
        $ret = array_merge($left, [$base], $right);
        return $ret;
    }
}