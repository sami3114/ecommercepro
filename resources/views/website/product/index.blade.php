@extends('website.layout')
@section('content')
<!-- inner page section -->
<section class="inner_page_head">
    <div class="container_fuild">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <h3>Product Grid</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end inner page section -->
<!-- product section -->
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{route('product.detail',['id'=>$product->id])}}" class="option1">
                                Product Detail
                            </a>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="{{ Storage::url($product->image) }}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{$product->title}}
                        </h5>
                        @if($product->discount_price!=null)
                        <h6 style="color: red">
                            {{$product->discount_price}}
                        </h6>
                            <h6 style="text-decoration: line-through;color: #0d6efd">
                                $ {{$product->price}}
                            </h6>
                        @else
                        <h6 style="color: #0d6efd">
                            $ {{$product->price}}
                        </h6>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-start">
            <span style="padding-top: 20px">
                {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
            </span>
        </div>
    </div>
</section>
<!-- end product section -->
@endsection
