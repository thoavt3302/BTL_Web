<div class="container">
  <div class="card">
    <div class="card-header">
      Danh Sách Sản Phẩm
    </div>

    <div class="card-body">
      <a href=" <?php echo base_url('product/list') ?>" class="btn btn-success">Danh Sách Sản Phẩm </a>

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
      <form action=" <?php echo  base_url('/product/update/' . $product->id) ?> " method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên sản phẩm </label>
          <input required type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $product->title ?>" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Số lượng</label>
          <input required type="text" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $product->quantity ?>" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Đơn Giá</label>
          <input required type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $product->price ?>" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mô tả</label>
          <input required type="text" class="form-control" name="description" id="exampleInputPassword1" value="<?php echo $product->description ?>" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Ảnh</label>
          <input type="file" class="form-control-file" name="image" id="exampleInputPassword1" placeholder="Password">
          <td><img src="<?php echo base_url('uploads/product/' . $product->image) ?> " width="150" height="150" alt=""></td>
        </div>
        <div class="form-group">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Trạng Thái</label>
            <select class="form-control" name="status" id="exampleFormControlSelect1">
              <?php if ($product->status == 1) { ?>
                <option selected value="1">Hoạt Động</option>
                <option value="0">Không Hoạt Động</option>
              <?php } else { ?>
                <option value="1">Hoạt Động</option>
                <option selected value="0">Không Hoạt Động</option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Danh Mục</label>
            <select class="form-control" name="category_id" id="exampleFormControlSelect1">
              <?php foreach ($category as $key => $cate) { ?>
                <option <?php echo $cate['id'] == $product->category_id ? 'selected' : '' ?> value="<?php echo $cate['id']?>"> <?php echo $cate['title']  ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Thương Hiệu</label>
            <select class="form-control" name="brand_id" id="exampleFormControlSelect1">
              <?php foreach ($brand as $key => $bra) { ?>
                <option <?php echo $bra['id'] == $product->brand_id ? 'selected' : '' ?> value="<?php echo $bra['id']?>"> <?php echo $bra['title'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
      </form>
    </div>
  </div>
</div>