<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
        <div class="row">
          <?php foreach($base_images as $base_image):?>
          <div class="col-md-12 img-thumbnail" style="padding: none;">
            <img width="100%" height="auto" src="<?php echo $base_image->base_image_name; ?>">
          </div>
          <?php endforeach ?>            
          <div class="col-md-12 card text-center"> 
          <h5 class="modal-title" style="font-size: 15px;">Base:<strong> <?php echo ucfirst($base->base_name)?></strong></h5>
          </div>
        </div>
    </div>
    <div class="col-md-8">
      <h4 class="modal-title"><strong><?php echo ucwords(strtolower($combo->combo_name))?></strong></h4><br>
      <h5><strong>Contenido: </strong></h5>
        <?php foreach($products as $product):?>
          <?php echo $product->units.'. '.ucfirst($product->product_name.', '.$product->product_trademark.', '.$product->product_net_content).'. <br> '; ?>
        <?php endforeach ?><br>
      <h4 class="modal-title text-right"><strong>Precio: $<?php echo $combo->combo_sale_price; ?> </strong></h4>
    </div>
    </div>
  </div>
</div>