<?php

use PhpSlides\view;
use PhpSlides\Route;

/**
 * --------------------------------------------------------------------
 * | Register web routes here to render according to request
 * | NOTE - that browser or any other request cannot access any page
 * | that are not coming from route, it redirects to 404
 * --------------------------------------------------------------------
 */
Route::view('/', '::App');
Route::any('*', view::render('::Errors::404'));
