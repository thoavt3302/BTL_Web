<div class="container">
<form class="form-inline my-2 my-lg-0 " action=" <?php echo base_url('tim-kiem-brand')  ?>" method="GET">
    
    <input class="form-control mr-sm-2 container" type="search" name="keyword" value="<?php echo (isset($_GET['keyword']))? $_GET['keyword'] :'' ;?>" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0 " name="submit" type="submit">Search</button>
    
  </form>
  <div class="card">
    <div class="card-header">
      Danh Sách Thương Hiệu
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
      <a href=" <?php echo base_url('brand/create') ?>" class="btn btn-primary">Thêm Thương Hiệu</a>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Tên Thương Hiệu</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Chức Năng</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($brand as $key => $bra) { ?>
            <tr>
              <td> <?php echo $bra['title'] ?></td>
              <td> <?php echo $bra['description'] ?></td>
              <td><img src=" <?php echo base_url('uploads/brand/' . $bra['image']) ?> " width="150" height="150" alt=""></td>
              <td><a onclick="return confirm('Bạn thật sự muốn xoá?')" href="<?php echo base_url('brand/delete/' . $bra['id']) ?>" class="btn btn-danger">Xoá</a>
                <a href=" <?php echo base_url('brand/edit/' . $bra['id']) ?>" class="btn btn-warning">Sửa</a>
              </td>
            </tr>
          <?php  } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>