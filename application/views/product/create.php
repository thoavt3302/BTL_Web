<div class="container">
    <div class="card">
    <div class="card-header">
        Thêm Sản Phẩm
    </div>
    
    <div class="card-body">
    <a href=" <?php echo base_url('product/list') ?>" class="btn btn-success">Danh Sách Sản Phẩm</a>
    <?php 
if($this->session->flashdata('success')){
    ?>
    <div class="alert alert-success"><?php  echo $this->session->flashdata('success') ?> </div>
    <?php
}elseif($this->session->flashdata('error')){
    ?>
     <div class="alert alert-danger"><?php  echo $this->session->flashdata('error') ?> </div>
     <?php
}
?>
    <form action=" <?php echo  base_url('/product/store') ?> " method="POST" enctype="multipart/form-data" > 
    <div class="form-group">
    <label for="exampleFormControlSelect1">Thương Hiệu Sản Phẩm:</label>
    <select class="form-control" name="brand_id" id="exampleFormControlSelect1">
    <?php foreach($brand as $key => $bra) {?>
    <option value=" <?php  echo $bra['id']  ?>"> <?php  echo $bra['title']  ?></option>
 <?php } ?>
    </select>
</div>
<div class="form-group"> 
    <div class="form-group">
    <label for="exampleFormControlSelect1">Danh Mục Sản Phẩm:</label>
    <select class="form-control" name="category_id" id="exampleFormControlSelect1">
       <?php foreach($category as $key => $cate) {?>
    <option value=" <?php  echo $cate['id']  ?>"> <?php  echo $cate['title']  ?></option> 
 <?php } ?>
    </select>
</div>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Ảnh</label>
    <input type="file" class="form-control-file" name="image" id="exampleInputPassword1" required placeholder="Password">
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Nhập tên sản phẩm">   
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1">Số Lượng</label>
    <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Nhập số lượng sản phẩm">
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1">Đơn Giá</label>
    <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Nhập đơn giá sản phẩm">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mô tả</label>
    <input type="text" class="form-control" name="description" id="exampleInputPassword1" required placeholder="Nhập nội dung mô sản phẩm">
  </div>
  <div class="form-group">
                <div class="form-group">
                <label for="exampleFormControlSelect1">Trạng Thái</label>
                <select class="form-control" name="status" id="exampleFormControlSelect1">
                <option value="1">Hoạt Động</option>
                <option value="0">Không Hoạt Động</option>
                </select>
            </div>
  </div>
  <button type="submit" class="btn btn-primary">Thêm</button>
</form>
    </div>
    </div>
</div>