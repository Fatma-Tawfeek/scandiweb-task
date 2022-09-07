<?php 
require APPROOT . '/views/inc/header.php';

if (isset($_POST['submit'])) {    
    $validation = new Validation($_POST);
    $errors = $validation->validateForm();
    if(empty($errors)){
        (new Product($_POST))->addProduct();
         header("Location: index.php");
    }   
}
 ?>

<div class="container">
        <div class="row mt-5">
            <div class="col-8">
                <h1>Product Add</h1>
            </div>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="product_form">
            <div class="col-1 mt-2">
                <button name="submit" type="submit" id="submit-btn" class="btn btn-primary mr-2" form="product_form">Save</button>
            </div>
            <div class="col-3 mt-2">
                <a href="<?php echo URLROOT; ?>/pages/index" class="btn btn-danger">Cancel</a>
            </div>
        </div>
        <hr>
        
            <div class="row">
                <div class="col-2 mt-3">
                    <label for="sku">SKU:</label><br>
                    <label class="mt-4" for="name">Name:</label><br>
                    <label class="mt-4" for="price">Price ($):</label>
                </div>
                <div class="col-3 mt-3">
                    <input type="text" class="form-control" name="sku" id="sku" placeholder="#sku" minlength="8" maxlength="8">
                    <input type="text" class="form-control mt-3" name="name" id="name" placeholder="#name">
                    <div class="error">
                        <?php echo $errors['name'] ?? '' ?>
                    </div>
                    <input type="number" class="form-control mt-3" step="0.01" class="mt-3" name="price" id="price" placeholder="#price">
                </div>
            </div>
            <div class="row">
                <div class="col-2 mt-4">
                    <label for="productType">Type Switcher</label>
                </div>
                <div class="col-3 mt-4">
                    <select class="form-control" name="productType" id="productType">
                        <option selected disabled>Type Switcher</option>
                        <option value="Dvd" id="Dvd">DVD</option>
                        <option value="Book" id="Book">Book</option>
                        <option value="Furniture" id="Furniture">Furniture</option>
                    </select>
                </div>
            </div>
            <div class="row hidden" id="dvd-form">
                <div class="col-2 mt-3">
                    <label for="size">Size (MB):</label>
                </div>
                <div class="col-3 mt-3">
                    <input type="number" class="form-control" step="0.01" name="size" id="size" placeholder="#size">
                </div>
                <div class="text-muted mt-3">
                    <p>Please, provide size</p>
                </div>
            </div>
            <div class="row hidden" id="book-form">
                <div class="col-2 mt-3">
                    <label for="weight">Weight (KG):</label>
                </div>
                <div class="col-3 mt-3">
                    <input type="number" class="form-control" step="0.01" name="weight" id="weight" placeholder="#weight">
                </div>
                <div class="text-muted mt-3">
                    <p>Please, provide weight</p>
                </div>
            </div>
            <div class="row hidden" id="furniture-form">
                <div class="col-2 mt-3">
                    <label for="height">Height (CM):</label><br>
                    <label class="mt-4" for="width">Width (CM):</label><br>
                    <label class="mt-4" for="length">Length (CM):</label>
                </div>
                <div class="col-3 mt-3">
                    <input type="number" step="0.01" class="form-control" name="height" id="height" placeholder="#height">
                    <input type="number" step="0.01" class="form-control mt-3" name="width" id="width" placeholder="#width">
                    <input type="number" step="0.01" class="form-control mt-3" name="length" id="length" placeholder="#length">
                </div>
                <div class="text-muted mt-3">
                    <p>Please, provide dimensions</p>
                </div>
            </div>
        </form>

    </div>
    <script src="<?php echo URLROOT; ?>/js/main.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>