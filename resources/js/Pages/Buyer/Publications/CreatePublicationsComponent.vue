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
            		<div class="col-md-2 col-lg-2">
                        <div class="card text-center" style="border-style: dashed; width: 150px; height: 150px;" onclick="document.getElementById('selectedFile1').click();">
                            <img v-bind:src="ico_img" id="imageSelected1" style="width: 50px; height: 50px;" />
                        </div>
                        <input type="file" id="selectedFile1" accept=".png" style="display: none;" @change="imageSelected($event, 1)"/>
            		</div>
            		<div class="col-md-2 col-lg-2">
                        <div class="card text-center" style="border-style: dashed; width: 150px; height: 150px;" onclick="document.getElementById('selectedFile2').click();">
                            <img v-bind:src="ico_img" id="imageSelected2" style="width: 50px; height: 50px;" />
                        </div>
                        <input type="file" id="selectedFile2" accept=".png" style="display: none;" @change="imageSelected($event, 2)"/>
                    </div>
            		<div class="col-md-2 col-lg-2">
                        <div class="card text-center" style="border-style: dashed; width: 150px; height: 150px;" onclick="document.getElementById('selectedFile3').click();">
                            <img v-bind:src="ico_img" id="imageSelected3" style="width: 50px; height: 50px;" />
                        </div>
                        <input type="file" id="selectedFile3" accept=".png" style="display: none;" @change="imageSelected($event, 3)"/>   
                    </div>
            		<div class="col-md-2 col-lg-2">
                        <div class="card text-center" style="border-style: dashed; width: 150px; height: 150px;" onclick="document.getElementById('selectedFile4').click();">
                            <img v-bind:src="ico_img" id="imageSelected4" style="width: 50px; height: 50px;" />
                        </div>
                        <input type="file" id="selectedFile4" accept=".png" style="display: none;" @change="imageSelected($event, 4)"/>   
                    </div>
            		<div class="col-md-2 col-lg-2">
                        <div class="card text-center" style="border-style: dashed; width: 150px; height: 150px;" onclick="document.getElementById('selectedFile5').click();">
                            <img v-bind:src="ico_img" id="imageSelected5" style="width: 50px; height: 50px;" />
                        </div>
                        <input type="file" id="selectedFile5" accept=".png" style="display: none;" @change="imageSelected($event, 5)"/>
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
                <div class="row mb-4">
                    <div class="col-md-4">
                        Categories
                        <select
                        v-model="form.category_id"
                        @change="getServices"
                        >
                            <option selected disabled>Seleccione</option>
                            <option :value="category.id" v-for="category in categories" :key="category.id">
                                {{category.name}}
                            </option>
                        </select>
                        <br>
                        <ul>
                            <li v-for="category in category_id" :key="category.id">
                                {{ category.name}}
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        Servicios
                        <select
                        @change="getServiceEmployees"
                        id="selectServices"
                        >
                            <option selected disabled>Seleccione</option>
                            <option :value="category.id" v-for="category in services" :key="category.id">
                                {{category.name}}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        Empleados
                        <select
                        @change="EmployeeSelected"
                        id="selectEmployees"
                        >
                            <option selected disabled>Seleccione</option>
                            <option :value="employee.id" v-for="employee in employess" :key="employee.id">
                                {{employee.name}}
                            </option>
                        </select>
                    </div>
                </div>
            	<h5><strong>2.- Título y precio</strong></h5>
            	<div class="row justify-content-left mb-4">
            		<div class="col-md-12">
            			<div class="mb-4">
    	        			Escriba el título principal
    	        			<input type="text" name="title" v-model="form.title">
            			</div>
            		</div>
            		<div class="col-md-4">
            			Precio <input type="number" name="price" v-model="form.price" v-on:keyup="calculateDiscount" >
            		</div>
            		<div class="col-md-4">
            			Recibirás en tu billetera <input type="number" name="discount" :value="discount" disabled>
            		</div>
            	</div>
            	<h5><strong>3.- Descripción y Condiciones</strong></h5>
            	<div class="row justify-content-left mb-4">
    	        	<div class="col-md-4">
    	        		Descripción
            		</div>
            		<div class="col-md-4">
            			<input type="text" name="title" class="form-control mb-2" v-model="form.description1">
            			<input type="text" name="title" class="form-control" v-model="form.description2">
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
        props:{
            categories: Array,
        },
        data(){
        	return{
                ico_img: route('/')+'/images/ico-image.png',
        		// categories:[],
                services:[],
                employess:[],
                porcentage: 15,
                discount:0,

        		form: this.$inertia.form({
                    //
                    img:[],
                    //
                    date_ac_start:'',
                    date_ac_end:'',
                    title:'',
                    //
        			category_id: '',
                    service_id:[],
                    employee_id:[],
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
        	// load() {
        	// 	var url = route('/')+'/get/categories';
         //        axios.get(url)
         //        .then((res) => {
         //            if (res.data.result == true) {
         //                this.categories = res.data.categories;
         //            }
         //        })
         //    },
            getServices() {
                var id_category = this.form.category_id;
                var url = route('/')+'/get/services/'+id_category;

                axios.get(url)
                .then((res) => {
                    if (res.data.result == true) {
                        this.services = res.data.services;
                    }
                })
            },

            getServiceEmployees(){

                var service_id = $('#selectServices').val();
                // console.log(service_id)
                var url = route('/')+'/get/ServiceEmployees/'+service_id;
                axios.get(url)
                .then((res) => {
                    if (res.data.result == true) {
                        this.employess = res.data.employess;
                    }
                    // console.log(res.data);
                });

                this.form.service_id.push(service_id);
                console.log(this.form.service_id);
            },
            EmployeeSelected(){
                var employee_id = $('#selectEmployees').val();
                this.form.employee_id.push(employee_id);
                // console.log(this.form.employee_id);
            },
            imageSelected(e,o){
                //
                e.preventDefault();
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#imageSelected'+o)
                    .attr('src', e.target.result)
                    .css('width','100%')
                    .css('height','100%');
                };

                var selectedFiles = e.target.files;
                for (let i = 0; i < selectedFiles.length; i++) {
                    let img = {
                        src: URL.createObjectURL(selectedFiles[i]),
                        file: selectedFiles[i],
                    }
                    this.form.img.push(e.target.files[i]);
                }
                reader.readAsDataURL(e.target.files[0]);
                // this.form.img = e.target.files[0];
                console.log(this.form.img);
            },
            calculateDiscount(){
                // var monto= 
               var monto = this.form.price * (this.porcentage / 100);

               this.discount = this.form.price - monto;
            },
            submit() {
              this.$inertia.post(route('publications.store'), this.form);
            },
        },
        mounted(){
            // console.log(this.categories);
        	// this.load();
        }

    }
</script>
