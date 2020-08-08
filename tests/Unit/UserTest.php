<?php

namespace Tests\Unit;

use \App;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
  /**
   * Tests table on User is set
   *
   * @return void
   */
   public function testTableAttributeIsSet() {
     $this->assertClassHasAttribute('table', 'App\User');
   }
}
