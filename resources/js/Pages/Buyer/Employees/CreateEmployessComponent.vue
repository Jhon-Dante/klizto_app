<template>
    <app-layout>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Crear nuevo negocio</h2>
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
	                        		<label>Edad</label>
	                        		<input id="age" type="date" class="form-control" v-model="form.age" required />
	                        	</div>
	                        	<div class="form-group">
	                        		<label>Descripción</label>
	                        		<textarea id="description" type="number" class="form-control" v-model="form.description" required ></textarea>
	                        	</div>
	                        	<div class="">
	                        		<label>Género</label>
	                        		<div>
									    <input type="radio" id="gender1"
									     name="gender" value="H" v-model="form.gender" class="border-primary" checked>
									    <label for="gender">Hombre</label>

									    <input type="radio" id="gender2"
									     name="gender" value="M" v-model="form.gender" class="border-primary">
									    <label for="gender">Mujer</label>
									</div>
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
					age: '',
					description: '',
					gender: 'H',
					services_id:'',
					branches_id:'',
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
