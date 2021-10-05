<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")
// $router->add();

$router->add("/(home)?", ['GET'], 'App\Controller\PortfolioController', 'index', 'home');
$router->add("/admin/signup", ['GET', 'POST'], 'App\Controller\PortfolioController', 'signup', 'signup');
$router->add("/admin/signin", ['GET', 'POST'], 'App\Controller\PortfolioController', 'signin', 'signin');
$router->add("/logout", ['GET'], 'App\Controller\PortfolioController', 'logout', 'logout');

$router->add("/admin", ['GET'], 'App\Controller\ProfileController', 'index', 'profile');
$router->add("/admin/edit", ['GET, POST'], 'App\Controller\ProfileController', 'edit', 'edit_profile');

$router->add("/admin/task", ['GET'], 'App\Controller\TaskController', 'index', 'list_tasks');
$router->add("/admin/task/(\d+)/edit", ['GET', 'POST'], 'App\Controller\TaskController', 'edit', 'edit_task');
$router->add("/admin/task/add", ['GET', 'POST'], 'App\Controller\TaskController', 'add', 'add_task');
$router->add("/admin/task/(\d+)/delete", ['GET'], 'App\Controller\TaskController', 'delete', 'delete_task');

$router->add("/admin/type", ['GET'], 'App\Controller\TypeController', 'index', 'list_types');
$router->add("/admin/type/(\d+)/edit", ['GET', 'POST'], 'App\Controller\TypeController', 'edit', 'edit_type');
$router->add("/admin/type/add", ['GET', 'POST'], 'App\Controller\TypeController', 'add', 'add_type');
$router->add("/admin/type/(\d+)/delete", ['GET'], 'App\Controller\TypeController', 'delete', 'delete_type');

$router->add("/admin/tags", ['GET'], 'App\Controller\TagController', 'index', 'list_tags');
$router->add("/admin/tag/(\d+)/edit", ['GET', 'POST'], 'App\Controller\TagController', 'edit', 'edit_tag');
$router->add("/admin/tag/add", ['GET', 'POST'], 'App\Controller\TagController', 'add', 'add_tag');
$router->add("/admin/tag/(\d+)/delete", ['GET'], 'App\Controller\TagController', 'delete', 'delete_tag');

$router->add("/admin/educations", ['GET'], 'App\Controller\EducationController', 'index', 'list_educations');
$router->add("/admin/education/(\d+)/edit", ['GET', 'POST'], 'App\Controller\EducationController', 'edit', 'edit_education');
$router->add("/admin/education/(\d+)/add", ['GET', 'POST'], 'App\Controller\EducationController', 'add', 'add_education');
$router->add("/admin/education/(\d+)/delete", ['GET'], 'App\Controller\EducationController', 'delete', 'delete_education');

$router->add("/admin/projects", ['GET'], 'App\Controller\ProjectController', 'index', 'list_projects');
$router->add("/admin/project/(\d+)/edit", ['GET', 'POST'], 'App\Controller\ProjectController', 'edit', 'edit_project');
$router->add("/admin/project/add", ['GET', 'POST'], 'App\Controller\ProjectController', 'add', 'add_project');
$router->add("/admin/project/(\d+)/delete", ['GET'], 'App\Controller\ProjectController', 'delete', 'delete_project');

$router->add("/projects", ['GET'], 'App\Controller\ProjectController', 'index', 'list_projects');
$router->add("/project/(\d+)/edit", ['GET'], 'App\Controller\ProjectController', 'edit', 'edit_project');
$router->add("/educations", ['GET'], 'App\Controller\EducationController', 'index', 'list_educations');
$router->add("/profile", ['GET'], 'App\Controller\ProfileController', 'index', 'profile');
