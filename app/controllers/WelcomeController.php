<?php
/**
 * Created by PhpStorm.
 * User: joy
 * Date: 1/4/15
 * Time: 12:49 PM
 */

class WelcomeController extends BaseController {

    public function index()
    {
        return View::make('pages.home');
    }
}