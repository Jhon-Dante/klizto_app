<template>
    <app-layout>
        <div class="container-fluid">

            <div v-if="$page.props.user.level_id == 4">
                <div class="row">
                    <div class="col-md-12 col-lg-3" v-for="item in publications" :key="item.id">
                        <div class="card rounded border border-success" v-bind:style="{ 
                            backgroundImage: 'url(' + item.images[0].url + ')',
                            'background-repeat': 'no-repeat',
                            'background-position': 'center',
                            'width': '100% !important',
                            'height': '200px' ,
                            'border-radius': '30px !important',
                            'border': '1px solid #4caf50 !important'
                        }">
                            <div class="card-body">
                                <center>
                                    <button class="btn btn-success">{{item.title}} {{item.price}}$</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="row mt-5 mb-5">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Dashboard</h2>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-md-4">
                        <div class="card-blank m-b-25">
                            <div class="card-header-blank">
                                <span class="card-title" style="font-size: 20px;"><strong>Balance</strong></span>
                            </div>
                            <div class="card-body">
                                <h2>$ 0.<span style="color: #007eff">0</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-blank m-b-25">
                            <div class="card-header-blank">
                                <span class="card-title" style="font-size: 20px;"><strong>Ventas Recientes</strong></span>
                            </div>
                            <div class="card-body">
                                <h2>0</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-blank m-b-25">
                            <div class="card-header-blank">
                                <span class="card-title" style="font-size: 20px;"><strong>Nuevas Citas</strong></span>
                            </div>
                            <div class="card-body">
                                <h2>0</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-blank m-b-25">
                            <div class="card-header-blank">
                                <span class="card-title" style="font-size: 20px;"><strong>Últimas Transacciones</strong></span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <tbody>
                                            <tr class="tr-shadow">
                                                <td align="left">
                                                    <label class="au-checkbox">
                                                        <input type="checkbox" checked disabled>
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <h5>Depósito de servicio </h5>18 de Marzo, 2021</td>
                                                <td align="right">-$45</td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td align="left">
                                                    <label class="au-checkbox">
                                                        <input type="checkbox" checked disabled>
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <h5>Depósito de servicio </h5>18 de Marzo, 2021</td>
                                                <td align="right">-$45</td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td align="left">
                                                    <label class="au-checkbox">
                                                        <input type="checkbox" checked disabled>
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <h5>Depósito de servicio </h5>18 de Marzo, 2021</td>
                                                <td align="right">-$45</td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td align="left">
                                                    <label class="au-checkbox">
                                                        <input type="checkbox" checked disabled>
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <h5>Depósito de servicio </h5>18 de Marzo, 2021</td>
                                                <td align="right">-$45</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-blank m-b-25">
                            <div class="card-header-blank">
                                <span class="card-title" style="font-size: 20px;"><strong>Publicaciones Activas</strong></span>
                            </div>
                            <div class="card-body">
                                <div class="table--no-card m-b-30">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td></td>
                                                <td>Tintes</td>
                                                <td align="right">$44</td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td></td>
                                                <td>Secados</td>
                                                <td align="right">$44</td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td></td>
                                                <td>Cirujía</td>
                                                <td align="right">$44</td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td></td>
                                                <td>Manicure</td>
                                                <td align="right">$44</td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td></td>
                                                <td>Illustracion</td>
                                                <td align="right">$44</td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td></td>
                                                <td>Cortes</td>
                                                <td align="right">$44</td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td></td>
                                                <td>Esmaltado</td>
                                                <td align="right">$44</td>
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

<style scoped>
    .btn{
        border-radius: 10px !important;
        margin-top: 120px;
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
                publications:[],
            }
        },
        methods:{
            load(){
                axios.get('get/publications')
                .then((res) => {
                    if (res.data.result == true) {
                        this.publications = res.data.publications;
                        console.log(this.publications);
                    }
                })
            }
        },
        mounted() {
            this.load();
        }
    }
</script>
