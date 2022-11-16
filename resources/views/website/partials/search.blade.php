<section class="why_section layout_padding">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="full">
                    <form action="{{route('search.product')}}" method="GET">
                        @csrf
                        <fieldset>
                            <input type="text" placeholder="Enter your full name" name="search" required />
                            <input type="submit" value="Search" />

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
