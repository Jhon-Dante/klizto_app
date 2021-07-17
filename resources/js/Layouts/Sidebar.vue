<template>
    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <inertia-link
                :href="route('dashboard')">
                <center>
                    <img v-bind:src="img_logo" alt="Klizto" style="width: 50% !important;" />
                </center>
            </inertia-link>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
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
                            :href="route('publications.index')">
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
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->
</template>

<script>
    export default{
        data(){
            return{
                img_logo: 'images/logo_fondo_claro.png'
            }
        }
    }
</script>