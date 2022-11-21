<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check Out</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php if ($this->cart->contents()) { ?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="description">Ảnh</td>
                            <td class="image">Tên Sản Phẩm</td>
                            <td class="price">Đơn Giá</td>
                            <td class="quantity">Số Lượng</td>
                            <td class="total">Tổng Tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $subtotal = 0;
                        $total = 0;
                        foreach ($this->cart->contents() as $items) {
                            $subtotal = $items['qty'] * $items['price'];
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img style="width: 200px; height:230px;" src=" <?php echo base_url('uploads/product/' . $items['options']['image']) ?>" alt=" <?php echo $items['name'] ?> "></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href=""> <?php echo $items['name'] ?></a></h4>
                                </td>
                                <td class="cart_price">
                                    <p><?php echo number_format($items['price'], 0, ',', '.')  ?>VNĐ</p>
                                </td>
                                <td class="cart_quantity">
                                    <form action=" <?php echo base_url('update-cart-item') ?> " method="POST">
                                        <div class="cart_quantity_button">
                                            <input type="hidden" value=" <?php echo $items['rowid'] ?>" name="rowid">
                                            <input class="cart_quantity_input" type="text" name="quantity" value=" <?php echo $items['qty'] ?>" autocomplete="off" size="2">
                                        </div>
                                        <!-- <input type="submit" name="capnhat" class="btn btn-primary" value="Cập nhật"></input> -->
                                    </form>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"><?php echo number_format($subtotal, 0, ',', '.')  ?>VNĐ</p>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="6" class="cart_total"><label style="margin-left: 96rem;" for="">Thành Tiền:</label>
                                <p style="margin-left: 96rem;" class="cart_total_price"><?php echo number_format($total, 0, ',', '.')  ?>VNĐ</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php } else {
                echo '<span class="text text-danger">Làm ơn thêm sản phẩm vào giỏ</span>';
            } ?>
        </div>
        <section>
            <!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-form">
                            <!--login form-->
                            <h2>Điền Thông Tin Thanh Toán</h2>
                            <?php
                            if ($this->session->flashdata('success')) {
                            ?>
                                <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?> </div>
                            <?php
                            } elseif ($this->session->flashdata('error')) {
                            ?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?> </div>
                            <?php
                            }
                            ?>
                            <form method="POST" onsubmit="return confirm('Xác nhận đặt hàng')" action=" <?php echo base_url('confirm-checkout') ?>">
                                <label>Tên:</label>
                                <input type="text" name="name" required placeholder="Name" />
                                <label>Số điện thoại:</label>
                                <input type="text" name="phone" required placeholder="Số Điện Thoại" />
                                <label>Email:</label>
                                <input type="text" name="email" required placeholder="Email" />
                                <label>Địa chỉ:</label>
                                <input type="text" name="address" required placeholder="Địa Chỉ" />
                                <label>Ngày tháng:</label>
                                <input type="date" name="order_date" value="<?php echo date('Y-m-d'); ?>" readonly />
                                <label>Hình thức thanh toán</label>
                                <select name="shipping_method">
                                    <option value="COD">COD</option>
                                    <option value="VNPAY">VNPAY</option>
                                    <option value="Thanh Toán Khi Nhận Hàng">Thanh Toán Khi Nhận Hàng</option>
                                </select>
                                <button type="submit" class="btn btn-default">Xác nhận</button>
                            </form>
                        </div>
                        <!--/login form-->
                    </div>
                </div>
            </div>
        </section>
        <!--/form-->
    </div>
</section>
<!--/#cart_items-->