[![Build Status](https://travis-ci.org/voku/portable-utf8.svg?branch=master)](https://travis-ci.org/voku/portable-utf8)
[![Build status](https://ci.appveyor.com/api/projects/status/gnejjnk7qplr7f5t/branch/master?svg=true)](https://ci.appveyor.com/project/voku/portable-utf8/branch/master)
[![Coverage Status](https://coveralls.io/repos/voku/portable-utf8/badge.svg?branch=master&service=github)](https://coveralls.io/github/voku/portable-utf8?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/voku/portable-utf8/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/voku/portable-utf8/?branch=master)
[![Codacy Badge](https://www.codacy.com/project/badge/997c9bb10d1c4791967bdf2e42013e8e)](https://www.codacy.com/app/voku/portable-utf8)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/be5bf087-366c-463e-ac9f-c184db6347ba/mini.png)](https://insight.sensiolabs.com/projects/be5bf087-366c-463e-ac9f-c184db6347ba)
[![Dependency Status](https://www.versioneye.com/php/voku:portable-utf8/dev-master/badge.svg)](https://www.versioneye.com/php/voku:portable-utf8/dev-master)
[![Reference Status](https://www.versioneye.com/php/voku:portable-utf8/reference_badge.svg?style=flat)](https://www.versioneye.com/php/voku:portable-utf8/references)
[![Total Downloads](https://poser.pugx.org/voku/portable-utf8/downloads)](https://packagist.org/packages/voku/portable-utf8)
[![License](https://poser.pugx.org/voku/portable-utf8/license.svg)](https://packagist.org/packages/voku/portable-utf8)

Portable UTF-8
=============

This library is a Unicode aware alternative to PHP's native string handling API.

- Based on Hamid Sarfraz's work: http://pageconfig.com/attachments/portable-utf8.php
- Based on Nicolas Grekas's work: https://github.com/tchwork/utf8
- Based on Behat's work: https://github.com/Behat/Transliterator
- Based on Sebastián Grignoli's work: https://github.com/neitanod/forceutf8
- Based on Paragon Initiative Enterprises's work: https://github.com/paragonie/random_compat/

Description
===========

It is written in PHP and can work without "mbstring", "iconv" or any other extra encoding-library. The benefit of Portable UTF-8 is that it is easy to use, easy to bundle.

phpDocumentor
=============

[http://htmlpreview.github.io/?https://github.com/voku/portable-utf8/master/doc/classes/voku.helper.UTF8.html](http://htmlpreview.github.io/?https://github.com/voku/portable-utf8/master/doc/classes/voku.helper.UTF8.html)


##  Why Portable UTF-8?[]()
PHP 5 and earlier versions have no native Unicode support. PHP 6 or 7 [[1]](http://schlueters.de/blog/archives/128-Future-of-PHP-6.html), where the Unicode support has been promised, may take years. To bridge the gap, there exist several extensions like "mbstring", "iconv" and "intl".

The problem with "mbstring" and others is that most of the time you cannot ensure presence of a specific one on a server. If you rely on one of these, your application is no more portable. This problem gets even severe for open source applications that have to run on different servers with different configurations. Considering these, I decided to write a library:

## Requirements and Recommendations

*   No extensions are required to run this library. Portable UTF-8 only needs PCRE library that is available by default since PHP 4.2.0 and cannot be disabled since PHP 5.3.0. "\u" modifier support in PCRE for UTF-8 handling is not a must.
*   PHP 5.3 is the minimum requirement, and all later versions are fine with Portable UTF-8.
*   To speed up string handling, it is recommended that you have "mbstring" or "iconv" available on your server, as well as the latest version of PCRE library
*   Although Portable UTF-8 is easy to use; moving from native API to Portable UTF-8 may not be straight-forward for everyone. It is highly recommended that you do not update your scripts to include Portable UTF-8 or replace or change anything before you first know the reason and consequences. Most of the time, some native function may be all what you need.
*   There is also a shim for "mbstring", "iconv" and "intl", so you can use it also on shared webspace. 

Usage:
======

Example 1:
```php
  $cleanUTF8String = UTF8::cleanup($string);
  // ... and then save to db
```

Example 2:
```php
  $string = 'string <strong>with utf-8 chars åèä</strong> - doo-bee doo-bee dooh';

  echo strlen($string) . "\n<br />";
  echo UTF8::strlen($string) . "\n<br />";

  // will output:
  // 70
  // 67

  $string_test1 = strip_tags($string);
  $string_test2 = UTF8::strip_tags($string);

  echo strlen($string_test1) . "\n<br />";
  echo UTF8::strlen($string_test2) . "\n<br />";

  // will output:
  // 53
  // 50
```

Unit Test:
==========

1) [Composer](https://getcomposer.org) is a prerequisite for running the tests.

```
composer install
```

2) The tests can be executed by running this command from the root directory:

```bash
./vendor/bin/phpunit
```

License and Copyright
=====================

Unless otherwise stated to the contrary, all my work that I publish on this website is licensed under Creative Commons Attribution 3.0 Unported License (CC BY 3.0) and free for all commercial or non-profit projects under certain conditions.

Read the full legal license. [http://creativecommons.org/licenses/by/3.0/legalcode](http://creativecommons.org/licenses/by/3.0/legalcode)
