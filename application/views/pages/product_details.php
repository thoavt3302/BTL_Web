<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Danh Mục</h2>
					<div class="panel-group category-products" id="accordian">
						<!--category-productsr-->
						<?php foreach ($category as $key => $cate) { ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="<?php echo base_url('danh-muc/' . $cate->id)  ?>"> <?php echo $cate->title ?></a></h4>
								</div>
							</div>
						<?php } ?>
					</div>
					<!--/category-products-->
					<div class="brands_products">
						<!--brands_products-->
						<h2>Thương Hiệu</h2>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">
								<?php foreach ($brand as $key => $bra) { ?>
									<li><a href="<?php echo base_url('thuong-hieu/' . $bra->id)  ?>"> <?php echo $bra->title ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<!--/brands_products-->
				</div>
			</div>
			<div class="col-sm-9 padding-right">
				<?php
				foreach ($product_details as $key => $pro) {
				?>
					<div class="product-details">
						<!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo base_url('uploads/product/' . $pro->image)  ?>" alt="<?php echo $pro->title ?>" />
							</div>
						</div>
						<form action=" <?php echo base_url('add-to-cart') ?>" method="POST">
							<div class="col-sm-7">
								<div class="product-information">
									<!--/product-information-->
									<img src="images/product-details/new.jpg" class="newarrival" alt="" />
									<h2><?php echo $pro->title ?></h2>
									<input type="hidden" value=" <?php echo $pro->id ?>" name="product_id">

									<img src="images/product-details/rating.png" alt="" />
									<span>
										<span><?php echo number_format($pro->price, 0, ',', '.') ?>VNĐ</span>
										<label>Quantity:<?php echo $pro->quantity ?></label>
										<input type="number" min="1" required max="<?php echo $pro->quantity ?>" pattern="[3-9]|[1-3][0-9]|4[0-2]" value="1" name="quantity">
										<button type="submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Thêm giỏ hàng
										</button>
									</span>
									<p><b>Cam kết:</b>Hàng chính hãng 100%</p>
									<p><b>Mô tả:</b> <?php echo $pro->description ?></p>
									<p><b>Thương Hiệu:</b> <?php echo $pro->tenthuonghieu ?></p>
									<p><b>Danh Mục:</b> <?php echo $pro->tendanhmuc ?></p>
									<a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
								</div>
								<!--/product-information-->
							</div>
						</form>
					</div>
					<!--/product-details-->
				<?php } ?>
			</div>
		</div>
	</div>
</section>