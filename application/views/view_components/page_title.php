<div class="page-title">
  <div class="title_left">
    <h3><?php echo $title;?></h3>
  </div>

  <div class="title_right">      
    <ul class="breadcrumb">
      <?php if(isset($breadcrumb)){ ?>
        <?php foreach ($breadcrumb as $key => $value) { ?>
          
          <?php if($value['link']!=null){ ?>
            <li><a href="<?php echo $value['link'];?>"><?php echo $value['name'];?></a></li>
          <?php }else{ ?>
            <li><?php echo $value['name'];?></li>
          <?php } ?>
        <?php } ?>
      <?php } ?>
    </ul>      
  </div>
</div>