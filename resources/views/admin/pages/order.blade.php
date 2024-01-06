@extends('admin.layouts.default')
@section('main')

<div class="row">
              <div class="col-12 grid-margin">
              
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Order Status</h4>
                    <h4 style="padding-top:20px;">Order Status</h4>
                    <div class="table-responsive">
                    
                      <table class="table">
                      <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{ url('search') }}" method="get">
                        @csrf
                          <input type="text" class="form-control" placeholder="Search products" name="search">
                      </form>
                        <thead>
                          <tr>
                            <th>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </th>
                            <th> Order No </th>
                            <th> Image </th>
                            <th> Client Name </th>
                            <th> Client Email </th>
                            <th> Address </th>
                            <th> Phone </th>
                            <th> Product Title </th>
                            <th> Product Price </th>
                            <th> Product Quantity </th>
                            <th> Payment Status </th>
                            <th> Delivery Status </th>
                            <th> Delivered </th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse($order as $order)
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td> {{$order->id}} </td>
                            <td>
                              <img src="/product/{{ $order->image }}" alt="image" />
                            </td>
                            <td>
                              <span class="pl-2">{{$order->name}}</span>
                            </td>
                            <td> {{$order->email}} </td>
                            <td> {{$order->address}} </td>
                            <td> {{$order->phone}} </td>
                            <td> {{$order->product_title}} </td>
                            <td> {{$order->price}} </td>
                            <td> {{$order->quantity}} </td>
                            <td>
                              <div class="badge badge-outline-success"> {{$order->payment_status}}</div>
                            </td>
                            <td>
                              <div class="badge badge-outline-success"> {{$order->delivery_status}}</div>
                            </td>
                            <td>
                            @if($order->delivery_status=='processing')
                              <a class="badge badge-danger" onclick="return confirm('Are You Sure That Product is Delivered!!')" href="{{ url('delivered',$order->id) }}"> Processing...</a>
                             @else
                             <div class="badge badge-primary" href="{{ url('delivered',$order->id) }}"> Successfully</div>
                            @endif
                            </td>
                          </tr>
                          
                          
                          @empty
                          <tr>
                            <td>
                              <div class="badge badge-outline-danger"> No Data Founded</div>
                            </td>
                          </tr>


                          @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>


@endsection