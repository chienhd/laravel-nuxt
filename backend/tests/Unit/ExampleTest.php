<?php

namespace Tests\Unit;

use App\Services\ArticleServiceContract;
use PHPUnit\Framework\TestCase;
use Mockery;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        /*$double = Mockery::mock(ArticleRepositoryContract::class);
        $double->shouldReceive('find')
            ->with(1)
            ->andReturn(Article::class);
        $book = $double->find(1);
        $this->assertEquals(Article::class, $book);*/


        /*Test service*/
        $double = Mockery::mock(ArticleServiceContract::class);
        $double->shouldReceive('testArticle')
            ->with(12)
            ->andReturn(\Illuminate\Support\Facades\Response::class);
        $book = $double->testArticle(12);
        $this->assertEquals(\Illuminate\Support\Facades\Response::class, $book);
    }
}
