<style type="text/css">
    @font-face {
        font-family: DejaVu Sans;
        src: url({{ asset('fonts/DejaVuSans.ttf') }});
    }
    body{
        /*font-family: "DejaVu Sans" !important;*/
    }
    .form-actions{
        display: none;
    }
    .col-md-9{
        width: 100%;
        max-width: 100%;
    }
</style>
@php
    $productList    = $invoice->orders;
    $products       = $productList->products ? json_decode($productList->products) : [];
    $index  = 1;
@endphp
<div style="text-align: right; margin-bottom: 10px">
<a href="{{ route('invoices.print', $invoice->id) }}" class="btn btn-icon btn-warning">
    <i class="fa fa-download"></i> Download PDF
</a>
</div>
<div class="wrapper" style="width: 100%; margin: auto; padding: 5px 15px; border: 2px solid green;">
    <header class="invoice-header" style="position: relative; border-bottom: 2px solid green; padding-bottom: 5px;">
        <div class="logo" style="float: left;
                width: 100px;
                height: 100px;
                background-size: contain;
                background-image: url({{ asset('vendor/core/plugins/order/images/logopdf.png') }})">
            <!--img style="width: 100px" src="{{ asset('vendor/core/plugins/order/images/logopdf.png') }}" alt="logoB"-->
        </div>
        <div class="header-right" style="margin-left: 110px">
            <h1 style="color: #ec5858; font-size: 1rem; text-transform: uppercase; text-align: left; font-weight: bold;">{{ setting('company_name') }}</h1>
            <p style="margin-bottom: 5px; font-size: 13px;">Mã số thuế: <span style="font-weight: 600; letter-spacing: 3px;">{{ setting('tax_code') }}</span></p>
            <p style="margin-bottom: 5px; font-size: 13px;">Địa chỉ: {{ setting('address') }}</p>
            <p style="margin-bottom: 5px; font-size: 13px;">
                <span class="phone" style="width: 45%; float: left;">Điện thoại: {{ setting('phone') }}</span>
                <span class="fax" style="width: 55%;  float: left;">Fax: {{ setting('fax') }}</span>
                <span style="clear: both; display: block"></span>
            </p>
            <p style="margin-bottom: 5px; font-size: 13px;">
                <span class="bank-acc" style="width: 45%; float: left;">Số tài khoản: {{ setting('bank_account') }}</span>
                <span class="bank-add" style="width: 55%; float: left;">Tại: {{ setting('bank') }}</span>
                <span style="clear: both; display: block"></span>
            </p>
        </div>
        <div style="clear: both"></div>
    </header>
    <main class="invoice-content" style="padding: 15px 0;">
        <section class="invoice-title" style="position: relative;">
            <div style="text-align: center; position: absolute; left: 25%; top: 0;">
                <h2 style="color: #ec5858; font-size: 1rem; font-weight: bold;">HÓA ĐƠN GIÁ TRỊ GIA TĂNG</h2>
                <p style="margin-bottom: 0px">
                    <span class="date" style="margin-right: 8px; float: left;">Ngày 20</span>
                    <span class="month" style="margin-right: 8px; float: left;">tháng 07</span>
                    <span class="year" style="float: left;">tháng 2019</span>
                    <span style="display: block; clear: both;"></span>
                </p>
            </div>
            <div style="font-weight: 600; width: 200px; float: right;">
                <p style="margin-bottom: 5px"><span style="width: 60px; display: inline-block; font-weight: 500;">Mẫu số</span>: {{ $invoice->orders->code }}</p>
                <p style="margin-bottom: 5px"><span style="width: 60px; display: inline-block; font-weight: 500;">Ký hiệu</span>: 00000000</p>
                <p style="margin-bottom: 5px"><span style="width: 60px; display: inline-block; font-weight: 500;">Số</span>: <span style="color: #ec5858;">0000000</span></p>
            </div>
            <div style="clear: both"></div>
        </section>
        <section class="invoice-detail" style="padding-top: 10px;">
            <p style="margin-bottom: 5px; font-size: 13px;">Họ tên người mua hàng : {{ $invoice->orders->customer_name ?? '' }}</p>
            <p style="margin-bottom: 5px; font-size: 13px;">Tên đơn vị :
                @php
                    if($invoice->orders->export_electronic_invoice)
                        echo $invoice->orders->electronic_invoice_company;
                    else
                        echo $invoice->orders->customer_company
                @endphp
            </p>
            <p style="margin-bottom: 5px; font-size: 13px;">Mã số thuế :
                @php
                    if($invoice->orders->export_electronic_invoice)
                        echo $invoice->orders->electronic_invoice_tax_code;
                    else
                        echo '..................................';
                @endphp
            </p>
            <p style="margin-bottom: 5px; font-size: 13px;">Địa chỉ :
                @php
                    if($invoice->orders->export_electronic_invoice)
                        echo $invoice->orders->electronic_invoice_address;
                    else
                        echo $invoice->orders->getFullAddressBuyer();
                @endphp
            </p>
            <p style="margin-bottom: 5px; font-size: 13px;">
                <span style="width: 50%; float: right;">Số tài khoản : ......</span>
                <span style="width: 50%; float: right;">Hình thức thanh toán:&nbsp;{{ trans(config('plugins.order.order.payments.'.$invoice->orders->payment_method) ?: '') }}</span>
                <span style="display: block; clear: both;"></span>
            </p>
        </section>
        <section class="invoice-table" style="padding-top: 20px; background: url(bg.png) no-repeat center center; background-size: 220px 60px;">
            <table style="border: 1px solid black; border-collapse: collapse; width: 100%">
                <thead>
                <tr style="border-bottom: 1px solid black;">
                    <th style="border-right: 1px solid black; vertical-align: middle; width: 50px; padding:5px">STT</th>
                    <th style="border-right: 1px solid black; vertical-align: middle; padding:5px">Tên hàng hóa dịch vụ</th>
                    <th style="border-right: 1px solid black; vertical-align: middle; width: 120px; padding:5px">Đơn vị tính</th>
                    <th style="border-right: 1px solid black; vertical-align: middle; width: 120px; padding:5px">Số lượng</th>
                    <th style="border-right: 1px solid black; vertical-align: middle; width: 120px; padding:5px">Đơn giá</th>
                    <th style="vertical-align: middle; padding:5px">Thành tiền</th>
                </tr>
                </thead>
                <tbody style="">
                @if($products)
                    @foreach($products as $product)
                        <tr style="border-bottom: 1px solid black;">
                            <td style="border-right: 1px solid black; padding:5px">{{ $index }}</td>
                            <td style="border-right: 1px solid black; padding:5px">{{ $product->name }}</td>
                            <td style="border-right: 1px solid black; padding:5px">{{ $product->unit ?? '' }}</td>
                            <td style="border-right: 1px solid black; padding:5px">{{ number_format($product->quantity, 0, '.','.') }}</td>
                            <td style="border-right: 1px solid black; padding:5px">{{ number_format($product->price, 0, '.','.') }}</td>
                            <td style="border-right: 1px solid black; padding:5px">{{ number_format($product->total, 0, '.','.') }}</td>
                        </tr>
                        @php
                            $index ++;
                        @endphp
                    @endforeach
                @endif
                @if($invoice->orders->shipping_fee)
                    <tr style="border-bottom: 1px solid black;">
                        <td style="border-right: 1px solid black; padding:5px">{{ $index }}</td>
                        <td style="border-right: 1px solid black; padding:5px">Phí vận chuyển</td>
                        <td style="border-right: 1px solid black; padding:5px"></td>
                        <td style="border-right: 1px solid black; padding:5px">1</td>
                        <td style="border-right: 1px solid black; padding:5px">{{ number_format( $invoice->orders->shipping_fee ?? 0, 0, '.','.' )  }}</td>
                        <td style="border-right: 1px solid black; padding:5px">{{ number_format( $invoice->orders->shipping_fee ?? 0, 0, '.','.' ) }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <table style="border: 1px solid black; border-collapse: collapse; width: 100%; border-top: none;">
                <tbody>
                <tr style="border-bottom: 1px solid black;">
                    <td style="width: 58%;"></td>
                    <td style="width: 200px; text-align: right; padding: 5px 0px;">Cộng tiền hàng :</td>
                    <td style="">{{ number_format($invoice->orders->total ?? 0, 0, '.','.') }}</td>
                </tr>

                <tr style="border-bottom: 1px solid black;">
                    <td style="text-align: left; padding-left: 5px 0px;">Thuế suất GTGT : {{ setting('fees_vat') }}%</td>
                    <td style="text-align: right; padding: 5px 0px;">Tiền thuế GTGT :</td>
                    <td style="padding: 5px;">{{ number_format(($invoice->orders->total * setting('fees_vat'))/100, 0, '.', '.') }}</td>
                </tr>

                <tr style="border-bottom: 1px solid black;">
                    <td></td>
                    <td style="text-align: right; padding: 5px 0px;">Tổng cộng tiền thanh toán :</td>
                    <td style="padding: 5px">{{ number_format(($invoice->orders->total - ($invoice->orders->total * setting('fees_vat'))/100),0,'.','.') }}</td>
                </tr>
                </tbody>
            </table>
            <table style="border: 1px solid black; border-collapse: collapse; width: 100%; border-top: none;">
                <tbody>
                <tr style="border-bottom: 1px solid black;">
                    <td style="text-align: left; padding:5px 0px">Số tiền viết bằng chữ : ....</td>
                </tr>
                </tbody>
            </table>
        </section>
        <section class="invoice-signature" style="width: 100%; text-align: center; padding: 5px 0; min-height: 100px;">
            <div class="invoice-customer" style="width: 50%; float: left;">
                <h3>Người mua hàng</h3>
                <p style="font-style: italic">(Ký, ghi rõ họ tên) </p>
            </div>
            <div class="invoice-buyer" style="width: 50%; float: left;">
                <h3>Người bán hàng</h3>
                <p style="font-style: italic">(Ký, đóng dấu, ghi rõ họ tên)</p>
                @if(setting('electronic_signature'))
                    <img width="100" src="{{ setting('electronic_signature') }}"/>
                @endif
            </div>
            <div style="clear: both;"></div>
        </section>
    </main>
</div>
<!--footer class="invoice-footer" style="text-align: center; font-style: italic; line-height: 1; padding: 5px 15px; max-width: 1000px; margin: auto;">
    <p>Cung cấp giải pháp hóa đơn điện tử: CÔNG TY TNHH HỖ TRỢ TRỰC TUYẾN VIETTAK, MST:0312075152, SĐT:0919680886</p>
    <p>Hóa đơn điện tử được tra cứu trực tuyến tại: <a href="http://v2.trahoadon.com.vn" target="_blank">http://v2.trahoadon.com.vn </a> </p>
    <p>Mã tra cứu của hóa đơn này: ..........</p>
</footer-->
