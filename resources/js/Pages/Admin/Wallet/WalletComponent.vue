<template>
    <app-layout>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Mi Billetera</h2>
                        <div class="float-rigt p-3">
                            <button class="au-btn au-btn-icon au-btn--primary au-btn--small rounded">
                                <i class="fa fa-print"></i>Imprimir
                            </button>
                            <button class="au-btn btn-primary au-btn-icon au-btn--primary au-btn--small rounded">
                                <i class="fa fa-download"></i>Descargar
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-t-25">
                <div class="col-md-4">
                    <div class="card-blank">
                        <div class="card-header-blank">
                            <span class="card-title" style="font-size: 20px;"><strong>Balance</strong></span>
                        </div>
                        <div class="card-body">
                            <h2>$ 1301.<span class="text-success">23</span></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-t-25">
                <div class="col-md-12">
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                        </div>
                        <div class="table-data__tool-right">
                            <div class="rs-select2--light rs-select2--md">
                                <input type="text" class="form-control" name="search" placeholder="Buscar">
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <select class="js-select2" name="time">
                                    <option selected="selected">Tipo</option>
                                    <option value="">Tipo 1</option>
                                    <option value="">Tipo 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <select class="js-select2" name="time">
                                    <option selected="selected">Status</option>
                                    <option value="">Procesado</option>
                                    <option value="">Es Espera</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <button class="au-btn btn-primary au-btn-icon au-btn--primary au-btn--small rounded">
                                Buscar
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>
                                        
                                            <input type="checkbox">
                                            
                                    </th>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Concepto</th>
                                    <th>Tipo</th>
                                    <th>status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-shadow">
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>ABC-01</td>
                                    <td>22 Junio 2021</td>
                                    <td>Concepto 1</td>
                                    <td class="desc">Tipo 1</td>
                                    <td>
                                        <span class="status--process">Processed</span>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                <tr class="tr-shadow">
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>ABC-02</td>
                                    <td>22 Junio 2021</td>
                                    <td>Concepto 2</td>
                                    <td class="desc">Tipo 2</td>
                                    <td>
                                        <span class="status--process">Processed</span>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                <tr class="tr-shadow">
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>ABC-03</td>
                                    <td>22 Junio 2021</td>
                                    <td>Concepto 3</td>
                                    <td class="desc">Tipo 3</td>
                                    <td>
                                        <span class="status--process">Processed</span>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                <tr class="tr-shadow">
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>ABC-04</td>
                                    <td>22 Junio 2021</td>
                                    <td>Concepto 4</td>
                                    <td class="desc">Tipo 4</td>
                                    <td>
                                        <span class="status--process">Processed</span>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
    }
</script>
