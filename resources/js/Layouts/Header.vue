<template>
    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <inertia-link :href="route('dashboard')">
                <img src="images/logo_fondo_claro.png" width="140"/>
            </inertia-link>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="active">
                        <a href="/dashboard">
                            <i class="fa fa-th-large"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-dollar"></i>Mi Cuenta</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fa fa-clipboard"></i>Mi Negocio
                        </a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="#">Servicios</a>
                            </li>
                            <li>
                                <a href="#">Empleados</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="/wallet">
                            <i class="fa fa-credit-card"></i>Mi Billetera</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>Mis Ventas</a>
                    </li>
                        <li>
                        <a href="{{ url('publications') }}">
                            <i class="fa fa-tasks"></i>Mis Publicaciones</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-info-circle"></i>Mis Calificaciones</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-book"></i>Reportes</a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->
</template>
    
<script>
    export default {

    }
</script>