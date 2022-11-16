@extends('website.layout')
@section('content')
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>View Order</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- product section -->
<section class="product_section layout_padding">
    <div class="container">
        <div class="table-responsive">
            <table id="mytable" class="table text-start align-middle table-hover mb-0">
                <thead>
                <tr class="text-black">
                    <th scope="col">Product Title</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Delivery Status</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)
                    <tr class="text-black-50">
                        <td>{{$order->getProduct->title}}</td>
                        <td>{{$order->stock}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                            <img src="{{ Storage::url($order->image) }}" height="75" width="75" alt="" />
                        </td>
                        <td>
                            @if($order->delivery_status=="Processing")
                            <a href="{{ route('cancel.order',['id'=>$order->id]) }}" onclick="return confirm('Are you sure to cancel this?')" class="btn btn-outline-danger m-2">Cancel</a
                            @else
                                Not Allowed
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
        </div>
    </div>
</section>
<!-- end product section -->
@endsection
