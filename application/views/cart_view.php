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
  <div class="row">
    <div class="cart-block">
      <div class="col-xs-12">
        <h2>Giỏ Hàng</h2>
      </div>
      <div class="col-xs-12">
      <?php if ($total_items > 0) { ?>
        <div class="cart">
          <form action="<?php echo base_url('cart/update') ?>" method="post">
            <table>
              <tr>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Đơn Giá</th>
                <th>Số Lượng</th>
                <th>Thành Tiền</th>
              </tr>
              <?php 
                $c = 1;
                $total_amount = 0;
                foreach($carts as $row) { 
                  $total_amount += $row['subtotal'];
                ?>
                <tr>
                  <td><?php echo $c++ ?></td>
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo number_format($row['price']) ?></td>
                  <td>
                    <input name="qty_<?php echo $row['id']?>" value="<?php echo $row['qty']; ?>" size="5"/>
                  </td>
                  <td><?php echo number_format($row['subtotal']) ?></td>
                  <td> 
                    <button type="submit" class="btn btn-default">Cập Nhật</button>
                </td>
                 <td> 
                    <a href="<?php echo base_url('cart/del').'/'.$row['id'] ?>" class="btn btn-default">Xóa</button>
                </td>
                </tr>
              <?php } ?>
            
            </table>
            <div class="total"><?php echo number_format($total_amount); ?></div>
          </form>
        </div>
        <?php } else { ?>
        <div>deo co</div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="user-block">
      <div class="col-xs-12">
        <h3>Thông Tin Giao Hàng</h3>
        <form novalidate class="form-order" method="post" action="<?php echo base_url('cart/addorder')?>">
          <div class="form-group">
            <input id="name" type="text" placeholder="Tên người nhận*" name="username" required class="form-control" value="<?php echo set_value('username')?>">
          </div>
          <div class="form-group">
            <input id="address" type="text" placeholder="Địa chỉ người nhận*" required class="form-control address" name="address" value="<?php echo set_value('address')?>">
            <label>Thành Phố</label>
          </div>
          <div class="form-group">
            <input id="phone" type="text" placeholder="Điện thoại người nhận*" required class="form-control" name="phone" value="<?php echo set_value('phone')?>">
          </div>
          <div class="form-group">
            <input id="email" type="text" placeholder="Email người nhận*" required class="form-control" name="email" value="<?php echo set_value('email')?>">
          </div>
          <div class="form-group">
            <textarea id="desc" type="text" name="note" placeholder="Ghi chú" class="form-control" value="<?php echo set_value('note')?>"></textarea>
          </div>
          <div class="form-group"></div>
          <button type="submit" class="btn btn-default">Đặt Hàng</button>
        </form>
      </div>
    </div>
  </div>
</div>