<?php

namespace core\controllers;

use core\classes\Functions;

class Admin
{
    //====================================================================================================================
    public function index()
    {
        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/home',
            'admin/rodape',
            'admin/layouts/html_footer',
        ];
       
        Functions::layout_admin($views);
        return;
        

    }
    public function login(){

        if (isset($_SESSION['admin'])) {
            Functions::redirect_admin('inicio');
            return;
        }

        $views = [
            'admin/layouts/html_head',
            'admin/head',
            'admin/login',
            'admin/rodape',
            'admin/layouts/html_footer',

        ];

        Functions::layout_admin($views,);
        return;
    }
}