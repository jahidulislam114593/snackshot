@extends('website.layouts.default')
@section('content')
  
<section class="h-100 h-custom">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">


    
        <div class="table-responsive">
          @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              {{session()->get('message')}}
            </div>
          @endif 
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="h5" style="color: black;">Shopping Bag</th>
                <th scope="col" style="color: black;">Quantity</th>
                <th scope="col" style="color: black;">Price</th>
                <th scope="col" style="color: black;">Action</th>
              </tr>
            </thead>
            <tbody>
            
            <?php  $totalprice=0; ?>
            @foreach($cart as $cart)
              <tr>
                <th scope="row">
                  <div class="d-flex align-items-center">
                    <img src="product/{{$cart->image}}" class="img-fluid rounded-3"
                      style="width: 120px;" alt="Book">
                    <div class="flex-column ms-4">
                      <p class="mb-2">{{ $cart->product_title }}</p>
                    </div>
                  </div>
                </th>
                
                <td class="align-middle">
                  <div class="d-flex flex-row">
                  {{ $cart->quantity }}
                  </div>
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;">${{ $cart->price }}</p>
                </td>
                <td class="align-middle">
                  <a href="{{ url('remove_item',$cart->id) }}" onclick="return confirm('Are you sure?')" class="mb-0"><i class="fas fa-times"></i></a>
                </td>
              </tr>

              <?php  $totalprice=$totalprice + $cart->price; ?>  
              @endforeach

            </tbody>
          </table>
        </div>

        <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
          <div class="card-body p-4">

              
              <?php
                $taxRate = 0.00;
                $subtotal = $totalprice;
                $shipping = 5;
                $tax = $subtotal * $taxRate;
                $total = $subtotal + $shipping + $tax;
              ?>


<div class="col-lg-4 col-xl-12">
    <div class="d-flex justify-content-between" style="font-weight: 500;">
        <p class="mb-2">Subtotal</p>
        <p class="mb-2">${{ $totalprice }}</p>
    </div>

    <div class="d-flex justify-content-between" style="font-weight: 500;">
        <p class="mb-0">Shipping</p>
        <p class="mb-0">$5</p>
    </div>

    <hr class="my-4">

    <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
        <p class="mb-2">Total (tax included)</p>
        <p class="mb-2">${{ $total }}</p>
    </div>

    <div class="d-flex justify-content-end">
        <a href="{{ url('cash_order') }}" class="btn btn-secondary">Cash on Delivery</a>
        <div style="width: 10px;"></div>
        <!-- <a href="{{ url('stripe',$total) }}" class="btn btn-primary btn-lg"> -->
        <a href="{{ url('stripe',$total ) }}" class="btn btn-primary btn-lg">

            <div class="d-flex justify-content-between">
                <span>Pay By Card</span>
                <span> ${{ $total }}</span>
            </div>
        </a>
    </div>
</div>




            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>

 

<style>
@media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}

body {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

footer {
  margin-top: auto;
}


</style>

@endsection