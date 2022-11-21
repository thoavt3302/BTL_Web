<div class="container">
  <div class="card">
    <div class="card-header">
      Thêm Thương Hiệu
    </div>
    <div class="card-body">
      <a href=" <?php echo base_url('brand/list') ?>" class="btn btn-success">Danh Sách Thương Hiệu</a>
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
      <form action=" <?php echo  base_url('/brand/store') ?> " method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên Thương Hiệu:</label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Nhập tên thương hiệu">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Ảnh:</label>
          <input type="file" class="form-control-file" name="image" id="exampleInputPassword1" required placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mô tả:</label>
          <input type="text" class="form-control" name="description" id="exampleInputPassword1" required placeholder="Nhập nội dung mô tả thương hiệu">
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
      </form>
    </div>
  </div>
</div>