@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Create Invoice
            </div>
            <div class="card-body">
                <form action="{{ route('invoice.store') }}" method="post" class="form">
                    @csrf
                    <div class="row">
                        <div class="col4">
                            <div class="form-group">
                                <label for="customer_name">Customer name</label>
                                <input type="text" name="customer_name" class="form-control">
                                @error('customer_name')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col4">
                            <div class="form-group">
                                <label for="customer_email">Customer email</label>
                                <input type="text" name="customer_email" class="form-control">
                                @error('customer_email')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col4">
                            <div class="form-group">
                                <label for="customer_mobile">Customer mobile</label>
                                <input type="text" name="customer_mobile" class="form-control">
                                @error('customer_mobile')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col4">
                            <div class="form-group">
                                <label for="company_name">Company name</label>
                                <input type="text" name="company_name" class="form-control">
                                @error('company_name')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col4">
                            <div class="form-group">
                                <label for="invoice_number">Invoice Number</label>
                                <input type="text" name="invoice_number" class="form-control">
                                @error('invoice_number')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col4">
                            <div class="form-group">
                                <label for="invoice_date">Invoice Date</label>
                                <input type="text" name="invoice_date" class="form-control">
                                @error('invoice_date')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table" id="invoice_details">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product name</th>
                                    <th>Unit</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cloning_row" id="0">
                                    <td>#</td>
                                    <td><input type="text" name="product_name[]" id="product_name" class="product_name form-control"></td>
                                    @error('product_name')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                    <td><select name="unit[]" id="unit" class="unit form-control">
                                            <option value=""></option>
                                            <option value="piece">Piece</option>
                                            <option value="g">Gram</option>
                                            <option value="kg">Kilo Gram</option>
                                        </select>
                                    </td>
                                    @error('unit')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                    <td><input type="number" step="0.1" name="quantity[]" id="quantity" class="quantity form-control"></td>
                                    @error('quantity')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                    <td><input type="number" step="0.1" name="unit_price[]" id="unit_price" class="unit_price form-control"></td>
                                    @error('unit_price')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                    <td><input type="number" step="0.1" name="row_sub_total[]" id="row_sub_total" class="row_sub_total form-control" readonly = "readonly"></td>
                                    @error('row_sub_total')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                    @enderror
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <button type="button" class="btn-add btn btn-primary">Add another product</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">Sub Total</td>
                                    <td><input type="number" name="sub_total" id="sub_total" class="sub_total form-control" readonly = "readonly"></td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">Discount</td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <select name="discount_type" id="discount_type" class="discount_type custom-select">
                                                <option value="fixed">SR</option>
                                                <option value="percentage">Percentage</option>
                                            </select>
                                            <div class="input-group-append">
                                                <input type="number" step="0.1" name="discount_value" id="discount_value" class="discount_value form-control" value="0.00">
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">Vat (5%)</td>
                                    <td><input type="number" step="0.1" name="vat_value" id="vat_value" class="vat_value form-control" readonly = "readonly"></td>
                                </tr>

                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">Shipping</td>
                                    <td><input type="number" step="0.1" name="shipping" id="shipping" class="shipping form-control"></td>
                                </tr>

                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">Total Due</td>
                                    <td><input type="number" step="0.1" name="total_due" id="total_due" class="total_due form-control" readonly = "readonly"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="text-right pt-3">
                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('js/pickadate/picker.js') }}"></script>
<script src="{{ asset('js/pickadate/picker.time.js') }}"></script>
@if (config('app.locale') == 'ar')
    <script src="{{ asset('CSS/pickadate/rtl.css') }}"></script>
