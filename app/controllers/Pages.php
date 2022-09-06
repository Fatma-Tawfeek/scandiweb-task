<?php

class Pages extends Controller {
    public function __construct(){
        
    }

    public function index(){

        $this->view('pages/index');

    }

    public function addproduct(){
        $this->view('pages/add');
    }
}