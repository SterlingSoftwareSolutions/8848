<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style>
			.table, .table th, .table td {
			  border-bottom: 1px solid black;
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
						<td style="width: 60%">
							@php
								$path = public_path('/images/logoecom.png');
								$type = pathinfo($path, PATHINFO_EXTENSION);
								$data = file_get_contents($path);
								$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
							@endphp
							<img src="{{$base64}}>"/>
						</td>
						<td style="width: 40%; font-size: 14px;">
							<p>Customer Name: @if($order->user)<span>{{$order->user->first_name}} {{$order->user?->last_name}}</span>@else<span style="color: red;">No User</span>@endif</p>
							<p>Order ID: <span>{{$order->reference}}</span></p>
							<p>Date/Time: <span>{{ \Carbon\Carbon::parse($order->created_at)->format('Y/m/d h:i A') }}</span></p>
						</td>
					</tr>
				</table>
			</div>
			<div style="margin-top: 20px;">
				<h3>Order Item List</h3>
				<table style="width: 100%; font-size: 15px;" class="table">
					<thead style="font-weight: bold;">
						<td>QTY</td>
						<td>SKU</td>
						<td>Product</td>
						<td>Variant</td>
						<td>Unit</td>
						<td>Notes</td>
					</thead>
					@foreach($order->items as $item)
					<tr>
						<td>
							{{$item->quantity}}
						</td>
						<td>
							{{$item->variant->sku}}
						</td>
						<td>
							{{$item->variant->product->title}}
						</td>
						<td>
							{{$item->variant->name}}
						</td>
						<td>
							{{$item->variant->units}}
						</td>
						<td style="min-width: 150px;">
							<div style="float: right; padding: 5px; border: 1px solid black; margin-top: 3px;"></div>
						</td>
					</tr>
					@endforeach
				</table>
				<table style="width: 33%; margin-left: auto; font-size: 15px;" class="table">
					<thead style="font-weight: bold;">
						<td>Products</td>
						<td>Quantity</td>
					</thead>
					<tr>
						<td style="width: 50%">
							{{$order->items->count()}}
						</td>
						<td style="width: 50%">
							{{$order->items->sum('quantity')}}
						</td>
					</tr>
				</table>
			</div>
			<div>
				<h3>Order Notes</h3>
				<p style="font-size: 15px; border: 1px solid black; min-height: 4em">{{$order->notes}}</p>
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
						Signature
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>