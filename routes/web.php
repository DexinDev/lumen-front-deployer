<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', ['uses' => 'ReposListController@viewLists', "as" => "index"]);
$router->get('/deploy/{branch}', ['uses' => 'DeployController@deploy', "as" => "deploy"]);
$router->get('/delete/{branch}', ['uses' => 'BranchDeleteController@delete', "as" => "delete"]);
$router->post('/hook/update', ['uses' => 'HookController@updateHook', "as" => "hookupdate"]);
$router->get('/hook/update', ['uses' => 'HookController@updateHook', "as" => "hookupdate"]);
