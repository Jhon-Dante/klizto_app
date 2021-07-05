<template>
    <app-layout>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Mis Negocios</h2>
                        <div class="float-right">
                        	<!-- <inertia-link
				                :href="route('premises.create')"
				              >
				                Añadir
				             </inertia-link> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-t-25">
                <div class="col-md-12">
                    <div class="card-blank m-b-25">
                    	<div v-if="premises.lenght" v-for="premise in premises" :key="premise.id">
	                        <div class="card-header-blank">
	                            <span class="card-title" style="font-size: 20px;"><strong>{{premises.name}}</strong></span>
	                        </div>
	                        <div class="card-body">
	                        </div>
                    	</div>
	                    <div v-else>
	                    	<div class="card-header-blank">
		                    	<h4>Sin negocios registrados</h4>
		                    </div>
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
		  },
        components: {
            AppLayout,
        },
    }
</script>
