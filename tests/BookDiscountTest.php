<?php

declare(strict_types=1);

namespace App\Tests;

use App\Shop\BooksDiscountMachine;
use App\Shop\BookService;
use PHPUnit\Framework\TestCase;

class BookDiscountTest extends TestCase
{
    private BookService $bookService;
    public function setUp(): void
    {
        $this->bookService = new BookService(new BooksDiscountMachine());
        parent::setUp();
    }

    public function testOnlyTwoBooksDiscount(): void
    {
        $discount = $this->bookService->calculateDiscount([1,1]);
        $this->assertEquals(15.2, $discount);
    }

    public function testSameMultipleBooksDiscount(): void
    {
        $discount = $this->bookService->calculateDiscount([5]);
        $this->assertEquals(40, $discount);
    }

    public function testFiveDifferentBooksDiscount(): void
    {
        $discount = $this->bookService->calculateDiscount([1,1,1,1,1]);
        $this->assertEquals(30, $discount);
    }
}