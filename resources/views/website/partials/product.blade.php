<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        @include('website.partials.search')
        <div class="row">
                @foreach($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="box">
                            <div class="option_container">
                                <div class="options">
                                    <a href="{{route('product.detail',['id'=>$product->id])}}" class="option1">
                                        Product Detail
                                    </a>

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
@include('website.comment.comment')
