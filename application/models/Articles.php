<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Articles extends CI_Model{
    protected $_list;
    
    public function __construct() {
        parent::__construct();
        $this->_list=[];
    }
    
    public function __get($key){
        $method_name='get_property_'.$key;
      if(method_exists($this,$method_name)){
          return $this->$method_name();
      }else{
          return parent::__get($key);
      }  
    }
    
    protected function get_property_has_item(){//indique s'il y a des articles
        return count($this->_list)>0;
    }
    
    protected function get_property_items(){//retourne le liste des articles
        return $this->_list;
    }
    
    protected function get_property_num_items(){//retourne le nombre d'articles
        return count ($this->_list);
    }
    
    public function load($show_hidden=false){
        $this->db->select("id, title, alias, SUBSTRING_INDEX(content, ' ', 20) AS content, date, status, author_id")
                 ->from ('article')
                 ->order_by ('date', 'DESC');
        if(!$show_hidden){
            $this->db->where('status', 'P');
        }
        $this->_list=$this->db->get()->result();        
    }
} 

