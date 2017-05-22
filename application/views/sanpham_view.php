<div class="container">
  <div class="row">
    <div class="slider-block">
      <div class="slider autoplay">
        <div class="slider-item"><img src="http://lorempixel.com/output/food-q-c-300-150-8.jpg"></div>
        <div class="slider-item"><img src="http://lorempixel.com/output/food-q-c-300-150-8.jpg"></div>
        <div class="slider-item"><img src="http://lorempixel.com/output/food-q-c-300-150-8.jpg"></div>
        <div class="slider-item"><img src="http://lorempixel.com/output/food-q-c-300-150-8.jpg"></div>
        <div class="slider-item"><img src="http://lorempixel.com/output/food-q-c-300-150-8.jpg"></div>
        <div class="slider-item"><img src="http://lorempixel.com/output/food-q-c-300-150-8.jpg"></div>
        <div class="slider-item"><img src="http://lorempixel.com/output/food-q-c-300-150-8.jpg"></div>
        <div class="slider-item"><img src="http://lorempixel.com/output/food-q-c-300-150-8.jpg"></div>
      </div>
      <div class="logo">SHOP MINI</div>
    </div>
  </div>
</div>
<div class="container">

  <h2><?php echo $danhmucid[0]['Name'] ?></h2>
  <div class="row grid-items">
    <?php 
      foreach($sanpham as $row) {
    ?>
      <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="item"><a href="<?php echo site_url('san-pham-chi-tiet').'/'.$row['ItemID']?>" title=""><img src="http://lorempixel.com/output/food-q-c-300-150-8.jpg">
            <div class="detail"><span><?php echo $row['Name'] ?></span><span><?php echo $row['Price'] ?> vnd</span>
            <?php if ($row['PriceAfterSale'] > 0) {?>
              <span><?php echo $row['PriceAfterSale'] ?> VND - save 20%</span>
            <?php } ?>
              <a href="<?php echo site_url('cart/add').'/'. $row['ItemID']; ?>" class="btn btn-default">them vao gio</a>
            </div></a></div>
      </div>
    <?php
    } 
    ?>
    <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>
  </div>
</div>