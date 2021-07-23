<template>
    <app-layout>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Vincular Nuevo Empleado</h2>
                        <div class="float-right">
                        	<inertia-link
				                :href="route('premises.index')"
				              >
				                Volver
				             </inertia-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-t-25">
                <div class="col-md-12">
                    <div class="card-blank">
                    	<form @submit.prevent="submit">
	                        <div class="card-body">
	                        	<div class="form-group">
	                        		<label>Nombre</label>
	                        		<input type="text" name="name" v-model="form.name" class="form-control" />
	                        	</div>
	                        	<div class="form-group">
	                        		<label>Apellido</label>
	                        		<input id="last_name" type="text" class="form-control" v-model="form.last_name" required />
	                        	</div>
	                        	
	                        	<div class="form-group">
	                        		<label>Servicio</label>
	                        		<select class="form-control select2"
	                                name="services_id"
	                                v-model="form.services_id">
	                                    <option :value="service.id" v-for="service in services" :key="service.id">
	                                        {{service.name}}
	                                    </option>
                                	</select>
	                        	</div>
	                        	<div class="form-group">
	                        		<label>Sucursal</label>
	                        		<select class="form-control select2"
	                                name="premises_id"
	                                v-model="form.branches_id">
	                                    <option :value="branch.id" v-for="branch in branches" :key="branch.id">
	                                        {{branch.direction}} - {{branch.phone}}
	                                    </option>
                                	</select>
	                        	</div>
	                        	<center>
	                        		<button class="btn btn-success" type="submit"> Añadir </button>
	                        	</center>
	                        </div>
	                    </form>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<style scoped>

</style>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
    	props: {
		    services: Array,
		    branches: Array,
		},
		data() {
		    return {
		    	form: {
		        	name: '',
					last_name: '',
					services_id:[],
					branches_id:[],
		      	},
		    };
		},
		methods: {
		    submit() {
		      this.$inertia.post(route('employess.store'), this.form);
		    },
	  	},
    }
</script>
