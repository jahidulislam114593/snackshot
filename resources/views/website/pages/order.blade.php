@extends('website.layouts.default')
@section('content')

<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="h5 mb-4 text-center">Order Table</h3>
					<div class="table-wrap">
						<table class="table">
                            
						  <thead class="thead-primary">
						    <tr>
						      <th>Product Image</th>
						      <th>Product Title</th>
						      <th>Price</th>
						      <th>Quantity</th>
						      <th>Payment Status</th>
						      <th>Delivery Status</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
                          @foreach($order as $order)
						    <tr class="alert" role="alert">
						    	<td>
                                    <img src="product/{{$order->image}}" class="img-fluid rounded-3"style="width: 120px;" alt="Book">
						    	</td>
						      <td>
						      	<div class="title">
						      		<span>{{ $order->product_title }}</span>
						      	</div>
						      </td>
						      <td>{{ $order->price }}</td>
						      <td class="quantity"><div class="input-group">{{ $order->quantity }}</div>
				          </td>
				          <td>{{ $order->payment_status }}</td>
				          <td>{{ $order->delivery_status }}</td>
						      <!-- <td>
						      	<button type="button" class="btn btn-danger" value="">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span></button>
				        	</td> -->
                            <td>
                                @if($order->delivery_status=='processing')
                                    <a class="btn btn-outline-danger" onclick="return confirm('Are You Sure You Want To Cancel This Order??')" 
                                    href="{{ url('cancel_order',$order->id) }}">Cancel Order</a>
                                @else   
                                <div class="btn btn-primary">Not Allowed</div>
                                @endif
                            </td>
						    </tr>
                            @endforeach
						  </tbody>
                          
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection