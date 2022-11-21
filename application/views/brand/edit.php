<div class="container">
    <div class="card">
        <div class="card-header">
            Sửa Thương Hiệu
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
            <form action=" <?php echo  base_url('/brand/update/' . $brand->id) ?> " method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="<?php echo $brand->title ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả</label>
                    <input type="text" class="form-control" name="description" required id="exampleInputPassword1" value="<?php echo $brand->description ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ảnh</label>
                    <input type="file" class="form-control-file" name="image" id="exampleInputPassword1" value="<?php echo $brand->image ?>">
                    <td><img src=" <?php echo base_url('uploads/brand/' . $brand->image) ?> " width="150" height="150" alt=""></td>
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
        </div>
    </div>
</div>