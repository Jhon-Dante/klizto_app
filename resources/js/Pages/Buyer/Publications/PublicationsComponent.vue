<template>
    <app-layout>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Mis Publicaciones</h2>
                        <div class="float-right">
                            <inertia-link
                                :href="route('publications.create')"
                              >
                                Añadir
                             </inertia-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-t-25">
                <div class="col-md-12">
                    <div class="card-blank">
                        <div class="card-body">
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <tbody>
                                        <tr class="tr-shadow" v-for="item in publications" :key="item.id">
                                            <td>
                                                <img v-bind:src="route('/')+''+item.images[0].url">
                                            </td>
                                            <td>
                                                {{item.title}}
                                                <br>
                                                {{ item.description1 }}
                                                {{ item.description2 }}
                                                {{ item.description3 }}
                                                {{ item.description4 }}
                                            </td>
                                            <td>
                                                {{item.category.name}}
                                                {{item.employess.name}}
                                            </td>
                                            <td>Precio <br> {{item.price}}</td>
                                            <td>Status <br> <button class="btn btn-primary btn-sm text-white">Activo</button></td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                        <i class="zmdi zmdi-mail-send"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <label class="switch switch-default switch-pill switch-success mr-2">
                                                        <input type="checkbox" class="switch-input" checked="true">
                                                        <span class="switch-label"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
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
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        props:{
            publications: Array,
        },
        components: {
            AppLayout,
        },
    }
</script>
