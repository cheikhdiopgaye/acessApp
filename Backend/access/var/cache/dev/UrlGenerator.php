<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '\\d+', 'code'], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    'entreprise' => [[], ['_controller' => 'App\\Controller\\EntrepriseController::index'], [], [['text', '/api/entreprise']], [], []],
    'app_register' => [[], ['_controller' => 'App\\Controller\\EntrepriseController::register'], [], [['text', '/api/register']], [], []],
    'offre' => [[], ['_controller' => 'App\\Controller\\OffreController::index'], [], [['text', '/offre']], [], []],
    'login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/api/logincheck']], [], []],
    'user' => [[], ['_controller' => 'App\\Controller\\UserController::index'], [], [['text', '/user']], [], []],
    'api_entrypoint' => [['index', '_format'], ['_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index' => 'index'], [['variable', '.', '[^/]++', '_format'], ['variable', '/', 'index', 'index'], ['text', '/api']], [], []],
    'api_doc' => [['_format'], ['_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], [], [['variable', '.', '[^/]++', '_format'], ['text', '/api/docs']], [], []],
    'api_jsonld_context' => [['shortName', '_format'], ['_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName' => '.+'], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '.+', 'shortName'], ['text', '/api/contexts']], [], []],
    'api_entreprises_get_collection' => [['_format'], ['_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Entreprise', '_api_collection_operation_name' => 'get'], [], [['variable', '.', '[^/]++', '_format'], ['text', '/api/entreprises']], [], []],
    'api_entreprises_post_collection' => [['_format'], ['_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Entreprise', '_api_collection_operation_name' => 'post'], [], [['variable', '.', '[^/]++', '_format'], ['text', '/api/entreprises']], [], []],
    'api_entreprises_get_item' => [['id', '_format'], ['_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Entreprise', '_api_item_operation_name' => 'get'], [], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '[^/\\.]++', 'id'], ['text', '/api/entreprises']], [], []],
    'api_entreprises_delete_item' => [['id', '_format'], ['_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Entreprise', '_api_item_operation_name' => 'delete'], [], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '[^/\\.]++', 'id'], ['text', '/api/entreprises']], [], []],
    'api_entreprises_put_item' => [['id', '_format'], ['_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Entreprise', '_api_item_operation_name' => 'put'], [], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '[^/\\.]++', 'id'], ['text', '/api/entreprises']], [], []],
    'api_entreprises_patch_item' => [['id', '_format'], ['_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Entreprise', '_api_item_operation_name' => 'patch'], [], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '[^/\\.]++', 'id'], ['text', '/api/entreprises']], [], []],
    'api_offres_get_collection' => [['_format'], ['_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Offre', '_api_collection_operation_name' => 'get'], [], [['variable', '.', '[^/]++', '_format'], ['text', '/api/offres']], [], []],
    'api_offres_post_collection' => [['_format'], ['_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Offre', '_api_collection_operation_name' => 'post'], [], [['variable', '.', '[^/]++', '_format'], ['text', '/api/offres']], [], []],
    'api_offres_get_item' => [['id', '_format'], ['_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Offre', '_api_item_operation_name' => 'get'], [], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '[^/\\.]++', 'id'], ['text', '/api/offres']], [], []],
    'api_offres_delete_item' => [['id', '_format'], ['_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Offre', '_api_item_operation_name' => 'delete'], [], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '[^/\\.]++', 'id'], ['text', '/api/offres']], [], []],
    'api_offres_put_item' => [['id', '_format'], ['_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Offre', '_api_item_operation_name' => 'put'], [], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '[^/\\.]++', 'id'], ['text', '/api/offres']], [], []],
    'api_offres_patch_item' => [['id', '_format'], ['_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Offre', '_api_item_operation_name' => 'patch'], [], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '[^/\\.]++', 'id'], ['text', '/api/offres']], [], []],
];
