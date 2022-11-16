<!DOCTYPE html>

<html>
<head>
    <meta charset = "utf-8">
    <title>invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
        body{background-color: #ffe8d2;font-family: 'Montserrat', sans-serif}.card{border:none}.logo{background-color: #eeeeeea8}.totals tr td{font-size: 13px}.footer{background-color: #eeeeeea8}.footer span{font-size: 12px}.product-qty span{font-size: 12px;color: #dedbdb}
    </style>
</head>

<body>
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-left logo p-2 px-5">
                    <img width="250" src="{{asset('images/logo.png')}}" alt="#" />
                </div>
                <div class="invoice p-5">
                    <h5 class="text-black-50">Your order Confirmed!</h5>
                    <span class="font-weight-bold d-block mt-4">Hello, {{$order->getUser->name}}</span>
                    <span>You order has been confirmed and will be shipped in next two days!</span>
                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td>
                                    <div class="py-2">
                                        <span class="d-block text-muted">Order Date</span>
                                        <span>12 Jan,2018</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="py-2">
                                        <span class="d-block text-muted">Order No</span>
                                        <span>MT12332345</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="py-2">
                                        <span class="d-block text-muted">Payment</span>
                                        <span><img src="https://img.icons8.com/color/48/000000/mastercard.png" width="20" /></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="py-2">
                                        <span class="d-block text-muted">Shiping Address</span>
                                        <span>{{$order->getUser->address}}</span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td width="20%">
                                        <img src="{{ Storage::url($order->image) }}" height="75" width="75" alt="" />
                                    </td>
                                    <td width="60%">
                                        <span class="font-weight-bold">{{$order->title}}</span>
                                            <div class="product-qty">
                                                <span class="d-block">Quantity:{{$order->stock}}</span>
                                                    <span>Color:Dark</span>
                                            </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-right">
                                            <span class="font-weight-bold">$67.50</span>
                                        </div>
                                    </td>
{{--                                    <td>{{$order->getUser->name}}</td>--}}
{{--                                    <td>{{$order->getUser->email}}</td>--}}
{{--                                    <td>{{$order->getUser->address}}</td>--}}
{{--                                    <td>{{$order->getUser->phone}}</td>--}}
{{--                                    <td>{{$order->title}}</td>--}}
{{--                                    <td>{{$order->stock}}</td>--}}
{{--                                    <td>{{$order->price}}</td>--}}
{{--                                    <td>{{$order->payment_status}}</td>--}}
{{--                                    <td>{{$order->delivery_status}}</td>--}}

                                </tr>
                            @endforeach
                            <tr>
                                <td width="20%">

                                    <img src="https://i.imgur.com/u11K1qd.jpg" width="90">
                                </td>
                                <td width="60%">
                                    <span class="font-weight-bold">Men's Sports cap</span>
                                    <div class="product-qty">
                                        <span class="d-block">Quantity:1</span>
                                        <span>Color:Dark</span>

                                    </div>
                                </td>
                                <td width="20%">
                                    <div class="text-right">
                                        <span class="font-weight-bold">$67.50</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <img src="https://i.imgur.com/SmBOua9.jpg" width="70">
                                </td>
                                <td width="60%">
                                    <span class="font-weight-bold">Men's Collar T-shirt</span>
                                    <div class="product-qty">
                                        <span class="d-block">Quantity:1</span>
                                        <span>Color:Orange</span>
                                    </div>
                                </td>
                                <td width="20%">
                                    <div class="text-right">
                                        <span class="font-weight-bold">$77.50</span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                            <table class="table table-borderless">
                                <tbody class="totals">
                                <tr>
                                    <td>
                                        <div class="text-left">
                                            <span class="text-muted">Subtotal</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <span>$168.50</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-left">
                                            <span class="text-muted">Shipping Fee</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <span>$22</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-left">
                                            <span class="text-muted">Tax Fee</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <span>$7.65</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-left">

                                            <span class="text-muted">Discount</span>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <span class="text-success">$168.50</span>
                                        </div>
                                    </td>
                                </tr>


                                <tr class="border-top border-bottom">
                                    <td>
                                        <div class="text-left">

                                            <span class="font-weight-bold">Subtotal</span>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <span class="font-weight-bold">$238.50</span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p>We will be sending shipping confirmation email when the item shipped successfully!</p>
                    <p class="font-weight-bold mb-0">Thanks for shopping with us!</p>
                    <span>Nike Team</span>
                </div>
                <div class="d-flex justify-content-between footer p-3">
                    <span>Need Help? visit our <a href="#"> help center</a></span>
                    <span>12 June, 2020</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
