<?php

// Inicio
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Principal', route('home'));
});

/**
 * Roles
*/
Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('home');
    $trail->push('Roles', route('roles.index'));
});

Breadcrumbs::for('rolescreate', function ($trail) {
    $trail->parent('roles');
    $trail->push('Nuevo', route('roles.create'));
});

Breadcrumbs::for('rolesedit', function ($trail) {
    $trail->parent('roles');
    $trail->push('Editar', route('roles.index'));
});

/**
 * Usuarios
*/
Breadcrumbs::for('usuarios', function ($trail) {
    $trail->parent('home');
    $trail->push('Usuarios', route('users.index'));
});

Breadcrumbs::for('userscreate', function ($trail) {
    $trail->parent('usuarios');
    $trail->push('Nuevo', route('users.index'));
});

Breadcrumbs::for('usersedit', function ($trail) {
    $trail->parent('usuarios');
    $trail->push('Editar', route('users.index'));
});

/**
 * Empresa
*/
Breadcrumbs::for('empresas', function ($trail) {
    $trail->parent('home');
    $trail->push('Empresa', route('empresas.index'));
});

/**
 * Perfil de Usuario
*/
Breadcrumbs::for('perfil', function ($trail) {
    $trail->parent('home');
    $trail->push('Perfil', route('users.perfil'));
});