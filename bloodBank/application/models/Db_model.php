<?php

class Db_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('date', 'url'));
    }

    
//    $joins = array(
//    array(
//        'table' => 'table2',
//        'condition' => 'table2.id = table1.id',
//        'jointype' => 'LEFT'
//    ),
//);


    public function get_joins($table, $columns, $joins,$where) {
        $this->db->select($columns)->from($table);
        if (is_array($joins) && count($joins) > 0) {
            foreach ($joins as $v) {
                $this->db->join($v['table'], $v['condition'], $v['jointype']);
            }
        }
        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        return $this->db->get()->result_array();
    }

    public function get_details($arr, $table, $where) {
        $this->db->select($arr);
        $this->db->from($table);

        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        $result = $this->db->get();
        $show = $result->result_array();
//        echo $this->db->last_query();
        return $show;
    }

    public function get_details2($arr, $table) {
        $this->db->select($arr);
        $this->db->from($table);
        $result = $this->db->get();
        $show = $result->result_array();
        return $show;
    }

    public function get_details_search($arr, $table, $where = null, $query = null) {

        $this->db->select($arr);
        $this->db->from($table);
        if ($query != null) {
            $this->db->like('area', $query);
           // $this->db->or_like('product_name', $query);
        }
        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }

        $result = $this->db->get();
        $show = $result->result_array();
//        echo $this->db->last_query();
        return $show;
    }

    public function get_all($table) {
        $this->db->select('*');
        $this->db->from($table);
        $result = $this->db->get();
        $show = $result->result_array();
        return $show;
    }

    public function get_details_join($arr, $where) {
        $this->db->select($arr);
        $this->db->from('tbl_products');
        $this->db->join('tbl_suppliers', 'tbl_products.supplier_id=tbl_suppliers.supplier_id ', '');
        $this->db->join('tbl_categories', 'tbl_products.category_id=tbl_categories.category_id', '');
        $this->db->where('tbl_suppliers.status', '1');
        $this->db->where('tbl_categories.status', '1');
        $this->db->where('tbl_products.status', '1');
        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        $result = $this->db->get();

        $show = $result->result_array();
//      echo   $this->db->last_query();
        return $show;
    }

    public function get_details_join2($arr, $where) {
        $this->db->select($arr);
        $this->db->from('tbl_products');
        $this->db->join('tbl_suppliers', 'tbl_products.supplier_id=tbl_suppliers.supplier_id ', '');
        $this->db->join('tbl_categories', 'tbl_products.category_id=tbl_categories.category_id', '');
        $this->db->where('tbl_suppliers.status', '1');
        $this->db->where('tbl_categories.status', '1');
//        $this->db->where('tbl_products.status', '1');
        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        $result = $this->db->get();

        $show = $result->result_array();
//      echo   $this->db->last_query();
        return $show;
    }

    public function get_all_orderby($arr, $table, $where = null, $order = null) {
        $this->db->select($arr);
        $this->db->from($table);
        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        foreach ($order as $key => $value) {
            $this->db->order_by($key, $value);
        }
//        $this->db->order_by('device_details.id', 'desc');
//        $this->db->limit(2);
        $result = $this->db->get();
//        echo $this->db->last_query();
        $show = $result->result_array();
        return $show;
    }

    public function insert($table, $data) {
        $this->db->insert($table, $data);
        $inset_id = $this->db->insert_id();
//        echo $this->db->last_query();
        return $inset_id;
    }

    public function update($table, $data, $where) {
        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    public function delete($table, $where) {
        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        $this->db->delete($table);

        return $this->db->affected_rows();
    }

    public function get_details_cart_items($arr, $where) {
        $this->db->select($arr);
        $this->db->from('tbl_cart');
        $this->db->join('tbl_products', 'tbl_products.products_id=tbl_cart.product_id', '');
        $this->db->join('tbl_suppliers', 'tbl_products.supplier_id=tbl_suppliers.supplier_id', '');
        $this->db->join('tbl_categories', 'tbl_products.category_id=tbl_categories.category_id', '');
        $this->db->where('tbl_suppliers.status', '1');
        $this->db->where('tbl_categories.status', '1');
        $this->db->where('tbl_products.status', '1');

        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        $result = $this->db->get();
        $show = $result->result_array();
//        print_r($this->db->last_query());
        return $show;
    }

    public function get_details_cart_items2($arr, $where) {
        $this->db->select($arr);
        $this->db->from('tbl_cart');
        $this->db->join('tbl_products', 'tbl_products.products_id=tbl_cart.product_id', '');
        $this->db->join('tbl_suppliers', 'tbl_products.supplier_id=tbl_suppliers.supplier_id', '');
        $this->db->join('tbl_categories', 'tbl_products.category_id=tbl_categories.category_id', '');


        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        $result = $this->db->get();
        $show = $result->result_array();
//        print_r($this->db->last_query());
        return $show;
    }

    public function get_details_wishlist_items($arr, $where) {
        $this->db->select($arr);
        $this->db->from('tbl_wishlist');
        $this->db->join('tbl_products', 'tbl_products.products_id=tbl_wishlist.product_id', '');
        $this->db->join('tbl_suppliers', 'tbl_products.supplier_id=tbl_suppliers.supplier_id', '');
        $this->db->join('tbl_categories', 'tbl_products.category_id=tbl_categories.category_id', '');
        $this->db->where('tbl_suppliers.status', '1');
        $this->db->where('tbl_categories.status', '1');
        $this->db->where('tbl_products.status', '1');

        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        $result = $this->db->get();
        $show = $result->result_array();

//        print_r($this->db->last_query());
        return $show;
    }

    /// back end

    public function get_details_orders($arr, $where) {
        $this->db->select($arr);
        $this->db->from('tbl_orders');
        $this->db->join('tbl_users', 'tbl_users.user_id=tbl_orders.user_id ', '');
        //        $this->db->where('tbl_products.status', '1');
        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        $result = $this->db->get();
        $show = $result->result_array();
//      echo   $this->db->last_query();
        return $show;
    }

}
