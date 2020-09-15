<?php

namespace Webapix\GLS\Tests;

use Mockery;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Class TestCase.
 */
class TestCase extends BaseTestCase
{
    protected function tearDown(): void
    {
        if (\class_exists(Mockery::class)) {
            if ($container = Mockery::getContainer()) {
                $this->addToAssertionCount($container->mockery_getExpectationCount());
            }

            Mockery::close();
        }
    }
}
