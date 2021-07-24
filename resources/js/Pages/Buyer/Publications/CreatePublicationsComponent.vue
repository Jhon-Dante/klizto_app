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
                <h5><strong>2.- Categorias y servicios</strong></h5>
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select
                            v-model="form.category_id"
                            @change="getServices"
                            style="width: 100% !important"
                            >
                                <option selected disabled>Categorias</option>
                                <option :value="category.id" v-for="category in categories" :key="category.id">
                                    {{category.name}}
                                </option>
                            </select>
                        </div>
                        <ul>
                            <li v-for="category in category_id" :key="category.id">
                                {{ category.name}}
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select
                            v-if="services.length > 0"
                            @change="getBranchesServices"
                            id="selectServices"
                            style="width: 100% !important"
                            >
                                <option selected disabled>Servicios</option>
                                <option :value="category.id" v-for="category in services" :key="category.id">
                                    {{category.name}}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select
                            v-if="branches.length > 0"
                            @change="getEmployeesBranches"
                            id="selectBranch"
                            style="width: 100% !important"
                            >
                                <option selected disabled>Sucursales</option>
                                <option :value="branch.id" v-for="branch in branches" :key="branch.id">
                                    {{branch.direction}}
                                </option>
                            </select>
                    </div>
                    <div class="col-md-3">
                        <div class="border border-success overflow-auto" style="height: 40px;">
                            <div class="card" v-for="item in employess" :key="item.id">
                                <div class="" @click="employeeSelected(item,key)">
                                    {{item.name}} {{item.last_name}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-auto" style="height: 100px;">
                    <div class="card" v-for="item in employessSelected" :key="item.id">
                        <div class="card-body">
                            <div class="row justify-content-center" @click="deleteEmployeeSelected(item,key)">
                                <div class="col-md-4"><span class="btn btn-danger btn-sm rounded">x</span>{{item.name}} {{item.last_name}}</div>
                                <div class="col-md-4">
                                    <ul>
                                        <li v-for="service in item.services" :key="service.id">
                                            <span class="btn btn-danger btn-sm rounded">x</span>{{service.name}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li v-for="branch in item.branches" :key="branch.id">
                                            <span class="btn btn-danger btn-sm rounded">x</span>{{branch.direction}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            	<h5><strong>3.- Título y precio</strong></h5>
            	<div class="row justify-content-left mb-4">
            		<div class="col-md-12">
            			<div class="mb-4">
    	        			Escriba el título principal
    	        			<input type="text" name="title" v-model="form.title">
            			</div>
            		</div>
            		<div class="col-md-5">
            			Precio <input type="number" name="price" v-model="form.price" v-on:keyup="calculateDiscount" >
            		</div>
            		<div class="col-md-6">
            			Recibirás en tu billetera <input type="number" name="discount" :value="discount" disabled>
            		</div>
            	</div>
            	<h5><strong>4.- Descripción</strong></h5>
            	<div class="row justify-content-left mb-4">
            		<div class="col-md-12">
            			<textarea class="ckeditor" id="ckeditor" name="description" v-model="form.description"></textarea>
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
    .card{
        margin-bottom: 0px !important;
        border-radius: 20px !important;
    }

    .btn{
        border-radius: 30% !important;
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
                employessSelected:[],
                branches:[],
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
                    description:'',
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
            getBranchesServices(){

                var service_id = $('#selectServices').val();
                // console.log(service_id)
                var url = route('/')+'/get/branch_services/'+service_id;
                axios.get(url)
                .then((res) => {
                    if (res.data.result == true) {
                        this.branches = res.data.branches;
                    }
                    // console.log(res.data);
                });

                this.form.service_id.push(service_id);
                console.log(this.form.service_id);
            },
            getEmployeesBranches(){
                const branch_id = $('#selectBranch').val();

                var url = route('/')+'/get/employess_branches/'+branch_id;
                axios.get(url)
                .then((res) => {
                    if (res.data.result == true) {
                        this.employess = res.data.employess;
                    }
                    // console.log(res.data);
                });
            },
            employeeSelected(item, key){
                this.employessSelected.push(item);
                this.form.employee_id.push(item.id);

                this.employess.splice(key,1);
            },
            deleteEmployeeSelected(item, key){
                this.employess.push(item);

                this.employessSelected.splice(item,1);
                this.form.employee_id.splice(key,1);
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
