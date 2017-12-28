<?php
//Kiriman Pesan Pengunjung
Route::post('/kirim-pesan', 'PesanController@store');
//Kiriman Pesan Admin
Route::get('/admin/pesan', 'PesanController@index');
Route::get('/admin/pesan/{id}/destroy', 'PesanController@destroy');
//Syarat
Route::get('/syarat-dan-ketentuan', 'HomeController@syarat');
//Member
Route::get('/daftar-member', 'UserController@member');
Route::get('/member/{slug}', 'UserController@profil');
//Register verification
Route::get('/verify/{token}/{id}', 'Auth\RegisterController@verify_register');
//Social login google
Route::get('auth/google', 'Auth\GoogleController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\GoogleController@handleProviderCallback');
//Social login facebook
Route::get('auth/facebook', 'Auth\FacebookController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleProviderCallback');
//Social login twitter
Route::get('auth/twitter', 'Auth\TwitterController@redirectToProvider');
Route::get('auth/twitter/callback', 'Auth\TwitterController@handleProviderCallback');
//authentication
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/admin', 'AdminController@index');
//Member Auth
Route::post('/member/status/{id}', 'UserController@status');
Route::post('/member/gantiNama/{id}', 'UserController@nama');
Route::post('/member/gantiFoto/{id}', 'UserController@foto');
//Karir
Route::get('/karir', 'UserController@karir');
Route::post('/karir', 'UserController@createKarir');
Route::post('/karir/{id}/edit', 'UserController@updateKarir');
Route::post('/pembayaran/{id}', 'UserController@pembayaran');
Route::post('/cek/sales/{brand}', 'UserController@cekArea');
//admin show pembayaran
Route::get('/admin/checkout', 'MarketingController@indexPembayaran');
Route::get('/admin/pembayaran/{id}/show', 'MarketingController@showPembayaran');
Route::get('/admin/pembayaran/delete/{id}', 'MarketingController@deletePembayaran');
//Kritik dan saran
Route::get('/kritik-dan-saran', 'AdminController@createKritik');
Route::post('/kritik-dan-saran', 'AdminController@storeKritik');
//Kritik dan saran admin
Route::get('/admin/kritik-dan-saran', 'AdminController@indexKritik');
Route::get('/admin/kritik-dan-saran/{title}/{id}', 'AdminController@showKritik');
Route::get('/admin/kritik-delete/{id}', 'AdminController@deleteKritik');
//Brand Admin
Route::get('/admin/brands', 'BrandController@index');
Route::post('/admin/brands', 'BrandController@store');
Route::post('/admin/brand/{id}/edit', 'BrandController@update');
Route::get('/admin/brand/{id}/delete', 'BrandController@destroy');
//Area Admin
Route::get('/admin/areas', 'AreaController@index');
Route::post('/admin/areas', 'AreaController@store');
Route::post('/admin/area/{id}/edit', 'AreaController@update');
Route::get('/admin/area/{id}/delete', 'AreaController@destroy');
//User Admin
Route::get('/admin/users', 'AdminController@users');
Route::post('/admin/users/{id}/edit', 'AdminController@usersEdit');
Route::get('/admin/users/{id}/delete', 'AdminController@usersDelete');
//Mobil Admin
Route::get('/admin/mobils', 'MobilController@create');
Route::post('/admin/mobils', 'MobilController@store');
Route::get('/admin/mobil/{id}/edit', 'MobilController@edit');
Route::post('/admin/mobil/{id}/edit', 'MobilController@update');
Route::get('/admin/mobil/{id}/delete', 'MobilController@destroy');
//Tipe Panel
Route::get('/admin/series/{model}', 'TipeController@create');
Route::post('/admin/series/{model}', 'TipeController@store');
Route::get('/admin/series/{id}/edit', 'TipeController@edit');
Route::post('/admin/series/{id}/edit', 'TipeController@update');
//Marketing Amdin
Route::get('/admin/marketings', 'MarketingController@index');
Route::post('/admin/marketings', 'MarketingController@store');
Route::get('/admin/marketing/{id}/edit', 'MarketingController@edit');
Route::post('/admin/marketing/{id}/edit', 'MarketingController@update');
Route::get('/admin/marketing/{id}/delete', 'MarketingController@destroy');
//Article Amdin
Route::get('/admin/article/create', 'ArticleController@create');
Route::post('/admin/article/create', 'ArticleController@store');
Route::get('/admin/article/{id}/edit', 'ArticleController@edit');
Route::post('/admin/article/{id}/edit', 'ArticleController@update');
Route::get('/admin/article/{id}/delete', 'ArticleController@destroy');
//Video Amdin
Route::get('/admin/video/create', 'VideoController@create');
Route::post('/admin/video/create', 'VideoController@store');
Route::get('/admin/video/{id}/edit', 'VideoController@edit');
Route::post('/admin/video/{id}/edit', 'VideoController@update');
Route::get('/admin/video/{id}/delete', 'VideoController@destroy');
//Spesifikasi Amdin
Route::get('/admin/spesifikasi/create', 'SpekController@create');
Route::post('/admin/spesifikasi/create', 'SpekController@store');
Route::get('/admin/spesifikasi/{id}/edit', 'SpekController@edit');
Route::post('/admin/spesifikasi/{id}/edit', 'SpekController@update');
Route::get('/admin/spesifikasi/{id}/delete', 'SpekController@destroy');
//Marketing show
Route::get('/marketing/{slug}', 'MarketingController@show');
//Dealer Resmi
Route::get('/dealer-resmi-mobil/{slug}/{area}', 'MarketingController@dealer');
//Forum
Route::get('/forum', 'ForumController@index');
Route::get('/forum/create', 'ForumController@create');
Route::post('/forum/create', 'ForumController@store');
Route::get('/forum/{id}/edit', 'ForumController@edit');
Route::post('/forum/{id}/edit', 'ForumController@update');
Route::get('/forum/{brand}/{slug}', 'ForumController@show');
Route::get('/forum/{brand}', 'ForumController@brand');
//Spesifikasi show
Route::get('/spesifikasi', 'SpekController@index');
Route::get('/spesifikasi/all/{brand}', 'SpekController@brand');
Route::get('/spesifikasi/{model}/{title}', 'SpekController@show');
Route::get('/spesifikasi/{model}', 'SpekController@model');
//Article show
Route::get('/articles', 'ArticleController@index');
Route::get('/articles/{brand}/{slug}', 'ArticleController@show');
Route::get('/articles/{brand}', 'ArticleController@brand');
//Video Show
Route::get('/videos', 'VideoController@index');
Route::get('/videos/all/{brand}', 'VideoController@brand');
Route::get('/videos/{model}/{slug}', 'VideoController@show');
Route::get('/videos/{model}', 'VideoController@model');
//Comment
Route::post('/comment/{slug}', 'CommentController@store');
Route::post('/comment/{id}/edit', 'CommentController@update');
//Video Comment
Route::post('/commentar/{slug}', 'VcommentController@store');
Route::post('/commentar/{id}/edit', 'VcommentController@update');
//Mobil global
Route::get('/{brands}', 'MobilController@index');
Route::get('/profil/{brand}/{slugModel}', 'MobilController@show');
//Marketing Area
Route::get('/area/{brand}/{area}', 'MarketingController@area');
//Cari Marketing di show
Route::post('/area/{brand}/{area}', 'MarketingController@area');
//Cari Marketing di home and welcome
Route::post('/cari/{brand}/{area}', 'HomeController@cari');
