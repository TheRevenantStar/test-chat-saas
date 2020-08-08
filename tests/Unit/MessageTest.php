<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
  /**
   * Tests table on User is set
   *
   * @return void
   */
   public function testTableAttributeIsSet() {
     $this->assertClassHasAttribute('table', 'App\Message');
   }
}
