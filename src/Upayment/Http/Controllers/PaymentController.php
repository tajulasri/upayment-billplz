<?php

namespace Upayment\Invoices\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Upayment\Invoices\Invoice;
use Upayment\Invoices\Services\PaymentServiceRequest;

class PaymentController extends Controller
{

    /**
     * @param Request $request
     */
    public function paymentConfirmation(Request $request)
    {
        return view('upayment::payment_confirmation');
    }

    /**
     * @param Request $request
     */
    public function connectToBillplz(Request $request)
    {
        $invoice = new Invoice(
            1.00, 'testing', 'testing', 'sample@yahoo.com'
        );

        $invoice->setIdentifier(10);

        $paymentRequest = PaymentServiceRequest::make()
            ->setInvoice($invoice)
            ->execute();

        $data = json_decode($paymentRequest->getBody());
        if (isset($data->url)) {
            return redirect()->to(url($data->url));
        }

    }

    /**
     * @param Request $request
     */
    public function paymentCompleted(Request $request)
    {

        if ($request->has('billplz')) {

            $billId = $request->input('billplz.id');
            //run requery and check bill id
            $paymentRequest = PaymentServiceRequest::make()
                ->getBill($billId);

            $paymentData = json_decode($paymentRequest->getBody());
            $isPaid = (boolean) $paymentData->paid == true ?: false;

            if ($isPaid) {
                //do more action / update status inside db
            }

            return view('upayment::payment_completed');

        }

        abort(404);

    }
}
