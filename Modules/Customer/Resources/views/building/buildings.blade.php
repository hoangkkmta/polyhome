@foreach ($data['building'] as $row)
<div class="col-xs-6 col-md-3 col-sm-4">
    <div class="card-product-grid">
        <div class="card-product-grid--item">
            <div class="promotel-image">
                <div class="promotel-image-wrap">
                    <a href="{{ route('customer.building.detail', $row->slug) }}">
                        <?php $image = json_decode($row->image) ?>
                        <img src="{!! url('building/'.  $image[0]) !!}" alt="{{ $row->name }}">
                    </a>
                </div>
            </div>
            <div class="promotel-content">
                <div class="promotel-content-wrap">
                    <div class="promotel__type bold"
                        style="-webkit-box-orient: vertical;">
                        Thuê phòng trọ, chung cư mini
                    </div>
                    <a href="{{ route('customer.building.detail', $row->slug) }}">
                        <div class="promotel-title">{{ $row->name }}</div>
                    </a>
                    <div class="promotel-price">
                        <b>
                            @foreach ($row->room as $key => $item)
                                @if ($key === 0)
                                    {{ number_format($item->price) }}
                                @endif
                            @endforeach đ/tháng
                        </b>
                    </div>
                    <div class="promotel-address">{{ $row->district->name }}, Hà Nội </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
