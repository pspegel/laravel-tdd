<?php
namespace App\Payment;

class Invoice
{
    /** @var string */
    private $ocr;
    /** @var bool*/
    private $hasReceivedGeneralConditions;

    /**
     * @param string $ocr
     * @param bool $hasReceivedGeneralConditions
     */
    public function __construct($ocr = null, $hasReceivedGeneralConditions = true)
    {
        $this->ocr = $ocr;
        $this->hasReceivedGeneralConditions = $hasReceivedGeneralConditions;
    }

    public function print()
    {
        $pages = [];
        if ($this->ocr) {
            $pages []= "<ocr>$this->ocr</ocr>";
        }
        if (!$this->hasReceivedGeneralConditions) {
            $pages []= "General conditions:\nIf you pay this invoice you agree to deliver 20 camels to us each full moon.";
        }

        if (!$pages) {
            throw new EmptyInvoiceException('Test');
        }
        return $pages;
    }
}