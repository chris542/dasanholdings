<div class="categories col-md-2 hidden-xs hidden-sm">
    <ul>
        @foreach($navCat as $cat)
            @if($cat->id == $category->id)
                <li class="active"><a href="/category/{{ $cat->id }}">{{ $cat->name }} ({{ count($cat->product) }})</a></li>
            @else
                <li><a href="/category/{{ $cat->id }}">{{ $cat->name }} ({{ count($cat->product) }})</a></li>
            @endif
        @endforeach
    </ul>
    <!--BANNERS HERE!!!!-->

    <!--BANNERS END!!!!-->
</div>

