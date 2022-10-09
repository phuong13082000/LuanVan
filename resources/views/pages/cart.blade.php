@extends('welcome')

@section('index')
    @include('pages.nav')

    <div class="container">
        <div class="mt-3">
            <div class="table-responsive cart_info">
                @php
                    $content = Cart::content();
                @endphp
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($content as $v_content)
                            <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{asset('uploads/sanpham/'.$v_content->options->image)}}" width="90" alt="" /></a>
                            </td>
                            <td class="cart_description">
                                <h4>{{$v_content->name}}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($v_content->price).' '.'vnđ'}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <form action="{{url('/update-cart-quantity')}}" method="POST">
                                        @csrf
                                        <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}">
                                        <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                        <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-primary btn-sm">
                                    </form>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    @php
                                        $subtotal = $v_content->price * $v_content->qty;
                                        echo number_format($subtotal).' '.'vnđ';
                                    @endphp
                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{url('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <section id="do_action">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="total_area">
                            <ul>
                                <li>Tổng <span>{{Cart::total().' '.'vnđ'}}</span></li>
                                <li>Thuế <span>{{Cart::tax().' '.'vnđ'}}</span></li>
                                <li>Phí vận chuyển <span>Free</span></li>
                                <li>Thành tiền <span>{{Cart::total().' '.'vnđ'}}</span></li>
                            </ul>

                            @if(Auth::user()!=NULL)
                                <a class="btn btn-primary check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
                            @else
                                <a class="btn btn-primary check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#do_action-->
    </div>

@endsection

