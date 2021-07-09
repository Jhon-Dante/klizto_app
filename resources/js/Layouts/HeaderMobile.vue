<template>
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <inertia-link class="logo" :href="route('dashboard')">
                        <img src="images/logo_fondo_claro.png" alt="Klizto" width="120" />
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