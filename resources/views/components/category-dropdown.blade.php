@php
    $count = 0;

    $sub_categories = [];
    for ($i = 0; $i < 36; $i++) {
        $randomNumber = rand(0, 3);
        $category = $categories[$randomNumber];
        // Set properties of the category object
        $sub_categories[] = $category;
    }
@endphp
<div class="d-lg-block">
    <div class="dropdown m-0 p-0">
        <button class="m-0 btn shadow-none d-flex align-items-center justify-content-between bg-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height: 65px;padding: 0 1rem;">
            <h6 class="m-0">Categories</h6>
        </button>
        <div class="dropdown-menu stylish-menu" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-item-container">
                    @foreach ($categories as $category)
                    <span class="dropdown-item">
                        {{ucfirst($category->nom)}}
                        <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                    </span>
                    <div class="sub">
                        @foreach ($categories->chunk(10) as $bash)
                            <div class="bash">
                                @foreach ($bash as $_category)
                                    <a class="sub-category" href="{{route('product.shop',["_category"=>Str::slug($_category->nom),'id'=> (int)$_category->id])}}">{{ucfirst($_category->nom).strval($count)}}</a>
                                    @php
                                        $count++;
                                    @endphp
                                @endforeach
                                
                            </div>
                        @endforeach
                                 
                    </div>
                @endforeach
                </div>            
            
        </div>
    </div>
</div>


