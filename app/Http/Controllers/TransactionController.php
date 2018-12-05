<?php 

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    /**
     * Get List of Transactions
     *
     * @access  public
     * @param   
     * @return  json(array)
     */

    public function getTransactions(Request $request, Transaction $transaction)
    {
        $transactions = $transaction->getTransactions($request);
        return response()->json([
            'status' => 'success',
            'result' => [
                'total' => $transactions->total(), 
                'rows' => $transactions->items()
            ],
            'messages' => null
        ]);
    }
    
    /**
     * Get Single Transaction
     *
     * @access  public
     * @param   
     * @return  json(array)
     */

    public function getSingleTransaction(Request $request)
    {
        $rules = [
            'invoice' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            $companyInfo = Setting::whereIn('meta_key', [
                'company_name', 
                'company_address', 
                'company_phone_number',
                'company_email'
            ])->get()->toArray();

            $transaction = Transaction::where('invoice', $request->invoice)
                ->with(['transactionDetails' => function($query) {
                    $query->with('product');
            }])->first();

            return response()->json([
                'status' => 'success',
                'result' => [
                    'company_info' => $companyInfo,
                    'transaction' => $transaction
                ],
                'messages' => null
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'result' => $validator->messages(),
                'messages' => null
            ]);
        }
    }
}