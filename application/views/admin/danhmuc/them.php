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
          <a href="#">New</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Adding <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>
 
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new product created with success.';
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
      // $attributes = array('class' => 'form-horizontal', 'id' => '');
      // $options_manufacture = array('' => "Select");
      // foreach ($manufactures as $row)
      // {
      //   $options_manufacture[$row['ProductID']] = $row['Name'];
      // }

      //form validation
      echo validation_errors();
      
      // echo form_open('admin/sanpham/add', $attributes);
      ?>
        <div class="container">
          <form action="<?php echo base_url('admin/danhmuc/them') ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="name" class="control-label col-sm-2">Tên danh mục:</label>
              <div class="col-sm-10">
                <input id="name" type="text" placeholder="Tên danh mục" name="name" class="form-control" value="<?php echo set_value('name')?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Thêm</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
     