<div class="container">
    <div class="card">
        <div class="card-header">
            Sửa Danh Mục Sản Phẩm
        </div>
        <div class="card-body">
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
            <form action=" <?php echo  base_url('/category/update/' . $category->id) ?> " method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên Danh Mục Sản Phẩm</label>
                    <input type="text" name="title" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $category->title ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả</label>
                    <input type="text" class="form-control" required name="description" id="exampleInputPassword1" value="<?php echo $category->description ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ảnh</label>
                    <input type="file" class="form-control-file" name="image" id="exampleInputPassword1" value="<?php echo $category->image ?>">
                    <td><img src=" <?php echo base_url('uploads/category/' . $category->image) ?> " width="150" height="150" alt=""></td>
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
        </div>
    </div>
</div>