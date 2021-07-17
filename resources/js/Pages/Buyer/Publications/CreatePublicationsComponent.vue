<template>
    <app-layout>
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Crear Publicación</h2>
                    </div>
                </div>
            </div>
            <form @submit.prevent="submit">
            	<h5><strong>1.- Agrega fotos del producto</strong></h5>
            	<div class="row justify-content-center mt-5">
            		<div class="col-lg-2">
                        <img id="imageSelected" class="shadow mb-5" src="#" @click="imageClick"/>
                        <input type="file" id="selectedFile" accept=".png" style="display: none;" @change="imageSelected"/>
                        <button type="button" class="btn btn-primary" onclick="document.getElementById('selectedFile').click();" >Seleccionar</button>
            		</div>
            		<div class="col-lg-2">
                        <input type="file" id="selectedFile2" style="display: none;" @change="imageSelected"/>
                        <button type="button" class="btn btn-success" onclick="document.getElementById('selectedFile2').click();" disabled>Seleccionar</button>      
                    </div>
            		<div class="col-lg-2">
                        <input type="file" id="selectedFile3" style="display: none;" @change="imageSelected"/>
                        <button type="button" class="btn btn-success" onclick="document.getElementById('selectedFile3').click();" disabled>Seleccionar</button>      
                    </div>
            		<div class="col-lg-2">
                        <input type="file" id="selectedFile4" style="display: none;" @change="imageSelected"/>
                        <button type="button" class="btn btn-success" onclick="document.getElementById('selectedFile4').click();" disabled>Seleccionar</button>      
                    </div>
            		<div class="col-lg-2">
                        <input type="file" id="selectedFile5" style="display: none;" @change="imageSelected"/>
                        <button type="button" class="btn btn-success" onclick="document.getElementById('selectedFile5').click();" disabled>Seleccionar</button>      
                    </div>
            	</div>
                <br />
                <br />
            	<div class="row justify-content-left mb-5">
            		<div class="col-md-12">
            			Horarios de Atención desde
            			<input type="time" name="" class="border-success" v-model="form.date_ac_start"> A <input type="time" name="" class="border-success" v-model="form.date_ac_end">
            		</div>
            	</div>
            	<h5><strong>2.- Título y precio</strong></h5>
                <div class="row mb-4">
                    <div class="col-md-4">
                        Categories
                        <select
                        v-model="form.category_id"
                        @change="getServices"
                        >
                            <option :value="category.id" v-for="category in categories" :key="category.id">
                                {{category.name}}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        Servicios
                        <select
                        v-model="form.service_id"
                        @change="getServiceEmployees"
                        >
                            <option :value="category.id" v-for="category in services" :key="category.id">
                                {{category.name}}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        Empleados
                        <select
                        v-model="form.employee_id"
                        >
                            <option :value="employee.id" v-for="employee in employess" :key="employee.id">
                                {{employee.name}}
                            </option>
                        </select>
                    </div>
                </div>
            	<div class="row justify-content-left mb-4">
            		<div class="col-md-12">
            			<div class="mb-4">
    	        			Escriba el título principal
    	        			<input type="text" name="title" v-model="form.title">
            			</div>
            		</div>
            		<div class="col-md-4">
            			Precio <input type="number" name="price" v-model="form.price">
            		</div>
            		<div class="col-md-4">
            			Recibirás en tu billetera <input type="number" name="discount" v-model="form.discount" disabled>
            		</div>
            	</div>
            	<h5><strong>3.- Descripción y Condiciones</strong></h5>
            	<div class="row justify-content-left mb-4">
    	        	<div class="col-md-2">
    	        		Escriba el título principal
            		</div>
            		<div class="col-md-4">
            			<input type="text" name="title" class="form-control mb-2" v-model="form.description1">
            			<input type="text" name="title" class="form-control" v-model="form.description2">
            		</div>
            		<div class="col-md-2">
            			Escriba el título principal
            		</div>
            		<div class="col-md-4">
            			<input type="text" name="title" class="form-control mb-2" v-model="form.description3">
            			<input type="text" name="title" class="form-control" v-model="form.description4">
            		</div>
                    <center>
                        <button class="btn btn-success" type="submit"> Añadir </button>
                    </center>
            	</div>
            </form>
        </div>
    </app-layout>
</template>
<style scoped>
	input, select{
		border-radius:15px;
		border-color: #28a745!important;
	}
</style>
<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
        data(){
        	return{
        		categories:[],
                services:[],
                employess:[],

        		form: this.$inertia.form({
                    //
                    img:'',
                    //
                    date_ac_start:'',
                    date_ac_end:'',
                    title:'',
                    //
        			category_id: '',
                    service_id: '',
                    employee_id:'',
                    title: '',
                    price:'',
                    discount:'',
                    //
                    description1:'',
                    description2:'',
                    description3:'',
                    description4:'',
                })
        	}
        },
        methods:{
        	load() {
        		var url = window.location.origin+'/get/categories';
                axios.get(url)
                .then((res) => {
                    if (res.data.result == true) {
                        this.categories = res.data.categories;
                    }
                })
            },
            getServices() {
                var id_category = this.form.category_id;
                var url = window.location.origin+'/get/services/'+id_category;

                axios.get(url)
                .then((res) => {
                    if (res.data.result == true) {
                        this.services = res.data.services;
                    }
                })
            },

            getServiceEmployees(){
                var service_id = this.form.service_id;
                var url = window.location.origin+'/get/ServiceEmployees/'+service_id;

                axios.get(url)
                .then((res) => {
                    if (res.data.result == true) {
                        this.employess = res.data.employess;
                    }
                    console.log(res.data);
                })
            },
            imageSelected(e){
                //
                console.log(e);
                e.preventDefault();
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#imageSelected')
                    .attr('src', e.target.result)
                    .css('width','100%')
                    .css('height','100%');
                };

                reader.readAsDataURL(e.target.files[0]);
                this.form.img = e.target.files[0];
            },
            submit() {
              this.$inertia.post(route('publications.store'), this.form);
            },
        },
        mounted(){
        	this.load();
        }

    }
</script>
