<?php 
require APPROOT . '/views/inc/header.php';
if (isset($_POST['delete'])) {
    (new Service)->deleteProducts($_POST['checkbox']);
    header("Location: index.php");
}
 ?>

<div class="container">
        <div class="row mt-5">
            <div class="col-8">
                <h1>Products List</h1>
            </div>
            <div class="col-1 mt-2">
                <button onclick="window.location.href='<?php echo URLROOT; ?>/pages/add-product'" class="btn btn-primary">ADD</button>
            </div>
            <div class="col-3 mt-2">
                <button name="delete" class="btn btn-danger" id="delete-product-btn" form="form">MASS DELETE</button>
            </div>
        </div>
        <hr>
        <form action="" method="post" id="form">
            <div class="row py-5">
                <?php
                //Getting all the products from the database
                $products = (new Service)->getProducts();
                //Loop through array of objects and display each of them
                foreach ($products as $product) {
                    echo '
                <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card border rounded bg-light p-2 mb-4">
                        <input type="checkbox" class="delete-checkbox move-left" name="checkbox[]" value="' . $product->id . '">
                            <div class="card-body text-center">
                                <h6>' . $product->sku . '</h6>
                                <h6>' . $product->name . '</h6>
                                <p class="mb-2 text-muted">' . $product->price . ' $</p>
                                <p>' . $product->attribute . '</p>
                            </div>
                        </div>
                </div>';
                }
                ?>
            </div>
        </form>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

