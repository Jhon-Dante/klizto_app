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
                        	<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">Usuarios</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="categories-tab" data-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="false">Categorias</a>
								</li>
							</ul>
							<div class="tab-content pl-3 p-1" id="myTabContent">
								<div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
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
								<div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
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
