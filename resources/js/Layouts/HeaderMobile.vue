<template>
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <inertia-link class="logo" :href="route('dashboard')">
                        <img v-bind:src="'/storage/user/'+$page.props.user.profile_photo_path" alt="Logo" width="120" />
                    </inertia-link>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="active">
                        <inertia-link
                            :href="route('dashboard')">
                            <i class="fa fa-th-large"></i>Dashboard
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link
                            :href="route('account.index')">
                            <i class="fa fa-dollar"></i>Mi Cuenta
                        </inertia-link>
                    </li>
                    <li class="has-sub">
                        <inertia-link
                            :href="route('premises.index')">
                            <i class="fa fa-clipboard"></i>Mi Negocio
                        </inertia-link>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="#">Servicios</a>
                            </li>
                            <li>
                                <a href="#">Empleados</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>Mis Ventas</a>
                    </li>
                    <li>
                        <inertia-link
                            :href="route('dashboard')">
                            <i class="fa fa-tasks"></i>Mis Publicaciones
                        </inertia-link>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-info-circle"></i>Mis Calificaciones</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-book"></i>Reportes</a>
                    </li>
                    <li>
                        <inertia-link
                            :href="route('settings')">
                            <i class="fa fa-cogs"></i>Configuración
                        </inertia-link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->
</template>
    
<script>
    export default {

    }
</script>