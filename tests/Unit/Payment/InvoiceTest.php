<?php
namespace Unit\Payment;

use App\Payment\EmptyInvoiceException;
use Tests\Unit\UnitTestCase;
use App\Payment\Invoice;

class InvoiceTest extends UnitTestCase
{
    /** @var Invoice */
    private $SUT;

    public function setUp()
    {
        parent::setUp();
        $this->SUT = new Invoice();
    }

    public function test_that_we_cant_print_an_empty_invoice()
    {
        $this->expectException(EmptyInvoiceException::class);
        $this->SUT->print();
    }

    public function test_that_the_OCR_is_printed()
    {
        $ocr = '133713371337';
        $this->we_have_an_invoice_with_ocr($ocr);

        $actualPage = $this->SUT->print()[0];

        $this->assertContains($ocr, $actualPage);
    }

    public function test_that_an_appendix_is_printed_when_the_customer_has_not_received_General_conditions()
    {
        $this->we_have_the_customers_first_invoice();

        $this->assertEquals(2, count($this->SUT->print()));
    }

    /**
     * @param string $ocr
     */
    private function we_have_an_invoice_with_ocr($ocr)
    {
        $this->SUT = new Invoice($ocr);
    }

    private function we_have_the_customers_first_invoice()
    {
        $this->SUT = new Invoice('Some OCR', false);
    }
}