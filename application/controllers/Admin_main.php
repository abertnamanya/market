<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin_main
 *
 * @author abert
 */
class Admin_main extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('AdminModel');
    }

    public function index() {
        $data['pageName'] = "Dashboard";
        $data['users'] = $this->AdminModel->getUsersCount();
        $data['markets'] = $this->AdminModel->getMarketCount();
        $data['products'] = $this->AdminModel->getProductsCount();
        $data['cat'] = $this->AdminModel->getCategoriesCount();
        $data['subview'] = $this->load->view('dashboard', $data, true);
        $this->load->view('layout/_layout_main', $data);
    }

    public function mobile_users() {
        $data['mobile_users'] = $this->AdminModel->fetch_mobile_app_users();
        $data['pageName'] = "Users";
        $data['subview'] = $this->load->view('mobile_users', $data, true);
        $this->load->view('layout/_layout_main', $data);
    }

    //list users

    public function users() {
        $data['users'] = $this->AdminModel->fetch_users();
        $data['pageName'] = "Users";
        $data['subview'] = $this->load->view('users', $data, true);
        $this->load->view('layout/_layout_main', $data);
    }

    public function addUser() {
        $data['firstName'] = $this->input->post('firstName');
        $data['lastName'] = $this->input->post('lastName');
        $data['contact'] = $this->input->post('contact');
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $this->AdminModel->saveUser($data);
        echo json_encode(array('status' => true));
    }

    function userDetails($user_id) {
        $result = $this->AdminModel->fetchUserDetails($user_id);
        echo json_encode($result);
    }

    function updateUser() {
        $data['firstName'] = $this->input->post('firstName');
        $data['lastName'] = $this->input->post('lastName');
        $data['contact'] = $this->input->post('contact');
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $user_id = $this->input->post('user_id');
        $this->AdminModel->editUser($data, $user_id);
        echo json_encode(array('status' => true));
    }

    function deleteUser($user_id) {
        $this->AdminModel->delete_User($user_id);
        echo json_encode(array('status' => TRUE));
    }

    function locations() {
        $data['locations'] = $this->AdminModel->fetch_locations();
        $data['pageName'] = "Market Locations";
        $data['subview'] = $this->load->view('locations', $data, true);
        $this->load->view('layout/_layout_main', $data);
    }

    function addLocation() {
        $data['location'] = $this->input->post('location');
        $this->AdminModel->registerLocation($data);
        echo json_encode(array('status' => true));
    }

    function locationDetails($location_id) {
        $result = $this->AdminModel->fetchLocationDetails($location_id);
        echo json_encode($result);
    }

    function updateLocation() {
        $data['location'] = $this->input->post('location');
        $location_id = $this->input->post('location_id');
        $this->AdminModel->editLocation($data, $location_id);
        echo json_encode(array('status' => true));
    }

    function deleteLocation($location_id) {
        $this->AdminModel->delete_Location($location_id);
        echo json_encode(array('status' => TRUE));
    }

    function markets() {
        $data['locations'] = $this->AdminModel->fetch_locations();
        $data['markets'] = $this->AdminModel->fetch_markets();
        $data['pageName'] = "Markets";
        $data['subview'] = $this->load->view('markets', $data, true);
        $this->load->view('layout/_layout_main', $data);
    }

    function addMarket() {
        $data['location_location_id'] = $this->input->post('location');
        $data['market_name'] = $this->input->post('market');
        $this->AdminModel->registerMarkdet($data);
        echo json_encode(array('status' => true));
    }

    function marketDetails($market_id) {
        $result = $this->AdminModel->fetchMarketDetails($market_id);
        echo json_encode($result);
    }

    function updateMarket() {
        $data['location_location_id'] = $this->input->post('location');
        $data['market_name'] = $this->input->post('market');
        $market_id = $this->input->post('market_id');
        $this->AdminModel->editMarket($data, $market_id);
        echo json_encode(array('status' => true));
    }

    function deleteMarket($market_id) {
        $this->AdminModel->delete_Market($market_id);
        echo json_encode(array('status' => TRUE));
    }

    function categories() {
        $data['categories'] = $this->AdminModel->fetch_categories();
        $data['pageName'] = "Product Categories";
        $data['subview'] = $this->load->view('categories', $data, true);
        $this->load->view('layout/_layout_main', $data);
    }

    function register_Category() {
        $data['category_name'] = $this->input->post('category_name');
        $this->AdminModel->addCategory($data);
        echo json_encode(array('status' => TRUE));
    }

    function categoryDetails($category_id) {
        $result = $this->AdminModel->fetchCatgoryDetails($category_id);
        echo json_encode($result);
    }

    function updateCategory() {
        $data['category_name'] = $this->input->post('category_name');
        $category_id = $this->input->post('category_id');
        $this->AdminModel->editCategory($data, $category_id);
        echo json_encode(array('status' => true));
    }

    function deleteCatagory($category_id) {
        $this->AdminModel->delete_Catagory($category_id);
        echo json_encode(array('status' => TRUE));
    }

    function products() {
        $data['categories'] = $this->AdminModel->fetch_categories();
        $data['products'] = $this->AdminModel->fetch_products();
        $data['pageName'] = "Products";
        $data['subview'] = $this->load->view('products', $data, true);
        $this->load->view('layout/_layout_main', $data);
    }

    function addProduct() {
        $data['category_category_id'] = $this->input->post('category');
        $data['product_name'] = $this->input->post('product');
        $this->AdminModel->registerProduct($data);
        echo json_encode(array('status' => true));
    }

    function productDetails($product_id) {
        $result = $this->AdminModel->fetchProductDetails($product_id);
        echo json_encode($result);
    }

    function updateProduct() {
        $data['category_category_id'] = $this->input->post('category');
        $data['product_name'] = $this->input->post('product');
        $product_id = $this->input->post('product_id');
        $this->AdminModel->editProduct($data, $product_id);
        echo json_encode(array('status' => true));
    }

    function deleteProduct($product_id) {
        $this->AdminModel->delete_Product($product_id);
        echo json_encode(array('status' => TRUE));
    }

    function prices() {
        $data['products'] = $this->AdminModel->fetch_products();
        $data['markets'] = $this->AdminModel->fetch_markets();
        $data['prices'] = $this->AdminModel->fetch_prices();
        $data['pageName'] = "Product Prices";
        $data['subview'] = $this->load->view('prices', $data, true);
        $this->load->view('layout/_layout_main', $data);
    }

    function addPrice() {
        $time_stamp = date("Y-m-d", strtotime($this->input->post('time_stamp')));
        $data['market_market_id'] = $this->input->post('market');
        $data['product_product_id'] = $this->input->post('product');
        $data['price'] = $this->input->post('price');
        $data['quantity'] = $this->input->post('qty');
        $data['units'] = $this->input->post('units');
        $data['time_stamp'] = $time_stamp;
        $this->AdminModel->insert_price($data);
        echo json_encode(array('status' => TRUE));
    }

    function priceDetails($price_id) {
        $result = $this->AdminModel->fetchPriceDetails($price_id);
        echo json_encode($result);
    }

    function updatePrice() {
        $time_stamp = date("Y-m-d", strtotime($this->input->post('time_stamp')));
        $data['market_market_id'] = $this->input->post('market');
        $data['product_product_id'] = $this->input->post('product');
        $data['price'] = $this->input->post('price');
        $data['quantity'] = $this->input->post('qty');
        $data['units'] = $this->input->post('units');
        $data['time_stamp'] = $time_stamp;
        $price_id = $this->input->post('price_id');
        $this->AdminModel->editPrice($data, $price_id);
        echo json_encode(array('status' => TRUE));
    }

    function deletePrice($price_id) {
        $this->AdminModel->delete_Price($price_id);
        echo json_encode(array('status' => TRUE));
    }

}
