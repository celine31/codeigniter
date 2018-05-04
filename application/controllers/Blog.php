<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function index() {
        $this->load->helper('date');
        $this->load->model('articles');
        $this->load->model('article_status');
        $this->articles->load($this->auth_user->is_connected);

        $data["title"] = "Blog";
        if ($this->auth_user->is_connected) {
            $this->load->view('common/header', $data);
            $this->load->view('blog/index', $data);
            $this->load->view('common/footer', $data);
        }
    }

    /* méthode remplacée par édition qui gère l'ajout et la modification 
     * public function nouvel_article() {
      $this->load->model('article_status');
      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->set_blog_post_validation();

      $data['title'] = "nouvel article";

      if ($this->form_validation->run() == TRUE) {
      $this->load->model('article');
      $this->article->author_id = $this->auth_user->id;
      $this->article->content = $this->input->post('content');
      $this->article->status = $this->input->post('status');
      $this->article->title = $this->input->post('title');
      $this->article->save();
      if ($this->article->is_found) {
      redirect('blog/index');
      }
      }
      $this->load->view('common/header', $data);
      $this->load->view('blog/form', $data);
      $this->load->view('common/footer', $data);
      }
     */

    protected function set_blog_post_validation() { //mieux si fait à part
        $list = join(',', $this->article_status->codes);
        $this->form_validation->set_rules('title', 'Titre', 'required|max_length[64]');
        $this->form_validation->set_rules('content', 'Contenu', 'required');
        $this->form_validation->set_rules('status', 'Statut', 'required|in_list[' . $list . ']');
    }

    public function article($id = NULL) {
        if (!is_numeric($id)) {
            redirect('blog/index');
        }
        $this->load->helper('date', 'url');
        $this->load->model('article');
        $this->load->model('article_status');
        $this->article->load($id, $this->auth_user->is_connected);

        if ($this->article->is_found) {
            $data['title'] = htmlentities($this->article->title);

            $this->load->view('common/header', $data);
            $this->load->view('blog/article', $data);
            $this->load->view('common/footer', $data);
        } else {
            redirect('blog/index');
        }
    }

    public function editer($id = NULL) {
        if (!$this->auth_user->is_connected) {//on vérifie que l'utilisateur est connecté
            redirect('blog/index');
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('article');
        $this->load->model('article_status');
        if ($id !== NULL) {//on vérifie qu'il y a un id sinon création d'un nouvel article
            if (is_numeric($id)) {
                $this->article->load($id, TRUE);
                if (!$this->article->is_found) {//vérification de la validité 
                    redirect('blog/index');
                }
            } else {
                redirect('blog/index');
            }
            $data['title'] = "Modification de l'article";
        } else {
            $data['title'] = "nouvel article";
            $this->article->author_id = $this->auth_user->id;
        }
        $this->set_blog_post_validation();

        if ($this->form_validation->run() == TRUE) {
            $this->article->content = $this->input->post('content');
            $this->article->status = $this->input->post('status');
            $this->article->title = $this->input->post('title');
            $this->article->save();
            if ($this->article->is_found) {
                redirect('blog/index');
            }
        }
        $this->load->view('common/header', $data);
        $this->load->view('blog/form', $data);
        $this->load->view('common/footer', $data);
    }
}
