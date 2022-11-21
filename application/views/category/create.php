<div class="container">
  <div class="card">
    <div class="card-header">
      Thêm Danh Mục Sản Phẩm
    </div>
    <div class="card-body">
      <a href=" <?php echo base_url('category/list') ?>" class="btn btn-success">Danh Sách Danh Mục Sản Phẩm</a>
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
      <form action=" <?php echo  base_url('/category/store') ?> " method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên Danh Mục:</label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Nhập tên danh mục sản phẩm">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Ảnh:</label>
          <input type="file" class="form-control-file" name="image" id="exampleInputPassword1" required placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mô tả:</label>
          <input type="text" class="form-control" name="description" id="exampleInputPassword1" required placeholder="Nhập nội dung mô tả danh mục sản phẩm">
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
      </form>
    </div>
  </div>
</div>