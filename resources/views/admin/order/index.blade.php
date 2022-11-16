@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mx-auto" style="width: 200px;">All Order</h3>
                    <div class="table-responsive">
                        <table id="mytable" class="table text-start align-middle table-hover mb-0">
                            <thead>
                            <tr class="text-white">
                                <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                <th scope="col">Name</th>
                                <th scope="col">Mail Address</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Product Title</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Price</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Delivery Status</th>
                                <th scope="col">Image</th>
                                <th scope="col">Delivered</th>
                                <th scope="col">Print Pdf</th>
                                <th scope="col">Send Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr class="text-white">
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>{{$order->getUser->name}}</td>
                                    <td>{{$order->getUser->email}}</td>
                                    <td>{{$order->getUser->address}}</td>
                                    <td>{{$order->getUser->phone}}</td>
                                    <td>{{$order->title}}</td>
                                    <td>{{$order->stock}}</td>
                                    <td>{{$order->price}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>{{$order->delivery_status}}</td>


                                    <td>
                                        <img src="{{ Storage::url($order->image) }}" height="75" width="75" alt="" />
                                    </td>
                                    @if($order->delivery_status=='Processing')
                                    <td><a href="{{route('delivered',['id'=>$order->id])}}" class="btn btn-sm btn-outline-success">Delivered</a></td>
                                    @else
                                        <td>Delivered</td>
                                    @endif
                                    <td><a href="{{route('pdf',['id'=>$order->id])}}" class="btn btn-sm btn-outline-info">Pdf</a></td>
                                    <td><a href="{{route('send.email',['id'=>$order->id])}}" class="btn btn-sm btn-outline-light">Send</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
