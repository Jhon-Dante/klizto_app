<template>
    <app-layout>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Mi cuenta</h2>
                    </div>
                </div>
            </div>
            <h3 class="mb-4 mt-4">{{ user.name }}</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-blank">
                    	<div class="card-body">
                    		<center>
                    			<img v-bind:src="'/storage/'+$page.props.user.profile_photo_path" class="img-user shadow" style="width: 300px !important; border-radius: 50%;" />
                    		</center>
                    		<hr>
                    		<div class="row">
                    			<div class="col-md-6">
		                    		<label>Saldo disponible</label>
		                    			<h3>$ 0<span style="color:green">.00</span></h3>
									<br>                    			
		                    		<label>Puntuación</label>
		                    			<h3>0/5</h3>
		                    	</div>
		                    	<div class="col-md-6">
		                    		<label>Negocios/Sucursales</label>
		                    			<h3>{{ branches.length }} </h3>
		                    		<br> 
		                    		<label>Trabajos realizados</label>
		                    			<h3>0</h3>
                    			</div>
                    		</div>

                    	</div>
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="card-blank">
                		<div class="card-body">
		                    <div class="form-group">
		                    	<label>Nombre</label>
		                    	<input type="text" v-model="user.name" class="form-control" name="name" placeholder="Nombre">
		                    </div>
		                    <div class="form-group">
		                    	<label>Email</label>
		                    	<input type="text" class="form-control" name="email" placeholder="Nombre">
		                    </div>
		                    <div class="form-group">
		                    	<label>Contraseña nueva</label>
		                    	<input type="password" class="form-control" name="new_password" placeholder="Nombre">
		                    </div>
		                    <div class="form-group">
		                    	<label>Confirmar Contraseña</label>
		                    	<input type="password" class="form-control" name="new_password" placeholder="Nombre">
		                    </div>
		                    <br>
		                	<button class="btn btn-primary" disabled>Guardar</button>
		                </div>
	                </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card-blank">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Datos Bancarios</strong>
                                    <br>
                                    {{ premises.bank.name }}
                                    <br>
                                    {{ premises.count_bank }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                 <div class="col-md-4">
                    <div class="card-blank">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Servicios</strong>
                                    <br>
                                    {{ premises.services.name }}
                                    <br>
                                    {{ premises.services.category.name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-4">
                    <div class="card-blank">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Encargado</strong>
                                    <br>
                                    {{ premises.owner.name }}
                                    {{ premises.owner.last_name }}
                                    <br>
                                    {{ premises.owner.phone }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                	<div class="card-blank">
                    	<div class="card-body">
                    		<div class="float-left">
                    			<button class="btn btn-danger">Suspender Cuenta</button>
                    		</div>
                    		<div class="float-right">
                    			<button class="btn btn-danger">Eliminar Cuenta</button>
                    		</div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<style scoped>
	.img-user{
		width: 100px !important;
	}
</style>
<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
    	props: {
		    user: Array,
            branches: Array,
            premises:Array,
		  },
        components: {
            AppLayout,
        },
    }
</script>
