<template>
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
                                <span>0.00$</span>
                            </div>
                            <div class="noti__item js-item-menu">
                                <i class="zmdi zmdi-notifications"></i>
                                <!-- <span class="quantity"></span> -->
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
                                <div class="image" v-if="$page.props.user.profile_photo_path">
                                    <img v-bind:src="route('/')+'/public/images/users/'+$page.props.user.profile_photo_path" alt="Logo" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{ $page.props.user.name }}
                                    </a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image" v-if="$page.props.user.profile_photo_path">
                                            <a href="#">
                                                <img v-bind:src="route('/')+'/public/images/users/'+$page.props.user.profile_photo_path" alt="Logo" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{ $page.props.user.name }}</a>
                                            </h5>
                                            <span class="email">{{ $page.props.user.email }}</span>
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
</template>

<script>
	export default {
        computed: {
          user() {
            return this.$page.props.auth.user
          }
        },
        data() {
            return {
                showingNavigationDropdown: false,
            }
        },
        methods: {
            logout() {
                this.$inertia.post(route('logout'));
            },
        },
        mounted(){
            // console.log(user);
        }
	}
</script>