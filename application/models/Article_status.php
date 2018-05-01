<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Article_status extends CI_Model {

    protected $_status;

    public function __construct() {
        $this->_status = [
            "W" => [
                'text' => "brouillon",
                'decoration' => 'warning'
            ],
            "P" => [
                'text' => "publié",
                'decoration' => 'primary'
            ],
            "D" => [
                'text' => "supprimé",
                'decoration' => 'danger'
            ]
        ];
    }

    public function __get($key) {
        $method_name = 'get_property_' . $key;
        if (method_exists($this, $method_name)) {
            return $this->$method_name();
        } else {
            return parent::__get($key);
        }
    }

    public function get_property_label() {//retournera un tableau des textes des statuts avec formattage HTML
        $result = [];
        foreach ($this->_status as $key => $value) {
            $result[$key] = '<span class="label label-'
                    . $value['decoration'] . '">'
                    . $value['text'] . '</span>';
        }
        return $result;
    }

    public function get_property_text() {//retournera un tableau des textes
        $result = [];
        foreach ($this->_status as $key => $value) {
            $result[$key] = $value['text'];
        }
        return $result;
    }

    public function get_property_codes(){//retourne le liste des codes possibles
        return array_keys($this->_status);
    }
}
