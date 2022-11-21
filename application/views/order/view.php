<div class="container">
  <div class="card">
    <div class="card-header">
      Danh Sách Chi Tiết Đơn Hàng
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
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">Hình Ảnh Sản Phẩm</th>
            <th scope="col">Đơn Giá</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Tổng Tiền</th>
          </tr>
        </thead>
        <tbody>
          <?php $tongtien = 0;
          $thanhtien = 0;
          foreach ($order_details as $key => $ord) {
            $thanhtien =  $ord->price * $ord->qty;
          ?>
            <tr>
              <?php $tongtien += $thanhtien; ?>
              <th scope="row"> <?php echo $key  ?></th>
              <td> <?php echo $ord->order_code ?></td>
              <td> <?php echo $ord->title ?></td>
              <td><img src=" <?php echo base_url('uploads/product/' . $ord->image) ?> " width="200px" height="250px" alt=""></td>
              <td> <?php echo number_format($ord->price, 0, ',', '.') ?> VNĐ</td>
              <td> <?php echo $ord->qty ?></td>
              <td> <?php echo number_format($thanhtien, 0, ',', '.') ?> VNĐ</td>
            </tr>
          <?php  } ?>
        </tbody>
      </table>
      <div style="margin-left:53rem ;">
        <label for=""> Thành Tiền:</label>
        <?php echo number_format($tongtien, 0, ',', '.') ?> VNĐ
      </div>
    </div>
  </div>
</div>