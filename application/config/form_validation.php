<?php defined('BASEPATH') or exit('No direct script access allowed');

$config = [
    "auth/login" => [
        ['field' => 'email', 'label' => 'Driver Email', 'rules' => 'trim|required'],
        ['field' => 'password', 'label' => 'Driver Password', 'rules' => 'trim|required'],
    ],
    "section/update" => [
        ['field' => 'title', 'label' => 'Section Title', 'rules' => 'trim|required'],
        ['field' => 'description', 'label' => 'Section Description', 'rules' => 'trim|required'],
    ],
];
