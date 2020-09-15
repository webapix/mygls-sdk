<?php

namespace Webapix\GLS\Tests\Unit;

use Webapix\GLS\ErrorCollection;
use Webapix\GLS\Models\ErrorInfo;
use Webapix\GLS\Tests\Factories\ErrorInfoFactory;
use Webapix\GLS\Tests\TestCase;

class ErrorCollectionTest extends TestCase
{
    /**
     * @var ErrorCollection
     */
    private $errorCollection;

    protected function setUp(): void
    {
        parent::setUp();

        $this->errorCollection = new ErrorCollection([
            ErrorInfoFactory::new()->create(),
            ErrorInfoFactory::new()->create([
                'ErrorCode' => 20,
                'ErrorDescription' => 'Something went wrong again.',
                'ParcelIdList' => [904851697],
            ]),
        ]);
    }

    /** @test */
    public function it_can_get_error_data()
    {
        $this->assertCount(2, $this->errorCollection->all());
        $this->assertEquals(2, $this->errorCollection->count());
        $this->assertSame('Something went wrong.', $this->errorCollection->firstErrorMessage());
        $this->assertSame('26', $this->errorCollection->firstErrorCode());
        $this->assertInstanceOf(ErrorInfo::class, $this->errorCollection->first());
        $this->assertTrue($this->errorCollection->hasAny());
        $this->assertTrue($this->errorCollection->has(20));
        $this->assertInstanceOf(ErrorInfo::class, $this->errorCollection->get(20));
        $this->assertEquals(20, $this->errorCollection->get(20)->code());

        $this->assertFalse((new ErrorCollection([]))->hasAny());
        $this->assertNull((new ErrorCollection([]))->first());
        $this->assertNull((new ErrorCollection([]))->firstErrorMessage());
        $this->assertNull((new ErrorCollection([]))->firstErrorCode());
        $this->assertEquals(0, (new ErrorCollection([]))->count());
        $this->assertEquals([], (new ErrorCollection([]))->all());
        $this->assertFalse((new ErrorCollection([]))->has(20));
        $this->assertNull((new ErrorCollection([]))->get(20));
    }
}
