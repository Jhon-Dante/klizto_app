<template>
    <div>
        <jet-banner />
        <div class="page-wrapper">
            <div class="min-h-screen bg-gray-100">
                <HeaderMobile />
                <Header />
                <Sidebar />
                <div class="page-container">
                    
                    <HeaderDesktop />
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
    import HeaderDesktop from '@/Layouts/HeaderDesktop'

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
            HeaderDesktop,
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
