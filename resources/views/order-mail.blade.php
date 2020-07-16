<h3><small>ผู้ใช้งาน : {{$customer}}</small></h3>
<h4><small>POOLSHOPBKK ขอยืนยันการทำรายการสั่งซื้อสินค้า ดังนี้ </small></h4>
<p class="mb-1"><small>Order ID         : {{$order_id}}</small></P>
<p class="mb-1"><small>วันและเวลาทำรายการ : {{$date}}</small></P>
<p><strong>รายการสินค้า</strong></P>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th>สินค้า</th>
            <th>จำนวน</th>
            <th>ราคา</th>
            <th>ราคารวม</th>
        </tr>
    </thead>
    <tbody>
        @foreach($product as $index=>$val)
            <tr>
                <td>{{$val->products[0]->product_name}}</td>
                <td align="right">{{number_format($val->product_amount)}}</td>
                <td align="right">{{number_format($val->products[0]->price)}}</td>
                <td align="right">{{number_format(($val->products[0]->price * $val->product_amount))}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="row">
    <div class="col-6" style="float:rigth">
        <p class="mb-2"><strong>รวมค่าบริการจัดส่ง {{number_format($total)}} ฿</strong></P>
    </div>
</div>
<p class="mb-2"><small>
  หมายเหตุ :  กรุณาชำระเงินภายใน​ 24 ​ชั่วโมง​ มิฉะนั้นระบบจะยกเลิกการสั่งซื้อสินค้าโดยอัตโนมัติ​
</small></P>
<p class="mb-2"><small>
  Remark : Full payment must be received within 24 hours. If no payment is received the order will be canceled.
</small></P>
<p>หากท่านมีข้อสงสัยหรือต้องการสอบถามรายละเอียดเพิ่มเติม กรุณาติดต่อที่ {{$tel}}</p>
<p>for further assistance please contact {{$tel}}</p>

<a href="{{ url('/v1/payment/old/'.$customer_id) }}"> <b> <u> ชำระเงินคลิ๊กที่นี (Click here for payment)</u> </b> </a>
<hr>
<footer class="blockquote-footer">Thank you. <cite title="Source Title">POOLSHOPBKK</cite></footer>
