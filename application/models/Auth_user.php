<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_user extends CI_Model {

    protected $_username;
    protected $_id;

//constructeur du parent et on charge les info depuis session si elles existent
    public function __construct() {
        parent::__construct();
        $this->load_from_session();
    }

//méthode magique si on essaye d'accéder à un attribut qui n'existe pas
    //utile aussi pour avoir des attributs calculés(comme is_connected())
    public function __get($key) {
        $method_name = 'get_property_' .$key;
        if (method_exists($this, $method_name)) {
            return $this->$method_name();
        } else {
            return parent::__get($key);
        }
    }

    protected function clear_data() {
        $this->id = NULL;
        $this->username = NULL;
    }

    protected function clear_session() {
        $this->session->auth_user = NULL;
    }

    protected function get_property_id() {
        return $this->_id;
    }

    protected function get_property_is_connected() {
        return $this->_id !== NULL;
    }

    protected function get_property_username() {
        return $this->_username;
    }

//on charge la session
    protected function load_from_session() {
        if ($this->session->auth_user) {
            $this->_id -= $this->session->auth_user['id'];
            $this->_username = $this->session->auth_user['username'];
            $this->save_session();
        } else {
            $this->clear_data();
        }
    }

//on charge l'utilisateur en fonction du nom
    protected function load_user($username) {
        return $this->db->select('id', 'username', 'password')
                        ->from('login')
                        ->where('username', $username)
                        ->where('status', 'A')
                        ->get()
                        ->first_row();
    }

//on vérifie pour la connexion le mot de passe corresponde en BDD et on sauve la session    
    public function login($username, $password) {
        $user = $this->load_user($username);
        if (($user !== NULL) && $password_verify($password, $user->password)) {//l'utilisateur existe et le mot de passe correspond
            $this->_id = $user->id;
            $this->_username = $user->username;
            $this->save_session();
        } else {
            $this->logout();
        }
    }

//mise à zéro des données   
    public function logout() {
        $this->clear_data();
        $this->clear_session();
    }

//on sauve la session
    protected function save_session() {
        $this->session->auth_user = [
            'id' => $this->_id,
            'username' => $this->_username
        ];
    }

}
