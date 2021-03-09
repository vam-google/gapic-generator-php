<?php
/*
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
declare(strict_types=1);

namespace Google\Generator\Tests\Unit\Tools;

use PHPUnit\Framework\TestCase;
use Google\Generator\Tests\Tools\PhpClassComparer;

final class PhpClassComparerTest extends TestCase
{
    public function testCompareClassLevelSemantics()
    {
        $phpClassOne = '<?php
namespace FooBar;
class Coffee {}';
        $this->assertTrue(PhpClassComparer::compare($phpClassOne, $phpClassOne));

        // Different namespace.
        $phpClassTwo = '<?php
namespace Foo;
class Coffee {}';
        $this->assertFalse(PhpClassComparer::compare($phpClassOne, $phpClassTwo, false));
        $this->assertFalse(PhpClassComparer::compare($phpClassTwo, $phpClassOne, false));

        // Add a file comment.
        $phpClassTwo = '<?php
/*
 * Copyright Notice Goes Here.
 */

namespace FooBar;
class Coffee {}';
        $this->assertTrue(PhpClassComparer::compare($phpClassOne, $phpClassTwo));
        $this->assertTrue(PhpClassComparer::compare($phpClassTwo, $phpClassOne));

        // Add a class comment.
        $phpClassTwo = '<?php
namespace FooBar;

/**
 * This class represents a virtual cup of coffee.
 */
class Coffee {}';
        $this->assertTrue(PhpClassComparer::compare($phpClassOne, $phpClassTwo));
        $this->assertTrue(PhpClassComparer::compare($phpClassTwo, $phpClassOne));

        // Different class names.
        $phpClassTwo = '<?php
