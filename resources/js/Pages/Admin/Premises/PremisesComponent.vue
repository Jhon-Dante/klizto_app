<template>
    <app-layout>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Mis Negocios</h2>
                        <div class="float-right">
                        	<inertia-link
				                :href="route('premises.create')"
				              >
				                Añadir
				             </inertia-link>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-blank">
                        <div class="card-body">
                            <h3>Sucursales</h3>
                            <table class="table dataTable">
                                <thead>
                                    <tr>
                                        
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in branches" :key="item.id">
                                        <td>{{ item.direction }}</td>
                                        <td>{{ item.phone }}</td>
                                        <td>
                                            <span v-if="item.principal == 1">
                                                <strong style="color: green">Principal</strong>
                                            </span>
                                             <span v-else>Sucursal</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
    	props: {
		    categories: Array,
		    premises: Array,
            branches: Array,
		  },
        components: {
            AppLayout,
        },
    }
</script>
