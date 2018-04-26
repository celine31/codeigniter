<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config =array(
    'site/contact'=>array(
        array(
            'field'=>'name',
            'label'=>'nom',
            'rules'=>'required|min_length[5]|max_length[12]'
        ),
        array(
            'field'=>'email',
            'label'=>'email',
            'rules'=>array('valid_email'=>'required')
        ),
        array(
            'field'=>'confEmail',
            'label'=>"confirmation d'email",
            'rules'=>array('valid_email','required','matches[email]')
        ),
        array(
            'field'=>'title',
            'label'=>'title',
            'rules'=>'required'
        ),
        array(
            'field'=>'message',
            'label'=>'message',
            'rules'=>'required'
        )
    )
);