namespace FooBar;
class CoffeeBreak {}';
        $this->assertFalse(PhpClassComparer::compare($phpClassOne, $phpClassTwo, false));
        $this->assertFalse(PhpClassComparer::compare($phpClassTwo, $phpClassOne, false));
    }

    public function testCompareMethodsWithoutClass(): void
    {
        // Same methods.
        $phpFileOne = '<?php
function cooldown()  {}';
        $this->assertTrue(PhpClassComparer::compare($phpFileOne, $phpFileOne));

        // Different implementations.
        $phpFileTwo = '<?php
function cooldown() { return 94; }';
        $this->assertFalse(PhpClassComparer::compare($phpFileOne, $phpFileTwo, false));
        $this->assertFalse(PhpClassComparer::compare($phpFileTwo, $phpFileOne, false));

        // One of the files has a class.
        $phpFileTwo = '<?php
class Coffee {
  function cooldown() {}
}';
        $this->assertFalse(PhpClassComparer::compare($phpFileOne, $phpFileTwo, false));
        $this->assertFalse(PhpClassComparer::compare($phpFileTwo, $phpFileOne, false));

        // Two methods.
        $phpFileOne = '<?php
function getBlendName()  { return "Hazelnut"; }
function getRoastName() { return "Medium"; }';
        $phpFileTwo = '<?php
function getRoastName() { return "Medium"; }
function getBlendName()  { return "Hazelnut"; }';
        $this->assertTrue(PhpClassComparer::compare($phpFileOne, $phpFileTwo));
        $this->assertTrue(PhpClassComparer::compare($phpFileTwo, $phpFileOne));
    }

    public function testCompareWithInvalidPhp()
    {
        $validPhp = '<?php
function getBlendName()  { return "Hazelnut"; }';
        $invalidPhp = '<?php
function getBlendName()  { return "Hazelnut"; ';

        $this->assertTrue(PhpClassComparer::compare($validPhp, $validPhp));
        $this->assertFalse(PhpClassComparer::compare($validPhp, $invalidPhp, false));
        $this->assertFalse(PhpClassComparer::compare($invalidPhp, $validPhp, false));
    }


    public function testCompareSingleMethodLevelSemantics()
    {
        $phpClassOne = '<?php
namespace FooBar;
class Coffee {
  private function __construct() {}
}';
        $this->assertTrue(PhpClassComparer::compare($phpClassOne, $phpClassOne));

        // Empty class.
        $phpClassTwo = '<?php
namespace FooBar;
class Coffee {}';
        $this->assertFalse(PhpClassComparer::compare($phpClassOne, $phpClassTwo, false));
        $this->assertFalse(PhpClassComparer::compare($phpClassTwo, $phpClassOne, false));

        // Add a method comment.
        $phpClassTwo = '<?php
namespace FooBar;
class Coffee {
  // The constructor.
  private function __construct() {}
}';
        $this->assertFalse(PhpClassComparer::compare($phpClassOne, $phpClassTwo, false));
        $this->assertFalse(PhpClassComparer::compare($phpClassTwo, $phpClassOne, false));

        // Add a body-level comment.
        $phpClassTwo = '<?php
namespace FooBar;
class Coffee {
  private function __construct() {
    // Nothing to initialize.
  }
}';
        $this->assertFalse(PhpClassComparer::compare($phpClassOne, $phpClassTwo, false));
        $this->assertFalse(PhpClassComparer::compare($phpClassTwo, $phpClassOne, false));

        // Different method scopes.
        $phpClassTwo = '<?php
namespace FooBar;
class Coffee {
  public function __construct() {
  }
}';
        $this->assertFalse(PhpClassComparer::compare($phpClassOne, $phpClassTwo, false));
        $this->assertFalse(PhpClassComparer::compare($phpClassTwo, $phpClassOne, false));

        // Different brace spacing.
        $phpClassTwo = '<?php
namespace FooBar;
class Coffee {
  private function __construct() {}
}';
        $this->assertTrue(PhpClassComparer::compare($phpClassOne, $phpClassTwo));
        $this->assertTrue(PhpClassComparer::compare($phpClassTwo, $phpClassOne));

        // Different method names.
        $phpClassOne = '<?php
namespace FooBar;
class Coffee {
  public function getThis()  {
    return self;
  }
}';
        $phpClassTwo = '<?php
namespace FooBar;
class Coffee {
  public function getThiz() {
    return self;
  }
}';
        $this->assertFalse(PhpClassComparer::compare($phpClassOne, $phpClassTwo, false));
        $this->assertFalse(PhpClassComparer::compare($phpClassTwo, $phpClassOne, false));

        // Different implementations.
        $phpClassOne = '<?php
namespace FooBar;
class Coffee {
  public function cooldown()  {
    $temperature = 96 - 2;
    return $temperature;
  }
}';
        $phpClassTwo = '<?php
namespace FooBar;
class Coffee {
  public function cooldown()  {
    $temperature = 94;
    return $temperature;
  }
}';
        $this->assertFalse(PhpClassComparer::compare($phpClassOne, $phpClassTwo, false));
        $this->assertFalse(PhpClassComparer::compare($phpClassTwo, $phpClassOne, false));

        // Extra end-of-line comment.
        $phpClassOne = '<?php
namespace FooBar;
class Coffee {
  public function getTemperature()  {
    return 49;  // Perfect time to drink up!
  }
}';
        $phpClassTwo = '<?php
namespace FooBar;
class Coffee {
  public function getTemperature()  {
    return 49;
  }
}';
        $this->assertFalse(PhpClassComparer::compare($phpClassOne, $phpClassTwo, false));
        $this->assertFalse(PhpClassComparer::compare($phpClassTwo, $phpClassOne, false));

        // Different whitespacing.
        $phpClassOne = '<?php
namespace FooBar;
class Coffee {
  public function getTemperature()  {
    return 49;
  }
}';
        $phpClassTwo = '<?php
namespace FooBar;
class Coffee {  public function getTemperature()  {  return 49;  } }';
        $this->assertTrue(PhpClassComparer::compare($phpClassOne, $phpClassTwo));
        $this->assertTrue(PhpClassComparer::compare($phpClassTwo, $phpClassOne));

        // Semantically the same return type.
        $phpClassOne = '<?php
namespace FooBar;
class Coffee {
  public function getThis() {
    return self;
  }
}';
        $phpClassTwo = '<?php
namespace FooBar;
class Coffee {
  public function getThis(): self {
    return self;
  }
}';
        $this->assertFalse(PhpClassComparer::compare($phpClassOne, $phpClassTwo, false));
        $this->assertFalse(PhpClassComparer::compare($phpClassTwo, $phpClassOne, false));

        // Different return types.
        $phpClassOne = '<?php
namespace FooBar;
class Coffee {
  public function blendName(): string {
    return "Hazelnut";
  }
}';
        $phpClassTwo = '<?php
namespace FooBar;
class Coffee {
  public function blendName(): ?string {
    return "Hazelnut";
  }
}';
        $this->assertFalse(PhpClassComparer::compare($phpClassOne, $phpClassTwo, false));
        $this->assertFalse(PhpClassComparer::compare($phpClassTwo, $phpClassOne, false));
    }

    public function testCompareMethodsInDifferentOrder(): void
    {
        // Different method ordering.
        $phpClassOne = '<?php
namespace FooBar;
class Coffee {
  public function roastName(): string {
    return "Medium";
 }
  public function blendName(): string {
    return "Hazelnut";
  }
}';
        $phpClassTwo = '<?php
namespace FooBar;
class Coffee {
  public function blendName(): string {
    return "Hazelnut";
  }
  public function roastName(): string {
    return "Medium";
 }
}';
        $this->assertTrue(PhpClassComparer::compare($phpClassOne, $phpClassTwo));
        $this->assertTrue(PhpClassComparer::compare($phpClassTwo, $phpClassOne));

        // Different whitespacing in the class and methods.
        $phpClassTwo = '<?php
namespace FooBar;
class Coffee {
  public function roastName(): string { return "Medium"; }
  public function blendName(): string { return "Hazelnut"; } }';
        $this->assertTrue(PhpClassComparer::compare($phpClassOne, $phpClassTwo));
        $this->assertTrue(PhpClassComparer::compare($phpClassTwo, $phpClassOne));
    }
}