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
            <div class="row m-t-25">
                <div class="col-md-12">
                    <div class="card-blank m-b-25">
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
		    user: Array
		  },
        components: {
            AppLayout,
        },
    }
</script>
