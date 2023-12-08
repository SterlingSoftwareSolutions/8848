<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style>
			.table, .table th, .table td {
			  border: 1px solid black;
			  border-collapse: collapse;
			}

			.table td{
				padding: 10px;
			}

			body{
				font-family: sans-serif;
			}
		</style>
	</head>

	<body>
		<div style="padding: 30px; min-height: 89%;">
			<div>
				<table style="width: 100%;">
					<tr>
						<td style="width: 66%">
							@php
								$path = public_path('/images/logo.png');
								$type = pathinfo($path, PATHINFO_EXTENSION);
								$data = file_get_contents($path);
								$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
							@endphp
							<img src="{{$base64}}>"/>
						</td>
						<td style="width: 33%; font-size: 14px;">
							<p>Customer Name: @if($order->user)<span>{{$order->user->first_name}} {{$order->user?->last_name}}</span>@else<span style="color: red;">No User</span>@endif</p>
							<p>Order ID: <span>{{$order->reference}}</span></p>
							<p>Date: <span>{{ \Carbon\Carbon::parse($order->created_at)->format('Y/m/d') }}</span></p>
						</td>
					</tr>
				</table>
			</div>
			<div style="margin-top: 40px;">
				<h2>Order Item List</h2>
				<table style="width: 100%;" class="table">
					<thead style="font-weight: bold;">
						<td>Product Name</td>
						<td>Variant Name</td>
						<td>Quantity</td>
					</thead>
					@foreach($order->items as $item)
					<tr>
						<td style="width: 33%">
							{{$item->variant->product->title}}
						</td>
						<td style="width: 33%">
							{{$item->variant->name}}
							<p style="font-size: 12px; line-height: 80%;"><b> SKU:</b> {{$item->variant->sku}}</p>
						</td>
						<td style="width: 33%">
							{{$item->quantity}}
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
		<div style="position: relative; bottom: 0;">
			<table style="width: 100%;">
				<tr>
					<td style="text-align: center;">
						......................................<br>
						Approve
					</td>
					<td style="width: 100%">
						
					</td>
					<td style="text-align: center;">
						......................................<br>
						Singature
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>