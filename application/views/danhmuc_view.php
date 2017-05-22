<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Danh muc</title>

    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="wrapper">
      <div id="main">
        <form method="post" action="<?php echo base_url()?>danhmuc/form_validation">
        <?php
          if ($this->uri->segment(2) == "inserted") {
            echo '<p>Data Inserted</p>';
          }
         ?> 
          <input type="text" name="tendanhmuc"/>
          <input type="submit" name="insert" value="insert"/>
          <span class="text-danger"><?php echo form_error('tendanhmuc'); ?></span>
        </form>
      </div>

      <div>show data</div>
      <table>
        <tr>
          <th>ID</th>
          <th>Ten</th>
        </tr>
        <?php
        if ($fetch_data->num_rows() > 0) {
          foreach($fetch_data->result() as $row) {
        ?>
        <tr>
          <td><?php echo $row->ProductID; ?></td>
          <td><?php echo $row->Name; ?></td>
          <td><a href="<?php echo base_url()?>danhmuc/getDanhMucTheoID/?ProductID=<?php echo $row->ProductID; ?>">edit</a></td>
          <td><a href="<?php echo base_url()?>danhmuc/delete/?ProductID=<?php echo $row->ProductID; ?>">Delete</a></td>
        </tr>
        <?php
          }
        } else {
        ?>
          <tr>
            <td>No data</td>
          </tr>
        <?php
        }
        ?>
        
      </table>
      <div> show danhmuc theo ID</div>
     
      
      
    </div>

  
  </body>
</html>