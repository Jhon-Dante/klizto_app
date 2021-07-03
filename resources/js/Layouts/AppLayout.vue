<template>
    <div>
        <jet-banner />
        <div class="page-wrapper">
            <div class="min-h-screen bg-gray-100">
                <HeaderMobile />
                <Header />
                <Sidebar />
                <div class="page-container">
                    <!-- HEADER DESKTOP-->
                    <header class="header-desktop">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                <div class="header-wrap">
                                    <div class="search_header">
                                        <form class="form-header" action="" method="POST">
                                            <input class="au-input au-input--xl" type="text" name="search" placeholder="Buscar" />
                                            <button class="au-btn--submit" type="submit">
                                                <i class="zmdi zmdi-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="header-button">
                                        <div class="noti-wrap">
                                            <div class="noti__item js-item-menu">
                                                <i class="zmdi zmdi-notifications"></i>
                                                <span class="quantity"></span>
                                                <div class="notifi-dropdown js-dropdown">
                                                    <div class="notifi__title">
                                                        <p>You have 3 Notifications</p>
                                                    </div>
                                                    <div class="notifi__item">
                                                        <div class="bg-c1 img-cir img-40">
                                                            <i class="zmdi zmdi-email-open"></i>
                                                        </div>
                                                        <div class="content">
                                                            <p>You got a email notification</p>
                                                            <span class="date">April 12, 2018 06:50</span>
                                                        </div>
                                                    </div>
                                                    <div class="notifi__item">
                                                        <div class="bg-c2 img-cir img-40">
                                                            <i class="zmdi zmdi-account-box"></i>
                                                        </div>
                                                        <div class="content">
                                                            <p>Your account has been blocked</p>
                                                            <span class="date">April 12, 2018 06:50</span>
                                                        </div>
                                                    </div>
                                                    <div class="notifi__item">
                                                        <div class="bg-c3 img-cir img-40">
                                                            <i class="zmdi zmdi-file-text"></i>
                                                        </div>
                                                        <div class="content">
                                                            <p>You got a new file</p>
                                                            <span class="date">April 12, 2018 06:50</span>
                                                        </div>
                                                    </div>
                                                    <div class="notifi__footer">
                                                        <a href="#">All notifications</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="account-wrap">
                                            <div class="account-item clearfix js-item-menu">
                                                <div class="image">
                                                    <img src="app_home/images/icon/avatar-01.jpg" alt="John Doe" />
                                                </div>
                                                <div class="content">
                                                    <a class="js-acc-btn" href="#">john doe
                                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div class="account-dropdown js-dropdown">
                                                    <div class="info clearfix">
                                                        <div class="image">
                                                            <a href="#">
                                                                <img src="app_home/images/icon/avatar-01.jpg" alt="John Doe" />
                                                            </a>
                                                        </div>
                                                        <div class="content">
                                                            <h5 class="name">
                                                                <a href="#">john doe</a>
                                                            </h5>
                                                            <span class="email">johndoe@example.com</span>
                                                        </div>
                                                    </div>
                                                    <div class="account-dropdown__footer">
                                                        <el-button @click="logout">
                                                            <i class="zmdi zmdi-power"></i>Cerrar Sesión
                                                        </el-button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- END HEADER DESKTOP-->
                    
                    <!-- Page Content -->
                    <div class="main-content">
                        <div class="section__content section__content--p30">
                            <main>
                                <slot></slot>
                            </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    
</style>

<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
    import Sidebar from '@/Layouts/Sidebar'
    import Header from '@/Layouts/Header'
    import HeaderMobile from '@/Layouts/HeaderMobile'

    export default {
        components: {
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
            Sidebar,
            Header,
            HeaderMobile,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
