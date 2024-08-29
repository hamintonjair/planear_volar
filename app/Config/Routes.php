<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// SITIO
$routes->get('/', 'Home::index');
$routes->get('paquetes', 'Paquete::paquete');
$routes->get('paquetes/descripcion/(:num)', 'Paquete::descripcion/$1');

$routes->get('acerca_de', 'Acerca::acerca');
$routes->get('contactanos', 'Contacto::contacto');
$routes->post('enviar', 'Contacto::mensaje');

$routes->get('vuelos', 'Vuelo::vuelo');
$routes->get('testimonio', 'Testimonio::testimonio');

$routes->get('destino', 'Destino::destino');
$routes->get('destinos/detalles/(:num)', 'Destino::detalles/$1');

$routes->get('guias', 'Guia::guias');
$routes->get('trabaja_con_nosotros', 'Trabajos::trabajos');
$routes->post('trabajos/apply', 'Trabajos::apply');


$routes->post('reservar', 'Home::reservar');

// ADMIN
$routes->get('login', 'Login::login');
$routes->post('validar', 'Login::validar');
$routes->get('logout', 'Login::logout');
$routes->get('dashboard', 'AdminDashboard::panel');
// USUARIO
$routes->get('usuarios', 'AdminUsuarios::users');
$routes->post('setUsuario', 'AdminUsuarios::getUsuarios');
$routes->post('usuarios/registrarUsuario', 'AdminUsuarios::getUsuarios');
$routes->get('getUsuarios', 'AdminUsuarios::ListarUsuarios');
$routes->get('usuarios/obtenerUsuario/(:num)', 'AdminUsuarios::obtenerUsuario/$1');
$routes->post('usuarios/deleteUsuario/(:num)', 'AdminUsuarios::deleteUser/$1');
$routes->get('usuarios/usuarios_eliminados', 'AdminUsuarios::VistaUsuariosEliminados');
$routes->get('usuarios/getUsuariosEliminados', 'AdminUsuarios::ListarUsuariosEli');
$routes->post('usuarios/restaurarUsuario/(:num)', 'AdminUsuarios::restaurarUser/$1');
$routes->get('usuarios/editarUsuario/(:num)', 'AdminUsuarios::editarUser/$1');
$routes->post('usuarios/actualizarUsuario', 'AdminUsuarios::getUsuarios');
// PERFIL
$routes->get('usuarios/perfil', 'AdminUsuarios::perfil');
$routes->get('usuario/perfil/obtener', 'AdminUsuarios::obtener');
$routes->post('usuario/perfil/actualizar', 'AdminUsuarios::actualizar');

//PERMISOS
$routes->get('usuarios/obtenerPermisos/(:num)', 'AdminPermisos::obtenerPermisos/$1');
$routes->post('usuarios/guardarPermisos', 'AdminPermisos::guardarPermisos');

// CLIENTE
$routes->get('clientes', 'AdminClientes::client');
$routes->post('setCliente', 'AdminClientes::getClientes');
$routes->post('clientes/registrarCliente', 'AdminClientes::getClientes');
$routes->get('getClientes', 'AdminClientes::ListarClientes');
$routes->get('clientes/obtenerCliente/(:num)', 'AdminClientes::obtenerCliente/$1');
$routes->post('clientes/deleteCliente/(:num)', 'AdminClientes::deleteUser/$1');
$routes->get('clientes/editarCliente/(:num)', 'AdminClientes::editarUser/$1');
$routes->post('clientes/actualizarCliente', 'AdminClientes::getClientes');

// ACERCA DE NOSOTROS
$routes->get('acerca', 'AdminAcerca::about');
$routes->get('acerca/obtener', 'AdminAcerca::obtener');
$routes->post('acerca/actualizar', 'AdminAcerca::actualizar');

// CONFIGURACION
$routes->get('configuracion', 'AdminConfiguracion::config');
$routes->get('configuracion/obtener', 'AdminConfiguracion::obtener');
$routes->post('configuracion/actualizar', 'AdminConfiguracion::actualizar');

// DESTINO
$routes->get('destinos', 'AdminDestinos::destinations');
$routes->get('destinos/listar', 'AdminDestinos::listar');
$routes->get('destinos/obtener/(:num)', 'AdminDestinos::obtener/$1');
$routes->post('destinos/guardar', 'AdminDestinos::guardar');
$routes->post('destinos/eliminar/(:num)', 'AdminDestinos::eliminar/$1');


