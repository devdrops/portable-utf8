<?php

use voku\helper\UTF8 as u;

/**
 * Class Utf8SubstrReplaceTest
 */
class Utf8SubstrReplaceTest extends PHPUnit_Framework_TestCase
{
  public function test_replace_start()
  {
    $str = 'Iñtërnâtiônàlizætiøn';
    $replaced = 'IñtërnâtX';
    self::assertEquals($replaced, u::substr_replace($str, 'X', 8));
  }

  public function test_empty_string()
  {
    $str = '';
    $replaced = 'X';
    self::assertEquals($replaced, u::substr_replace($str, 'X', 8));
  }

  public function test_negative()
  {
    $str = 'testing';
    $replaced = substr_replace($str, 'foo', 0, -2);
    self::assertEquals($replaced, u::substr_replace($str, 'foo', 0, -2));

    $str = 'testing';
    $replaced = substr_replace($str, 'foo', -2, 0);
    self::assertEquals($replaced, u::substr_replace($str, 'foo', -2, 0));

    $str = 'testing';
    $replaced = substr_replace($str, 'foo', -2, -2);
    self::assertEquals($replaced, u::substr_replace($str, 'foo', -2, -2));
  }

  public function test_zero()
  {
    $str = 'testing';
    $replaced = substr_replace($str, 'foo', 0, 0);
    self::assertEquals($replaced, u::substr_replace($str, 'foo', 0, 0));
  }

  public function test_linefeed()
  {
    $str = "Iñ\ntërnâtiônàlizætiøn";
    $replaced = "Iñ\ntërnâtX";
    self::assertEquals($replaced, u::substr_replace($str, 'X', 9));
  }

  public function test_linefeed_replace()
  {
    $str = "Iñ\ntërnâtiônàlizætiøn";
    $replaced = "Iñ\ntërnâtX\nY";
    self::assertEquals($replaced, u::substr_replace($str, "X\nY", 9));
  }
}
