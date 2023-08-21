{{--<div class="col-md-6 mb-4">--}}
{{--    <div class="card">--}}
{{--        <div class="card-header">--}}
{{--            <h3>{{ $category->name }}</h3>--}}
{{--        </div>--}}
{{--        <div class="card-body p-0">--}}
{{--            <img src="https://via.placeholder.com/400x120" alt="" class="img-fluid">--}}
{{--        </div>--}}
{{--        <div class="card-footer">--}}
{{--            <a href="{{ route('catalog.category', ['category' => $category->slug]) }}"--}}
{{--               class="btn btn-dark">Перейти в раздел</a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<div class="col-md-4 mb-4">
    <div class="card list-item">
        <div class="card-header">
            <h3 class="mb-0">{{ $category->name }}</h3>
        </div>
        <div class="card-body p-0">
            @if ($category->image)
                @php $url = url('storage/catalog/category/thumb/' . $category->image) @endphp
                <img src="{{ $url }}" class="img-fluid" alt="">
            @else
                <img src="https://via.placeholder.com/300x150" class="img-fluid" alt="">
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('catalog.category', ['category' => $category->slug]) }}"
               class="btn btn-dark">Товары раздела</a>
        </div>
    </div>
</div>
