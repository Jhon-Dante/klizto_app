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
	                        	

                        		<span>Servicios</span>
	                        	<div class="row justify-content-center">
	                        		<div class="col-md-6">
	                        			<div class="overflow-auto" style="height: 150px;">
	                        				<div class="card-body">
			                        			<div class="card" v-for="service in services" :key="service.id">
			                        				<div @click="SelectService(service,key)">
			                        					<center>{{service.name}}</center>
			                        				</div>
			                        			</div>
	                        				</div>
	                        			</div>
	                        		</div>
	                        		<div class="col-md-6">
	                        			<div class="overflow-auto" style="height: 150px;">
	                        				<div class="card-body">
			                        			<div class="card border border-danger" v-for="service in services_selected" :key="service.id">
			                        				<div @click="removeService(service,key)">
			                        					<center>{{service.name}} <span class="text-danger">x</span></center>
			                        				</div>
			                        			</div>
	                        				</div>
	                        			</div>
	                        		</div>
	                        	</div>
	                        	<center>
	                        		<button class="btn btn-success mt-4" type="submit"> Añadir </button>
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
	.card{
		margin-bottom: 5px !important;
	}
/*	.card-selected{
		display: inherit;
	    padding: 3px;
	    text-align: center;
	    align-self: center;
	}*/
</style>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
    	props: {
		    services: Array,
		    branch: Array,
		},
		data() {
		    return {
		    	services_selected:[],
		    	form: {
		        	name: '',
					last_name: '',
					services_id:[],
					branches_id: this.branch.id,
		      	},
		    };
		},
		methods: {
		    submit() {
		      this.$inertia.post(route('employess.store'), this.form);
		    },
		    SelectService(item,key){
		    	this.services_selected.push(item);
		    	this.form.services_id.push(item.id);

		    	this.services.splice(key,1);
		    },
		    removeService(item,key){
		    	this.services.push(item);
		    	this.services_selected.splice(item,1);
		    	this.form.services_id.splice(key,1);
		    }
	  	},
	  	mounted(){
	  	}
    }
</script>
