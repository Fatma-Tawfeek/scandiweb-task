<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
        <div class="row mt-5">
            <div class="col-4 col-md-8">
                <h1>Products List</h1>
            </div>
            <div class="col-3 col-md-1 mt-2">
                <button onclick="window.location.href='<?php echo URLROOT; ?>/products/add'" class="btn btn-primary" id="add">ADD</button>
            </div>
            <div class="col-5 col-md-3 mt-2">
                <button name="delete" class="btn btn-danger" id="delete-product-btn" form="form">MASS DELETE</button>
            </div>
        </div>
        <hr>
        <form action="<?php echo URLROOT; ?>/products/delete" method="post" id="form">
            <div class="row py-5">
                <?php
                //Loop through array of objects and display each of them              
                foreach ($data['products'] as $product) { ?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card border rounded bg-light p-2 mb-4">
                        <input type="checkbox" class="delete-checkbox move-left" name="checkbox[]" value="<?php echo $product->id ?>">                          
                            <div class="card-body text-center">
                                <h6><?php echo $product->sku ?></h6>
                                <h6><?php echo $product->name ?></h6>
                                <p class="mb-2 text-muted"><?php echo $product->price ?>$</p>                                
                               <?= ($product->size) ? '<p class="card-text">' . 'Size:' . $product->size . ' MB' . '</p>' : '' ; ?>
                               <?= ($product->weight) ? '<p class="card-text">' . 'Weight:' . $product->weight . 'KG' . '</p>' : ''; ?>
                               <?= ($product->height) ? '<p class="card-text">' . 'Dimensions:' . $product->height . 'x' . $product->width . 'x' . $product->length . '</p>' : ''; ?>
                            </div>
                        </div>
                </div>
                <?php 
                }    
                ?>
            </div>
        </form>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

