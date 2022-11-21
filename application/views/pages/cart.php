<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href=" <?php echo base_url('/') ?>">Home</a></li>
				<li class="active">Cart</li>
			</ol>
		</div>
		<?php if ($this->cart->contents()) { ?>
		<td> <a style="margin-left: 99rem;" href=" <?php echo base_url('delete-all-cart') ?>" class="btn btn-danger">Xoá tất cả giỏ hàng</a></td>
		<div class="table-responsive cart_info">		
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
									<a href=""><img style="width: 200px; height:220px;" src=" <?php echo base_url('uploads/product/' . $items['options']['image']) ?>" alt=" <?php echo $items['name'] ?> "></a>
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
											<!-- <input type="hidden" value=" ?php echo $items['rowid'] ?>" name="rowid"> -->
											<input class="cart_quantity_input" type="text"  readonly name="quantity" value=" <?php echo $items['qty'] ?>" autocomplete="off" size="2">
										</div>
										<!-- <input type="submit" name="capnhat" class="btn btn-primary" value="Cập nhật"></input> -->
									</form>
								</td>
								<td class="cart_total">
									<p class="cart_total_price"><?php echo number_format($subtotal, 0, ',', '.')  ?>VNĐ</p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="<?php echo base_url('delete-item/' . $items['rowid']) ?>"><i class="fa fa-times"></i></a>
								</td>
							</tr>
						<?php } ?>
						<tr>
							<td colspan="6" class="cart_total"><label style="margin-left: 96rem;" for="">Thành Tiền:</label>
								<p style="margin-left: 91rem;"  class="cart_total_price"><?php echo number_format($total, 0, ',', '.')  ?>VNĐ</p>
								 <a style="margin-left: 98rem;"  href=" <?php echo base_url('checkout') ?>" class="btn btn-success">Đặt Hàng</a>

							</td>				
						</tr>
					</tbody>
				</table>
			<?php } else {
				?> <img style="width:800px; height:auto;" src="<?php echo base_url('uploads/product/cart.png') ?>" alt=""> <?php
			} ?>
		</div>
	</div>
</section>
<!--/#cart_items-->