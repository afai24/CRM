@extends('layouts.app')

@section('content')
	<div class="container">
		@include('alerts.success')
		<a class="btn btn-primary btn-lg" href="{{ url('/transactions/create') }}">create transaction</a>
		<table class="table">
			<thead>
				<tr>
					<th>Transactions</th>
				</tr>
			</thead>
			<tbody>
			@foreach($transactions as $transaction)
				@can('owner', $transaction)
					<tr>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->date }}</td>
						<td>
							<div class="btn-group-vertical">
								{{ link_to_route('transaction.edit', $title = 'Edit', $parameter = $transaction, $attributes = ['class' => 'btn btn-primary']) }}
								@include('transaction.delete')
								
							</div>
						</td>
					</tr>
				@endcan
			@endforeach
			</tbody>
		</table>
	</div>

@endsection