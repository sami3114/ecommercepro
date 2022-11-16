@extends('website.layout')
@section('content')

<!-- product section -->
<section class="product_section layout_padding">
    <div class="container">
        <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto" >
                <div class="option_container">
                    <div class="options">
                    </div>
                </div>
                <div class="img-box">
                    <img height="400px" src="{{ Storage::url($product->image) }}" alt="">
                </div>
                <div class="detail-box">
                    <h5>
                        {{$product->title}}
                    </h5>
                    @if($product->discount_price!=null)
                        <h6 style="color: red">
                            Discount Price
                            <br>
                            {{$product->discount_price}}
                        </h6>
                        <h6 style="text-decoration: line-through;color: #0d6efd">
                            Price
                            <br>
                            $ {{$product->price}}
                        </h6>
                    @else
                        <h6 style="color: #0d6efd">
                            $ {{$product->price}}
                        </h6>
                    @endif
                    <h6>
                        Product Category : {{$product->getCategory->category_name}}
                    </h6>
                    <h6>
                        Product Stock Available : {{$product->stock}}
                    </h6>
                    <h6 class="text-justify">
                        Product Detail : {{$product->description}}
                    </h6>
                    <form method="POST" action="{{route('cart',['id'=>$product->id])}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <input type="number" name="stock" value="1" min="1" style="width: 100px">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" value="Add Cart">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</section>
<!-- end product section -->
@endsection
