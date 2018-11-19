<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;


Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $routes->fallbacks(DashedRoute::class);
});

Router::scope('/api/v1', function (RouteBuilder $routes) {
    
    /**
     * マスター用
     */
    $routes->get('/pokemons', ['prefix' => 'api/master', 'controller' => 'Pokemons', 'action' => 'getList']);
    $routes->get('/pokemons/:zukanNo/:subNo', ['prefix' => 'api/master', 'controller' => 'Pokemons', 'action' => 'get'])->setPass(['zukanNo', 'subNo']);
    $routes->get('/pokemons/:zukanNo/:subNo/skills', ['prefix' => 'api/master', 'controller' => 'Pokemons', 'action' => 'getSkills'])->setPass(['zukanNo', 'subNo']);
    $routes->get('/qualities', ['prefix' => 'api/master', 'controller' => 'Qualities', 'action' => 'getList']);
    $routes->get('/qualities/:qualityId', ['prefix' => 'api/master', 'controller' => 'Qualities', 'action' => 'get'])->setPass(['qualityId']);
    $routes->get('/skills', ['prefix' => 'api/master', 'controller' => 'Skills', 'action' => 'getList']);
    $routes->get('/skills/:skillId', ['prefix' => 'api/master', 'controller' => 'Skills', 'action' => 'get'])->setPass(['skillId']);
    
    /**
     * 育成用
     */
    
    /**
     * 対戦用
     */
    
    $routes->fallbacks(DashedRoute::class);
});
