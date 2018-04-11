<?php

namespace Upayment\Invoices\Services;

use Billplz\Client as BillplzClient;
use Http\Adapter\Guzzle6\Client as GuzzleHttpClient;
use Http\Client\Common\HttpMethodsClient;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use Illuminate\Support\Facades\App;
use Upayment\Invoices\Invoice;

class PaymentServiceRequest
{

    /**
     * @var mixed
     */
    private $invoice;

    /**
     * @var mixed
     */
    private $billplz;

    /**
     * @param Invoice $invoice
     */
    public function __construct()
    {

        $httpService = new HttpMethodsClient(
            new GuzzleHttpClient(),
            new GuzzleMessageFactory()
        );

        $this->billplz = new BillplzClient($httpService, config('upayment.billplz.api_key'));

        if (App::isLocal() || App::runningUnitTests()) {
            $this->billplz->useSandBox();
        }

    }

    /**
     * @param  Invoice $invoice
     * @return mixed
     */
    public function setInvoice(Invoice $invoice)
    {
        $this->invoice = $invoice;
        return $this;
    }

    /**
     * static call method
     * @return static
     */
    public static function make()
    {
        return new static();
    }

    /**
     * execute command handler
     * @return void
     */
    public function execute()
    {
        return $this->createBill();
    }

    /**
     * @return mixed
     */
    public function createBill()
    {
        return $this->billplz->bill()->create(
            config('upayment.billplz.collection'),
            $this->invoice->email(),
            null,
            $this->invoice->receiptient(),
            $this->invoice->amount() * 100,
            config('upayment.billplz.callback_url'),
            'Invoice payment',
            [
                'redirect_url' => config('upayment.billplz.redirect_url'),
                'invoice_id'   => $this->invoice->getIdentifier(),
            ]
        );
    }

    /**
     * @return mixed
     */
    public function getBill($billId)
    {
        return $this->billplz->bill()->show($billId);
    }

    /**
     * @param  $name
     * @return mixed
     */
    public function createCollection($name)
    {
        return $this->billplz->collection()->create($name);
    }
}
