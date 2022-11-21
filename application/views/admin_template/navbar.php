<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

     <?php //icon ?>

     
      <li class="nav-item active">
        <a class="nav-link" href="#"><img width="80px"  src=" <?php echo base_url('uploads/brand/logo.jpg')  ?>" alt=""><span class="sr-only">(current)</span></a>
      </li>
    
      <li class="nav-item dropdown">
        <a onclick="return confirm('Bạn thật sự muốn đăng xuất?')" class="nav-link dropdown" href="<?php echo base_url('/') ?>" id="navbarDropdown" role="button"  >
        Đăng Xuất
        </a>
        
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Thương Hiệu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('brand/create') ?>">Thêm Thương Hiệu</a>
          <a class="dropdown-item" href="<?php echo base_url('brand/list') ?>">Danh Sách Thương Hiệu</a>
          
         
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Danh Mục Sản Phẩm
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('category/create') ?>">Thêm Danh Mục Sản Phẩm</a>
          <a class="dropdown-item" href="<?php echo base_url('category/list') ?>">Danh Sách Danh Mục Sản Phẩm</a>
          
         
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sản Phẩm
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('product/create') ?>">Thêm Sản Phẩm</a>
          <a class="dropdown-item" href="<?php echo base_url('product/list') ?>">Danh Sách Sản Phẩm</a>
          
         
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Đơn Hàng
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
       
          <a class="dropdown-item" href="<?php echo base_url('order/list') ?>">Danh Sách Đơn Hàng</a>
          
         
        </div>
      </li>
  
    </ul>
  
  </div>
</nav>