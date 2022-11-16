@extends('website.layout')
@section('content')
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>Cart</h3>
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
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @php
                    $totalAmount=0;
                    @endphp
                @foreach($carts as $cart)
                    <tr class="text-black-50">
                        <td>{{$cart->getProduct->title}}</td>
                        <td>{{$cart->stock}}</td>
                        <td>{{$cart->price}}</td>
                        <td>
                            <img src="{{ Storage::url($cart->image) }}" height="75" width="75" alt="" />
                        </td>
                        <td>
                            <form action="{{ route('delete.cart.product',['cart'=>$cart->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure to delete this?')" type="submit" class="btn btn-outline-danger m-2">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $totalAmount=$totalAmount+$cart->price;
                    @endphp
                @endforeach
                </tbody>
            </table>
            <div>
                    <h3>Total Price : {{$totalAmount}}</h3>
            </div>
            <div class="btn-box">
                <a href="{{route('order.product')}}">
                    Cash On Delivery
                </a>

                <a href="{{route('stripe',['totalAmount'=>$totalAmount])}}" style="margin-left: 20px">
                    Payment on Card
                </a>
            </div>
        </div>
    </div>
</section>
<!-- end product section -->
@endsection
