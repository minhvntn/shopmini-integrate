    <div class="container top">
      
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li>
          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>">
            <?php echo ucfirst($this->uri->segment(2));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">Update</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Updating <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>

 
      <?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> product updated with success.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
      
      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');
      $options_manufacture = array('' => "Select");
      foreach ($manufactures as $row)
      {
        $options_manufacture[$row['ProductID']] = $row['Name'];
      }

      //form validation
      echo validation_errors();

      // echo form_open('admin/products/update/'.$this->uri->segment(4).'', $attributes);
      ?>

        <div class="container">
          <form action="<?php echo base_url('admin/sanpham/capnhat/'.$this->uri->segment(4).'') ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="name" class="control-label col-sm-2">Tên sản phẩm:</label>
              <div class="col-sm-10">
                <input id="name" type="text" placeholder="Tên sản phẩm" name="name" class="form-control" value="<?php echo $product[0]['Name']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="desc" class="control-label col-sm-2">Thông tin:</label>
              <div class="col-sm-10">
                <input id="desc" type="text" placeholder="Thông tin" name="desc" class="form-control" value="<?php echo $product[0]['Description']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="price" class="control-label col-sm-2">Giá</label>
              <div class="col-sm-10">
                <input id="price" type="text" placeholder="Giá" name="price" class="form-control" value="<?php echo $product[0]['Price']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="priceaftersale" class="control-label col-sm-2">Giá sau giảm</label>
              <div class="col-sm-10">
                <input id="priceaftersale" type="text" placeholder="Giá sau giảm" name="priceaftersale" class="form-control" value="<?php echo $product[0]['PriceAfterSale']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="quantity" class="control-label col-sm-2">Số lượng</label>
              <div class="col-sm-10">
                <input id="quantity" type="text" placeholder="Số lượng" name="quantity" class="form-control" value="<?php echo $product[0]['Quantity']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="image" class="control-label col-sm-2">Hình ảnh</label>
              <div class="col-sm-10">
                <input id="input-2" name="image" type="file" multiple data-show-upload="false" data-show-caption="true" class="file">
                <img src="<?php echo base_url('assets/images/products/'.$product[0]['ItemPhoto'])?>"/>
              </div>
            </div>
            <?php $image_list = json_decode($product[0]['ItemThumbnail']);?>
            <div class="form-group">
              <label for="image_list" class="control-label col-sm-2">Ảnh kèm theo</label>
              <div class="col-sm-10">
                <input id="input-2" name="image_list[]" type="file" multiple data-show-upload="false" data-show-caption="true" class="file">
                <?php foreach($image_list as $img) {?>
                <img src="<?php echo base_url('assets/images/products/'.$img)?>"/>
                <?php } ?>
              </div>
            </div>
            <div class="form-group">
              <label for="category" class="control-label col-sm-2">Loại sản phẩm:</label>
              <div class="col-sm-10">
                <select id="ProductID" class="form-control" name="ProductID">
                <option value="">None</option>
                <?php
                  foreach($manufactures as $row) {
                ?>
                <option <?php if($row['ProductID'] == $product[0]['ProductID']){ echo 'selected="selected"'; } ?> value="<?php echo $row['ProductID']; ?>"><?php echo $row['Name']; ?> 

                </option>
                <?php
                  }
                ?>
                
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Cập nhật</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
     