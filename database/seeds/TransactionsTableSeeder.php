<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Transaction::class, 50)
            ->create()
            ->each(function ($transaction) {
                $products = factory(App\Models\Product::class, 5)->create();
                for ($i = 1; $i <= rand(1, 10); $i++) {
                    $transaction->transactionDetails()
                        ->save(factory(App\Models\TransactionDetail::class)
                        ->make([
                            'product_id' => $products[rand(0, 4)]->id,
                            'transaction_id' => $transaction->id 
                        ]));
                }
            });
    }
}
