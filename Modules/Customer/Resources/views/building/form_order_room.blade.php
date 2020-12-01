<form action="{{ route('customer.order.room') }}" class="flat-contact-form style1 custom1" id="form-picker-view-room" method="post">
    @csrf
    <input type="hidden" name="customer_email">
    <input type="hidden" name="total_price" value="{{ $data['room']->price }}">
    <h3 class="text-uppercase"><b>Số 20D, ngách 7/155 Cầu Giấy</b></h3>
    <hr style="margin: 10px 0" />
    <div class="field clearfix">
        <div class="room-price__wrap">
            <div class="is-flex jbetween align-center detail-item-room">
                <span class="fl-item-50 text-left">Giá thuê phòng</span>
                <span class="fl-item-50 pl--12 bold text-right price__room"></span>
            </div>
            <div class="is-flex jbetween align-center detail-item-room">
                <span class="fl-item-50 text-left">Loại phòng</span>
                <span class="fl-item-50 pl--12 bold text-right type__room"></span>
            </div>
            <div class="is-flex jbetween align-center detail-item-room">
                <span class="fl-item-50 text-left">Diện tích</span>
                <span class="fl-item-50 pl--12 bold text-right area__room"></span>
            </div>
        </div>
        <hr style="margin: 10px 0 " />
        <div class="wrap-type-input">
            <div class="input-wrap room">
                <span class="span-wrap">Phòng</span>
                <select data-motel-id="30" name="room_id" id="room_id"
                    class="input-flat form-control select2 seclect_room_id"
                    style="width: 100%">
                    @foreach ($data['rooms'] as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="input-wrap dateview">
                <span class="span-wrap">Ngày xem phòng</span>
                <input readonly="readonly" autocomplete="false"
                    class="date-view-room" type="text" tabindex="1" placeholder=""
                    name="date_view_room" id="date_view_room">
            </div>
            <div class="input-wrap name">
                <span class="span-wrap">Họ và tên</span>
                <input autocomplete="false" type="text" tabindex="2" placeholder=""
                    name="customer_name" id="name">
            </div>
            <div class="input-wrap phone">
                <span class="span-wrap">Số điện thoại</span>
                <input autocomplete="false" type="text" tabindex="3" placeholder=""
                    name="customer_phone" id="phone">
            </div>
        </div>
        <div class="textarea-wrap clearboth">
            <span class="span-wrap">Ghi chú</span>
            <textarea class="type-input" tabindex="4" placeholder="" name="note"
                id="note"></textarea>
        </div>
    </div>
    <div class="modal-footer" style="text-align: center">
        <button class="flat-button bg-theme btn-hg-auto btn-grad--primary "
            id="btn-picker-dateview">Đặt lịch xem phòng</button>
    </div>
</form>
