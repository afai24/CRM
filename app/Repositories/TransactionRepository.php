<?php
namespace crm\Repositories;
use crm\Client;
use crm\Transaction;
class TransactionRepository
{
	public function forClient(Client $client)	
	{
		return Transaction::where('client_id',$client->id)
				->orderBy('created_at','des')
				->get();
	}
}