// GUIAS
$routes->get('guias_de_viajes', 'AdminGuias::guides');
$routes->get('guias/listar', 'AdminGuias::listar');
$routes->post('guias/registrar', 'AdminGuias::registrar');
$routes->get('guias/obtener/(:num)', 'AdminGuias::obtener/$1');
$routes->post('guias/actualizar', 'AdminGuias::actualizar');
$routes->post('guias/eliminar/(:num)', 'AdminGuias::eliminar/$1');

// MENSAJES
$routes->get('mensajes', 'AdminMensajes::messages');
$routes->post('mensajes/update', 'AdminMensajes::updateEstado');

// PAQUETES TURISTICOS
$routes->get('paquetes_turisticos', 'AdminPaquetes::packages');
$routes->get('paquetes/listar', 'AdminPaquetes::listar');
$routes->post('paquetes/registrar', 'AdminPaquetes::registrar');
$routes->get('paquetes/obtener/(:num)', 'AdminPaquetes::obtener/$1');
$routes->post('paquetes/actualizar', 'AdminPaquetes::actualizar');
$routes->post('paquetes/eliminar/(:num)', 'AdminPaquetes::eliminar/$1');
$routes->get('reservas/paquete_descripcion/(:num)', 'AdminPaquetes::getPaqueteDescripcion/$1');


// OFERTA
$routes->get('ofertas', 'AdminOferta::oferta');
$routes->post('ofertas/addOferta', 'AdminOferta::addOferta');
$routes->post('ofertas/deleteOferta/(:num)', 'AdminOferta::deleteOferta/$1');
$routes->post('oferta/update', 'AdminOferta::updateEstado');

// TESTIMONIOS
$routes->get('testimonios', 'AdminTestimonios::testimonials');
$routes->get('testimonios/listar', 'AdminTestimonios::listar');
$routes->get('testimonios/obtener/(:num)', 'AdminTestimonios::obtener/$1');
$routes->post('testimonios/registrar', 'AdminTestimonios::registrar');
$routes->post('testimonios/actualizar', 'AdminTestimonios::actualizar');
$routes->post('testimonios/eliminar/(:num)', 'AdminTestimonios::eliminar/$1');


// TRABAJOS
$routes->get('trabajos', 'AdminTrabajos::jobs');
$routes->get('vacantes/listar', 'AdminTrabajos::listar');
$routes->post('vacantes/registrar', 'AdminTrabajos::registrar');
$routes->get('vacantes/obtener/(:num)', 'AdminTrabajos::obtener/$1');
$routes->post('vacantes/actualizar', 'AdminTrabajos::actualizar');
$routes->post('vacantes/eliminar/(:num)', 'AdminTrabajos::eliminar/$1');
$routes->post('vacantes/delete/(:num)', 'AdminTrabajos::delete/$1');
$routes->post('aplicaciones/cambiarEstado', 'AdminTrabajos::cambiarEstado');
$routes->get('vacantes/aplicados', 'AdminTrabajos::aplicado');
$routes->get('vacantes/ver_mas/(:num)', 'AdminTrabajos::ver_mas/$1');

// VUELOS
$routes->get('vuelo', 'AdminVuelos::flights');
$routes->get('vuelos/create', 'AdminVuelos::create');
$routes->post('vuelos/store', 'AdminVuelos::store');
$routes->get('vuelos/edit/(:num)', 'AdminVuelos::edit/$1');
$routes->post('vuelos/update/(:num)', 'AdminVuelos::update/$1');
$routes->get('vuelos/delete/(:num)', 'AdminVuelos::delete/$1');
$routes->get('vuelos/show/(:num)', 'AdminVuelos::show/$1');
$routes->post('vuelos/reservar', 'AdminVuelos::guardarReserva');
$routes->post('vuelos/solicitud_update', 'AdminVuelos::updateEstado');
$routes->get('vuelos/listar_solicitudes_vuelos', 'AdminVuelos::listar_solicitudes');
$routes->get('vuelos/getSolicitudDetails/(:num)', 'AdminVuelos::getSolicitudDetails/$1');

// RESERVAS
$routes->get('reservas', 'AdminReservas::reservasView');
$routes->post('reservas/update', 'AdminReservas::update');

// RESERVAR 
// $routes->get('reservar/hotel', '::viewReservar');
$routes->get('reservas/hotel', 'AdminReservaTuristica::listar');
$routes->get('reservas/crear', 'AdminReservaTuristica::viewReservar');
$routes->post('reservas/store', 'AdminReservaTuristica::store');
$routes->post('reservas/actualizarEstado', 'AdminReservaTuristica::actualizarEstado');
$routes->get('reservas/anular/(:num)', 'AdminReservaTuristica::anular/$1');
$routes->get('reservas/generarFactura/(:num)', 'AdminReservaTuristica::generarFactura/$1');


