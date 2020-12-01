<form action="{{ route('customer.building.list') }}" method="get">
    <div class="col-md-3 col-sm-3 col-xs-12 item-wrapper">
        <div class="breadcrumb-menu">
            <nav itemscope itemtype="https://schema.org/Breadcrumb">
                <ol class="breadcrumb" itemscope
                    itemtype="https://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope
                        itemtype="https://schema.org/ListItem"> <a itemprop="item"
                            href="index.html"> <span itemprop="name">Trang chủ</span> </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li class="active"> <span>Thuê phòng trọ</span> </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12 item-wrapper fl-wrap-3">
        <div class="search-area" style="text-align: center">
            <span class="flaticon-search-2 form-control-feedback"></span>
            <input autocomplete="false" class="" type="text" tabindex="1" value="{{ request('name') }}"
                placeholder="Nhập địa chỉ" name="name" id="keyword">
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12 item-wrapper fl-wrap-2">
        <div class="search-area" style="text-align: center">
            <div class="btn-group">
                <button type="button" id="btn-show-district"
                    class="btn btn-dropdown-search btn-default dropdown-toggle"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"

                    @if (request('district_id'))
                        style="background-color: rgb(246, 94, 57); border-color: rgb(246, 94, 57); color: rgb(255, 255, 255); font-weight: 600;"
                    @endif>

                    @if (request('district_id'))
                        <?php
                            $district = DB::table('districts')->where('id', request('district_id'))->first();
                            echo $district->name;
                        ?>
                    @else
                        Khu vực
                    @endif

                </button>
                <div class="dropdown-menu dropdown-district">
                    <div style="margin-bottom: 10px;display: flow-root; clear: both">
                        <p style="width: calc(100% - 0px);float: left; font-size: 16px">
                            <b>Lựa chọn khu vực</b></p>
                    </div>
                    <div class="dropdown-area-search" style="display: flow-root;">
                        <div>
                            <input type="hidden" id="district_id" name="district_id" value="{{ request('district_id') }}">
                            @foreach ($data['district'] as $district)
                                <label class="container-checkbox"> <span class="title-district">{{ $district->name }}</span>
                                    <input data-id="1" type="radio" id="district_id" name="district_id" value="{{ $district->id }}">
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <hr style="margin: 10px 0px; clear: both">
                    <button style="width: 48%; float: right" class="btn btn-danger"
                        id="btn-remove-district">
                        Xóa
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12 item-wrapper fl-wrap-2">
        <div class="search-area" style="text-align: center">
            <div class="btn-group">
                <button type="button" id="btn-show-type_room"
                    class="btn btn-dropdown-search btn-default dropdown-toggle"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"

                    @if (request('room_category_id'))
                        style="background-color: rgb(246, 94, 57); border-color: rgb(246, 94, 57); color: rgb(255, 255, 255); font-weight: 600;"
                    @endif>

                    @if (request('room_category_id'))
                        <?php
                            $room_category = DB::table('room_categories')->where('id', request('room_category_id'))->first();
                            echo $room_category->name;
                        ?>
                    @else
                        Loại phòng
                    @endif

                </button>
                <div class="dropdown-menu dropdown-type_room">
                    <div style="margin-bottom: 10px;display: flow-root;">
                        <p style="width: calc(100% - 0px);float: left; font-size: 16px">
                            <b>Lựa chọn loại phòng</b></p>
                    </div>
                    <div class="dropdown-area-search" style="display: flow-root;">
                        <div>
                            <input type="hidden" id="room_category_id" name="room_category_id" value="{{ request('room_category_id') }}">
                            @foreach ($data['room_category'] as $room_category)
                                <label class="container-checkbox"> {{ $room_category->name }}
                                    <input type="radio" name="room_category_id" value="{{ $room_category->id }}">
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach

                        </div>
                    </div>
                    <hr style="margin: 10px 0px">
                    <button type="reset" style="width: 48%; float: right" class="btn btn-danger"
                        id="btn-remove-type">
                        Xóa
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12 item-wrapper fl-wrap-2">
        <div class="search-area" style="text-align: center">
            <div class="btn-group">
                <button type="button" id="btn-show-price"
                    class="btn btn-dropdown-search btn-default dropdown-toggle"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"

                    @if (request('price'))
                        style="background-color: rgb(246, 94, 57); border-color: rgb(246, 94, 57); color: rgb(255, 255, 255); font-weight: 600;"
                    @endif>

                    @if (request('price'))
                        {{ request('price') }}
                    @else
                        Giá thuê phòng
                    @endif

                </button>
                <div class="dropdown-menu dropdown-price">
                    <div style="margin-bottom: 10px;display: flow-root;">
                        <p style="width: calc(100% - 0px);float: left; font-size: 16px">
                            <b>Giá thuê phòng 1 tháng</b></p>
                    </div>
                    <div class="dropdown-area-search" style="display: flow-root;">
                        <input type="hidden" id="price" name="price" value="{{ request('price') }}">
                        <div>
                            <label class="container-checkbox"> 0 - 3,000,000đ
                                <input type="radio" name="price" value="0,3000000">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container-checkbox"> 3,100,000đ - 4,000,000đ
                                <input type="radio" name="price"
                                    value="3100000,4000000">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container-checkbox"> 4,100,000đ - 4,500,000đ
                                <input type="radio" name="price"
                                    value="4100000,4500000">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container-checkbox"> 4,600,000đ - 5,000,000đ
                                <input type="radio" name="price"
                                    value="4600000,5000000">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container-checkbox"> 5,100,000đ - 8,000,000đ
                                <input type="radio" name="price"
                                    value="5100000,8000000">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container-checkbox"> trên 8,000,000đ
                                <input type="radio" name="price"
                                    value="8100000,15000000">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <hr style="margin: 10px 0px">
                        <div id="inputRange">
                            <input value="" type="text" step="100000" min="0" max="5000000"
                                id="minPrice" style="float: left">
                            <input value="" type="text" step="100000" min="5000000"
                                max="15000000" id="maxPrice" style="float: right">
                        </div>
                    </div>
                    <hr style="margin: 10px 0px">
                    <button style="width: 48%; float: right" class="btn btn-danger"
                        id="btn-remove-price">
                        Xóa
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1 col-sm-1 col-xs-12 item-wrapper fl-wrap-1">
        <div class="area-remove-search">
            <button type="submit" id="btn-confirm-search" class="btn btn-grad--danger0">
                <b style="text-transform: initial">Tìm kiếm</b>
            </button>
        </div>
    </div>
</form>
