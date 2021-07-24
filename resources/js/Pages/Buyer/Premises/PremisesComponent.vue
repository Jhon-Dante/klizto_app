<template>
    <app-layout>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Mis Negocios</h2>
                        <div class="float-right">
                        	<inertia-link
				                :href="route('premises.create')"
				              >
				                Añadir
				             </inertia-link>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-blank">
                        <div class="card-body">
                            <h3>Sucursales</h3>
                            <table class="table dataTable">
                                <thead>
                                    <tr>
                                        
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in branches" :key="item.id">
                                        <td>{{ item.direction }}</td>
                                        <td>{{ item.phone }}</td>
                                        <td>
                                            <span v-if="item.principal == 1">
                                                <strong style="color: green">Principal</strong>
                                            </span>
                                             <span v-else>Sucursal</span>
                                        </td>
                                        <td align="center">
                                            <div class="table-data-feature">
                                                <button @click="ShowEmployees(item)" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Empleados">
                                                    <i class="zmdi zmdi-accounts-list"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <jet-dialog-modal :show="showEmployess" @close="closeModal">
            <template #title>
            </template>

            <template #content>

                <div class="mt-4">
                    {{this.formModal.direction}}
                    <div v-for="item in this.formModal.employees" :key="item.id">
                        <div class="card shadow rounded border-success">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">{{item.name}}<br />{{item.last_name}}</div>
                                    <div class="col-md-6">
                                        <ul>
                                            <li v-for="service in item.services" :key="service.id">
                                                {{ service.name }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="this.formModal.employees == null">
                        <h3>Esta sucursal no tiene empleados registrados</h3>
                    </div>
                    <inertia-link
                        :href="route('employess.create')"
                        method="get"
                        :data="{ branch_id: this.branch_id }"
                      >
                        Agregar
                     </inertia-link>
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click="closeModal">
                    Cancel
                </jet-secondary-button>

            </template>
        </jet-dialog-modal>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetDialogModal from '@/Jetstream/DialogModal'
    import JetInput from '@/Jetstream/Input'
    import JetButton from '@/Jetstream/Button'

    export default {
    	props: {
		    categories: Array,
		    premises: Array,
            branches: Array,
		  },
        components: {
            AppLayout,
            JetDialogModal,
            JetInput,
            JetButton,
        },
        data(){
            return {
                showEmployess: false,
                editBranch: false,
                deleteBranch:false,
                form:{
                    password: '',
                    error: '',
                },
                formModal:{
                },
                branch_id:'',
            }
        },
        methods:{
            ShowEmployees(item){
                this.formModal = '';
                this.showEmployess = true;
                this.branch_id = item.id;
                if(item.employees.length > 0){
                    this.formModal = item;
                }
            },
            closeModal() {
                this.showEmployess = false;
                this.form.password = '';
                this.form.error = '';
            },
        }
    }
</script>
