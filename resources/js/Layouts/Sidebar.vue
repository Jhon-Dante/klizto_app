<template>
    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="#">
                <img src="images/logo_fondo_claro.png" alt="Klizto" style="width: 50% !important;" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="active">
                        <inertia-link :href="route('dashboard')">
                            <i class="fa fa-th-large"></i>Dashboard
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link :href="route('account')">
                            <i class="fa fa-dollar"></i>Mi Cuenta
                        </inertia-link>
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
                        <inertia-link :href="route('wallet')">
                            <i class="fa fa-credit-card"></i>Mi Billetera
                        </inertia-link>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>Mis Ventas</a>
                    </li>
                        <li>
                        <inertia-link :href="route('publications')">
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
                        <inertia-link :href="route('settings')">
                            <i class="fa fa-book"></i>Configuración
                        </inertia-link>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->
</template>

<script>
    export default{
        
    }
</script>