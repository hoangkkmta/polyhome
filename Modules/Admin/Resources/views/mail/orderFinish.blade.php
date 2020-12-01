<h1>Cảm ơn quý khách đã đến với Người Tìm Trọ - Trọ Tìm Người</h1>
<h3>Những dịch vụ của quý khách sử dụng</h3>
<table border="1" cellpadding="0" cellspacing="0">
    <tr>
        <th style="width: 60px">#</th>
        <th style="width: 120px">Tên dịch vụ</th>
        <th style="width: 120px">Giá tiền</th>
    </tr>
    <tr>
        @foreach ($listServiceOrders as $item)
            <tr>
                <td> {{$loop->iteration}} </td>
                <td>{{$item->service->name}}</td>
                <td>{{ number_format($item->price, 0, ',', ' ') }} đ</td>
            </tr>
        @endforeach
    </tr>
</table>
<br>
<hr>
<h2>Khách hàng đã thanh toán: {{$order->price}}</h2>
<br>
<p>
