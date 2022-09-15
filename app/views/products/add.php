<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
        <div class="row mt-5">
            <div class="col-6 col-md-8">
                <h1>Product Add</h1>
            </div>
            <div class="col-3 col-md-1">
               <button name="submit" class="btn btn-primary mr-2" form="product_form">Save</button>
            </div>
            <div class="col-3 col-md-3">
                <a href="<?php echo URLROOT; ?>" class="btn btn-danger">Cancel</a>
            </div>
        </div>
        <hr>
        <form method="POST" id="product_form" action="<?php echo URLROOT; ?>/products/add">
            <div class="row">
                <div class="col-12 col-md-3">
                    <label for="sku">SKU:</label>
                    <input type="text" class="form-control <?php echo (!empty($data['sku_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['sku'] ?? NULL ; ?>" name="sku" id="sku" placeholder="#sku">
                    <span class="invalid-feedback"><?php echo $data['sku_err']; ?></span>
                    <label class="mt-4" for="name">Name:</label>
                    <input type="text" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name'] ?? NULL ; ?>" name="name" id="name" placeholder="#name">
                    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                    <label class="mt-4" for="price">Price ($):</label>
                    <input type="text" class="form-control <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['price'] ?? NULL ; ?>" step="0.01" class="mt-3" name="price" id="price" placeholder="#price">
                    <span class="invalid-feedback"><?php echo $data['price_err']; ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3 mt-4">
                <label for="productType">Type Switcher:</label>
                    <select class="form-control <?php echo (!empty($data['productType_err'])) ? 'is-invalid' : ''; ?>" name="productType" id="productType" >
                        <option selected disabled>Type Switcher</option>
                        <option value="Dvd" id="Dvd" <?php echo ($data['productType'] === 'Dvd') ? 'selected' : ''; ?> >DVD</option>
                        <option value="Book" id="Book" <?php echo ($data['productType'] === 'Book') ? 'selected' : ''; ?>>Book</option>
                        <option value="Furniture" id="Furniture" <?php echo ($data['productType'] === 'Furniture') ? 'selected' : ''; ?> >Furniture</option>
                    </select>
                    <span class="invalid-feedback"><?php echo $data['productType_err']; ?></span>
                </div>
            </div>
            <div class="row <?php echo ($data['productType'] === 'Dvd') ? '' : 'd-none'; ?>" id="dvd-form">
                <div class="col-12 col-md-3 mt-3">
                <label for="size">Size (MB):</label>
                    <input type="text" class="form-control <?php echo (!empty($data['size_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['size'] ?? NULL ; ?>" step="0.01" name="size" id="size" placeholder="#size">
                    <span class="invalid-feedback"><?php echo $data['size_err']; ?></span>
                </div>
                <div class="text-muted mt-3">
                    <p>Please, provide size</p>
                </div>
            </div>
            <div class="row <?php echo ($data['productType'] === 'Book') ? '' : 'd-none'; ?>" id="book-form">
                <div class="col-12 col-md-3 mt-3">
                <label for="weight">Weight (KG):</label>
                    <input type="text" class="form-control <?php echo (!empty($data['weight_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['weight'] ?? NULL ; ?>" step="0.01" name="weight" id="weight" placeholder="#weight">
                    <span class="invalid-feedback"><?php echo $data['weight_err']; ?></span>
                </div>
                <div class="text-muted mt-3">
                    <p>Please, provide weight</p>
                </div>
            </div>
            <div class="row <?php echo ($data['productType'] === 'Furniture') ? '' : 'd-none'; ?>" id="furniture-form">
                <div class="col-12 col-md-3 mt-3">
                    <label for="height">Height (CM):</label>
                    <input type="text" step="0.01" class="form-control <?php echo (!empty($data['height_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['height'] ?? NULL ; ?>" name="height" id="height" placeholder="#height">
                    <span class="invalid-feedback"><?php echo $data['height_err']; ?></span>
                    <label class="mt-4" for="width">Width (CM):</label>
                    <input type="text" step="0.01" class="form-control <?php echo (!empty($data['width_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['width'] ?? NULL ; ?>" name="width" id="width" placeholder="#width">
                    <span class="invalid-feedback"><?php echo $data['width_err']; ?></span>
                    <label class="mt-4" for="length">Length (CM):</label>
                    <input type="text" step="0.01" class="form-control <?php echo (!empty($data['length_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['length'] ?? NULL ; ?>" name="length" id="length" placeholder="#length">
                    <span class="invalid-feedback"><?php echo $data['length_err']; ?></span>
                </div>
                <div class="text-muted mt-3">
                    <p>Please, provide dimensions</p>
                </div>
            </div>
        </form>

    </div>


    <script src="<?php echo URLROOT; ?>/js/main.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>