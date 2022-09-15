<?php
  class Products extends Controller{
    public function __construct(){
      // Load Models
      $this->productModel = $this->model('Product');
    }

    // Load All Posts
    public function index(){
      $products = $this->productModel->getProducts();

      $data = [
        'products' => $products
      ];
      
      $this->view('products/index', $data);
    }

    // Add Post
    public function add(){
      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'sku' => trim($_POST['sku']),
          'name' => trim($_POST['name']),
          'price' => trim($_POST['price']),
          'productType' => trim($_POST['productType']),
          'size' => trim($_POST['size']),
          'weight' => trim($_POST['weight']),
          'height' => trim($_POST['height']),
          'width' => trim($_POST['width']),
          'length' => trim($_POST['length']),
          'sku_err' => '',
          'name_err' => '',
          'price_err' => '',
          'productType_err' => '',
          'size_err' => '',
          'weight_err' => '',
          'height_err' => '',
          'width_err' => '',
          'length_err' => ''
          
        ];

        // Validate sku
        if(empty($data['sku'])){
            $data['sku_err'] = 'Please, submit required data';
        } else{
          // Check sku
          if($this->productModel->findProductBySku($data['sku'])){
            $data['sku_err'] = 'SKU is already exists.';
          }
        }

        // Validate name
        if(empty($data['name'])){
        $data['name_err'] = 'Please, submit required data';
        }

        // Validate price
        if(empty($data['price'])){
            $data['price_err'] = 'Please, submit required data';
        } else{
          // Check price
          if(!is_numeric($data['price'])){
            $data['price_err'] = 'Please, provide the data of indicated type';
          }
        }

        // Validate product type
        if(empty($data['productType'])){
            $data['productType_err'] = 'Please, submit required data';
        } else{
          // Check product type
          if($data['productType'] == 'Dvd'){
            // Validate size
            if(empty($data['size'])){
                $data['size_err'] = 'Please, submit required data';
            } else{
            // Check size
            if(!is_numeric($data['size'])){
                $data['size_err'] = 'Please, provide the data of indicated type';
            }
            }
          } elseif($data['productType'] == 'Book'){
            // Validate weight
            if(empty($data['weight'])){
                $data['weight_err'] = 'Please, submit required data';
            } else{
            // Check weight
            if(!is_numeric($data['weight'])){
                $data['weight_err'] = 'Please, provide the data of indicated type';
            }
            }
          } else {
            // Validate height
            if(empty($data['height'])){
                $data['height_err'] = 'Please, submit required data';
            } else{
            // Check height
            if(!is_numeric($data['height'])){
                $data['height_err'] = 'Please, provide the data of indicated type';
            }
            }

            // Validate width
            if(empty($data['width'])){
                $data['width_err'] = 'Please, submit required data';
            } else{
            // Check width
            if(!is_numeric($data['width'])){
                $data['width_err'] = 'Please, provide the data of indicated type';
            }
            }

            // Validate length
            if(empty($data['length'])){
                $data['length_err'] = 'Please, submit required data';
            } else{
            // Check length
            if(!is_numeric($data['length'])){
                $data['length_err'] = 'Please, provide the data of indicated type';
            }
            }
          }
        }
         
        // Make sure errors are empty
        if(empty($data['name_err']) && empty($data['sku_err']) && empty($data['price_err']) && empty($data['size_err']) && empty($data['weight_err']) && empty($data['height_err']) && empty($data['width_err']) && empty($data['length_err'])){
          // SUCCESS - Proceed to insert

          //Execute
          if($this->productModel->addProduct($data)){
            // Redirect to product list
            redirect('products/index');
          } else {
            die('Something went wrong');
          }
           
        } else {
          // Load View
          $this->view('products/add', $data);
        }
      } else {
        // IF NOT A POST REQUEST

        // Init data
        $data = [
            'sku' => '',
            'name' => '',
            'price' => '',
            'productType' => '',
            'size' => '',
            'weight' => '',
            'height' => '',
            'width' => '',
            'length' => ''
        ];

        // Load View
        $this->view('products/add', $data);
      }
    }

    // Delete Post
    public function delete(){
      if($_POST["checkbox"]){
        //Execute
        $all = implode(",", $_POST["checkbox"]);
        if($this->productModel->deleteProducts($all)){
          redirect('');
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('');
      }
    }
  }