<template>
    <app-layout>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Configuración</h2>
                    </div>
                </div>
            </div>
            <div class="row m-t-25">
                <div class="col-md-12">
                    <div class="card-blank m-b-25">
                        <div class="card-header-blank">
                            <span class="card-title" style="font-size: 20px;"><strong>Categorias</strong></span>
                        </div>
                        <div class="card-body">
                            <table class="table datatable">
				              <thead>
				                <tr>
				                  <th>Name</th>
				                  <th>Status</th>
				                  <th>Opciones</th>
					            </tr>
				              </thead>
				              <tbody>
				                <tr v-for="item in categories" :key="item.id">
				                  <td>{{ item.name }}</td>
				                  <td>{{ item.status }}</td>
				                  <td>
				                  </td>
				                </tr>
				              </tbody>
				            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-blank m-b-25">
                        <div class="card-header-blank">
                            <span class="card-title" style="font-size: 20px;"><strong>Usuarios</strong></span>
                        </div>
                        <div class="card-body">
                            <table class="table datatable">
				              <thead>
				                <tr>
				                  <th>Name</th>
				                  <th>Email</th>
				                  <th>Tipo</th>
				                  <th>Status</th>
				                  <th>Opciones</th>
					            </tr>
				              </thead>
				              <tbody>
				                <tr v-for="item in users" :key="item.id">
				                  <td>{{ item.name }}</td>
				                  <td>{{ item.email }}</td>
				                  <td>{{ item.level.name}}</td>
				                  <td>{{ item.status }}</td>
				                  <td>
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
		    subcategories: Array,
		    users: Array
		  },
        components: {
            AppLayout,
        },
    }
</script>
