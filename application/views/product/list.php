<div class="container">
<form class="form-inline my-2 my-lg-0 "  action=" <?php echo base_url('tim-kiem-product')  ?>" method="GET">
    
    <input class="form-control mr-sm-2 container" type="search" name="keyword" value="<?php echo (isset($_GET['keyword']))? $_GET['keyword'] :'' ;?>" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0 " name="submit" type="submit">Search</button>
    
  </form>
  <div class="card">
    <div class="card-header">
      Danh Sách Sản Phẩm
    </div>
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
    <div class="card-body">
      <a href=" <?php echo base_url('product/create') ?>" class="btn btn-primary">Thêm Sản Phẩm</a>
      <table class="table table-striped">
        <thead>
          <tr>
      
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">Danh Mục</th>
            <th scope="col">Thương Hiệu</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Đơn Giá</th>                 
            <th scope="col">Mô tả</th>     
            <th scope="col">Chức Năng</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($product as $key => $pro) { ?>
            <tr>
             
              <td> <?php echo $pro['title'] ?></td>
              <td> <?php echo $pro['tendanhmuc'] ?></td>
              <td> <?php echo $pro['tenthuonghieu'] ?></td>
              <td><img src=" <?php echo base_url('uploads/product/' . $pro['image']) ?> " width="150" height="190" alt=""></td>
              <td> <?php if ($pro['status'] == 1) {
                      echo 'Hoạt Động';
                    } else {
                      echo 'Không Hoạt Động';
                    } ?></td>
              <td> <?php echo $pro['quantity'] ?></td>
              <td> <?php echo number_format($pro['price'], 0, ',', '.') ?>VNĐ</td>                
              <td> <?php echo $pro['description'] ?></td>                     
              <td><a onclick="return confirm('Bạn thật sự muốn xoá?')" href="<?php echo base_url('product/delete/' . $pro['id']) ?>" class="btn btn-danger">Xoá</a>
                <a href=" <?php echo base_url('product/edit/' . $pro['id']) ?>" class="btn btn-warning">Sửa</a>
              </td>
            </tr>
          <?php  } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>