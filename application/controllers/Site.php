<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function index() {
        $data["title"] = "Page d'accueil";

        $this->load->view('common/header', $data);
        $this->load->view('site/index', $data);
        $this->load->view('common/footer', $data);
    }

    public function contact() {
        $this->load->helper("form");
        $this->load->library('form_validation');
        
        $data["title"] = "contact";

        $this->load->view('common/header', $data);
        if($this->form_validation->run()){
            $this->load->library('email');
            //on charge les paramètres de config/email.php
            $this->config->load('email',TRUE);
            $this->email->initialize($this->config->item('email'));
            //on prépare l'envoi du mail
            $this->email->from($this->input->post('email'),$this->input->post('name'));
            $this->email->to('dadou20231@gmail.com');
            $this->email->subject($this->input->post('title'));
            $this->email->message($this->input->post('message'));
            if($this->email->send()){
                $data['result_class']='alert_success';
                $data['result_message']="Merci d'avoir envoyé ce mail. nous y répondrons dans les meilleurs délais";
            }else{
                $data['result_class']='alert-danger';
                $data['result_message']="Votre message n'a pu être envoyé veuillez nous en excuser";
               /** $data['result_message']="<pre>\n";
                $data['result_message']=$this->email->print_debugger();
                $data['result_message']="<pre>\n";**/
                $this->email->clear();
            }
            $this->load->view('site/contact_result',$data);
        }else{
        $this->load->view('site/contact', $data);
        }
        $this->load->view('common/footer', $data);
    }

    public function presentation(){
        $data["title"]="page de présentation";
        
        $this->load->view('common/header',$data);
        $this->load->view('site/presentation',$data);
        $this->load->view('common/footer',$data);
    }
}
