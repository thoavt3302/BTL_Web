<div class="container">
<form class="form-inline my-2 my-lg-0 " action=" <?php echo base_url('tim-kiem-order')  ?>" method="GET">
    
    <input class="form-control mr-sm-2 container" type="search" name="keyword" value="<?php echo (isset($_GET['keyword']))? $_GET['keyword'] :'' ;?>" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0 " name="submit" type="submit">Search</button>
    
  </form>
  <div class="card">
    <div class="card-header">
      Danh Sách Đơn Hàng
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
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Mã Đơn Hàng</th>
            <th scope="col">Tên Khách Hàng</th>
            <th scope="col">Số Điện Thoại</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Ngày Đặt Hàng</th>
            <th scope="col">Phương Thức Thanh Toán</th>
            <th scope="col">Chức Năng</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($order as $key => $ord) { ?>
            <tr>
              <th scope="row"> <?php echo $key  ?></th>
              <td> <?php echo $ord->order_code ?></td>
              <td> <?php echo $ord->name ?></td>
              <td> <?php echo $ord->phone ?></td>
              <td> <?php echo $ord->address ?></td>
              <td> <?php echo $ord->order_date ?></td>
              <td> <?php echo $ord->method ?></td>
              <td><a onclick="return confirm('Bạn thật sự muốn xoá?')" href="<?php echo base_url('order/delete/' . $ord->order_code.'/'.$ord->ship_id) ?>" class="btn btn-danger">Xoá</a>
                <a href=" <?php echo base_url('order/view/' . $ord->order_code) ?>" class="btn btn-warning">Chi Tiết</a>
              </td>
            </tr>
          <?php  } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>