@endif
    <script>
        $(document).ready(function(){

            $('#invoice_details').on('keyup blur' , '.quantity' , function() {
                let $row = $(this).closest('tr');
                let quanttity = $row.find('.quantity').val() || 0;
                let unit_price = $row.find('.unit_price').val() || 0;

                $row.find('.row_sub_total').val((quanttity * unit_price).toFixed(2));

                $('.sub_total').val(sum_total('.row_sub_total'));

                $('.vat_value').val(calculate_vat());
                $('.total_due').val(sum_due_total());

            });

            $('#invoice_details').on('keyup blur' , '.unit_price' , function() {
                let $row = $(this).closest('tr');
                let quanttity = $row.find('.quantity').val() || 0;
                let unit_price = $row.find('.unit_price').val() || 0;

                $row.find('.row_sub_total').val((quanttity * unit_price).toFixed(2));

                $('.sub_total').val(sum_total('.row_sub_total'));


                $('.vat_value').val(calculate_vat());
                $('.total_due').val(sum_due_total());

            });

            $('#invoice_details').on('keyup blur' , '.discount_type' , function() {


                $('.vat_value').val(calculate_vat());
                $('.total_due').val(sum_due_total());

            });
            $('#invoice_details').on('keyup blur' , '.discount_value' , function() {


                $('.vat_value').val(calculate_vat());
                $('.total_due').val(sum_due_total());

            });
            $('#invoice_details').on('keyup blur' , '.shipping' , function() {


                $('.vat_value').val(calculate_vat());
                $('.total_due').val(sum_due_total());

            });

            let sum_total = function ($selector) {

                let sum = 0;
                $($selector).each(function (){
                    let selectorVal = $(this).val() != '' ? $(this).val() : 0;
                    sum += parseFloat(selectorVal);
                });

                return sum.toFixed(2);
            }

            let calculate_vat = function (){
                let sub_totalVal = $('.sub_total').val() || 0;
                let discount_type = $('.discount_type').val();
                let discount_Value = parseFloat($('.discount_value').val()) || 0;

                let discountVal = discount_Value != 0 ? discount_type == 'percentage' ? sub_totalVal * (discount_Value / 100) : discount_Value : 0;

                let vatVal = (sub_totalVal - discountVal) * 0.05;

                return vatVal.toFixed(2);
            }

            let sum_due_total = function() {
                let sum = 0;
                let sub_totalVal = $('.sub_total').val() || 0;

                let discount_type = $('.discount_type').val();
                let discount_Value = parseFloat($('.discount_value').val()) || 0;

                let discountVal = discount_Value != 0 ? discount_type == 'percentage' ? sub_totalVal * (discount_Value / 100) : discount_Value : 0;

                let vatVal = parseFloat($('.vat_value').val()) || 0;
                let shippingVal = parseFloat($('.shipping').val()) || 0;

                sum += sub_totalVal;
                sum -= discountVal;
                sum += vatVal;
                sum += shippingVal;
                return sum.toFixed(2);
            }

            $(document).on('click','.btn-add', function() {

                let trCount = $('#invoice_details').find('tr.cloning_row:last').length;
                let numberInncr = trCount > 0 ? parseInt($('#invoice_details').find('tr.cloning_row:last').attr('id'))+1 : 0;

                $('#invoice_details').find('tbody').append(''+

                '<tr class="cloning_row" id=" ' + numberInncr + '">'+
                    '<td><button type="button" class="btn btn-danger btn-sm delgated-btn"><i class="fa fa-minus" aria-hidden="true"></i></button> </td>'+
                    '<td><input type="text" name="product_name[]" id="product_name" class="product_name form-control"></td>'+

                    '<td><select name="unit[]" id="unit" class="unit form-control">'+
                                '<option value=""></option>'+
                                '<option value="piece">Piece</option>'+
                                '<option value="g">Gram</option>'+
                                '<option value="kg">Kilo Gram</option>'+
                        '</select>'+
                    '</td>'+

                    '<td><input type="number" step="0.1" name="quantity[]" id="quantity" class="quantity form-control"></td>'+

                    '<td><input type="number" step="0.1" name="unit_price[]" id="unit_price" class="unit_price form-control"></td>'+

                    '<td><input type="number" step="0.1" name="row_sub_total[]" id="row_sub_total" class="row_sub_total form-control" readonly = "readonly"></td>'+

                '</tr>'+
                '');

            });

            $(document).on('click','.btn-danger', function(e) {

                e.preventDefault();

                $(this).parent().parent().remove();

                $('.sub_total').val(sum_total('.row_sub_total'));

                $('.vat_value').val(calculate_vat());
                $('.total_due').val(sum_due_total());

            });

        });

    </script>
@endsection
