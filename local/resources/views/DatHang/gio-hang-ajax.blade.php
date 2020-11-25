<div class="col-lg-12 col-md-12 col-12">
                        <h3 class="display-5 mb-2 text-center">Giỏ hàng cá nhân</h3>
                        <p class="mb-5 text-center">
                            <i class="text-info font-weight-bold">{{$dem}} </i> sản phẩm trong giỏ hàng của bạn
                        </p>
                        <table id="shoppingCart" class="table table-condensed table-responsive">
                            <thead>
                                <tr>
                                    <th style="width:60%">Sản phẩm</th>
                                    <th style="width:12%">Đơn giá</th>
                                    <th style="width:10%">Số lượng</th>
                                    <th style="width:16%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($dem != 0)
                                @foreach($sanpham as $key => $sp)
                                <tr>
                                    <input type="hidden" id="idsp{{$sp->masp}}" value="{{$sp->masp}}" />
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-md-3 text-left">
                                                <img src="contents/images/{{$sp->anhminhhoa}}" alt=""
                                                    class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                            </div>
                                            <div class="col-md-9 text-left mt-sm-2">
                                                <h4>{{$sp->tensp}}</h4>
                                                <p class="font-weight-light">Brand &amp; Name</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">{{$sp->dongia}}</td>
                                    <input type="hidden" value="{{$sp->dongia}}" id="giahidden{{$sp->masp}}" />
                                    <td data-th="Quantity">
                                        <input type="number" class="form-control form-control-lg text-center"
                                            value="{{$sp->soluong}}" id="soluong{{$sp->masp}}">
                                    </td>
                                    <td class="actions" data-th="">
                                        <div class="text-right">
                                            <button id="capnhat{{$sp->masp}}"
                                                class="btn btn-white border-secondary bg-white btn-md mb-2">
                                                <i class="fas fa-sync"></i>
                                            </button>
                                            <a href="#" data-toggle="modal" data-target="#xnxoa{{$sp->masp}}"
                                                type="button"
                                                class="btn btn-white border-secondary bg-white btn-md mb-2">
                                                <i class="fas fa-trash"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>


                                <!-- Xacs nhan xoa -->
                                <div class="modal fade" id="xnxoa{{$sp->masp}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn chắc chắn muỗn xóa sản phẩm này khỏi giỏ hàng?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button id="xoa{{$sp->masp}}" type="button" class="btn btn-danger">Xác
                                                    nhận</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                //cap nhat so luong
                                $(document).ready(function() {
                                    $("#capnhat{{$sp->masp}}").click(function() {
                                        let sl = document.getElementById('soluong{{$sp->masp}}').value;
                                        let idsp = document.getElementById('idsp{{$sp->masp}}').value;
                                        let _token = $('meta[name="csrf-token"]').attr('content');

                                        if (sl == 0) {
                                            $("#xnxoa{{$sp->masp}}").modal('show');
                                            return;
                                        }

                                        debugger
                                        $.ajax({
                                            type: 'Get',
                                            url: '{{URL::to("/cap-nhat-so-luong-san-pham")}}',
                                            data: {
                                                soluong: sl,
                                                masp: idsp
                                            },
                                            contentType: 'html',
                                            success: function(response) {
                                                $("#ajax_request").html(response);
                                                myFunction('Cập nhật số lượng thành công!');
                                            }
                                        })
                                    })
                                })

                                // xoa sp
                                $(document).ready(function() {
                                    $("#xoa{{$sp->masp}}").click(function() {
                                        $("#xnxoa{{$sp->masp}}").modal('hide');
                                        let idsp = document.getElementById('idsp{{$sp->masp}}').value;
                                        let _token = $('meta[name="csrf-token"]').attr('content');

                                        debugger
                                        $.ajax({
                                            type: 'Get',
                                            url: '{{URL::to("/xoa-khoi-gio-hang")}}',
                                            data: {
                                                masp: idsp
                                            },
                                            contentType: 'html',
                                            success: function(response) {
                                                $("#ajax_request").html(response);
                                                myFunction('Xóa sản phẩm khỏi giỏ hàng thành công!');
                                            }
                                        })
                                    })
                                })
                                </script>
                                @endforeach
                                @else
                                <tr>
                                    <td>
                                        <span>Không có sản phẩm</span>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        @if($dem != 0)
                        <div class="float-right text-right">
                            <h4>Tổng thanh toán:</h4>
                            <h1 id="tong">{{$tong}}</h1>
                        </div>
                        @endif
                    </div>