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
	                        		<label>Dirección</label>
	                        		<textarea type="text" name="name" v-model="form.direction" class="form-control"></textarea>
	                        	</div>
	                        	<div class="form-group">
	                        		<label>Teléfono</label>
	                        		<input id="phone" type="number" class="form-control" v-model="form.phone" required />
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

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
    	props: {
		    categories: Array,
		},
		data() {
		    return {
		    	form: {
		        	direction: null,
		        	phone: null,
		      	},
		    };
		},
		methods: {
	    submit() {
	      this.$inertia.post(route('premises.store'), this.form);
	    },
	  },
    }
</script>
