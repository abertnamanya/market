<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminModel
 *
 * @author abert
 */
class AdminModel extends CI_Model {

    public function getUsersCount() {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getMarketCount() {
        $this->db->select('*');
        $this->db->from('markets');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getProductsCount() {
        $this->db->select('*');
        $this->db->from('products');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getCategoriesCount() {
        $this->db->select('*');
        $this->db->from('categories');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function fetch_users() {
        $this->db->from('users');
        $query = $this->db->get()->result();
        return $query;
    }

    function saveUser($data) {
        return $this->db->insert('users', $data);
    }

    function fetchUserDetails($user_id) {
        $this->db->from('users');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get()->row();
        return $query;
    }

    function editUser($data, $user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->update('users', $data);
    }

    function delete_User($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->delete('users');
    }

    function fetch_locations() {
        $this->db->from('location');
        $query = $this->db->get()->result();
        return $query;
    }

    function registerLocation($data) {
        return $this->db->insert('location', $data);
    }

    function fetchLocationDetails($location_id) {
        $this->db->from('location');
        $this->db->where('location_id', $location_id);
        $query = $this->db->get()->row();
        return $query;
    }

    function editLocation($data, $location_id) {
        $this->db->where('location_id', $location_id);
        $this->db->update('location', $data);
    }

    function delete_Location($location_id) {
        $this->db->where('location_id', $location_id);
        $this->db->delete('location');
    }

    function fetch_markets() {
        $this->db->from('markets');
        $this->db->join('location', 'markets.location_location_id=location.location_id', 'left');
        $query = $this->db->get()->result();
        return $query;
    }

    function registerMarkdet($data) {
        return $this->db->insert('markets', $data);
    }

    function fetchMarketDetails($market_id) {
        $this->db->from('markets');
        $this->db->where('market_id', $market_id);
        $query = $this->db->get()->row();
        return $query;
    }

    function editMarket($data, $market_id) {
        $this->db->where('market_id', $market_id);
        $this->db->update('markets', $data);
    }

    function delete_Market($market_id) {
        $this->db->where('market_id', $market_id);
        $this->db->delete('markets');
    }

    function fetch_categories() {
        $this->db->from('categories');
        $query = $this->db->get()->result();
        return $query;
    }

    function addCategory($data) {
        return $this->db->insert('categories', $data);
    }

    function fetchCatgoryDetails($category_id) {
        $this->db->from('categories');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get()->row();
        return $query;
    }

    function editCategory($data, $category_id) {
        $this->db->where('category_id', $category_id);
        $this->db->update('categories', $data);
    }

    function delete_Catagory($category_id) {
        $this->db->where('category_id', $category_id);
        $this->db->delete('categories');
    }

    function fetch_products() {
        $this->db->from('products');
        $this->db->join('categories', 'products.category_category_id=categories.category_id', 'left');
        $query = $this->db->get()->result();
        return $query;
    }

    function registerProduct($data) {
        return $this->db->insert('products', $data);
    }

    function fetchProductDetails($product_id) {
        $this->db->from('products');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get()->row();
        return $query;
    }

    function editProduct($data, $product_id) {
        $this->db->where('product_id', $product_id);
        $this->db->update('products', $data);
    }

    function delete_Product($product_id) {
        $this->db->where('product_id', $product_id);
        $this->db->delete('products');
    }

    function fetch_prices() {
        $this->db->select('*,DATE_FORMAT(time_stamp, \'%d/%m/%Y\') as time_stamp');
        $this->db->from('prices');
        $this->db->join('products', 'prices.product_product_id=products.product_id', 'left');
        $this->db->join('markets', 'prices.market_market_id=markets.market_id', 'left');
        $this->db->order_by('price_id', 'desc');
        $query = $this->db->get()->result();
        return $query;
    }

    function insert_price($data) {
        return $this->db->insert('prices', $data);
    }

    function fetchPriceDetails($price_id) {
        $this->db->select('*,DATE_FORMAT(time_stamp, \'%d/%m/%Y\') as time_stamp');
        $this->db->from('prices');
        $this->db->where('price_id', $price_id);
        $query = $this->db->get()->row();
        return $query;
    }

    function editPrice($data, $price_id) {
        $this->db->where('price_id', $price_id);
        $this->db->update('prices', $data);
    }

    function delete_Price($price_id) {
        $this->db->where('price_id', $price_id);
        $this->db->delete('prices');
    }

}
