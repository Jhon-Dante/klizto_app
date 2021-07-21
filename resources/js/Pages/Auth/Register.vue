<template>
    <jet-authentication-card>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <center>
                <img src="images/logo_fondo_claro.png" width="140"/>
            </center>
            <div class="row">
                <div class="col-lg-12">
                    <div v-if="form.option == ''">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <center>
                                    <button class="btn btn-primary" @click="changeOption(1)">
                                        Registrarme como cliente
                                    </button> 
                                </center>
                            </div>
                            <div class="col-md-6">
                                <center>
                                    <button class="btn btn-success" @click="changeOption(2)">
                                        Registrarme como negocio
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="card" v-if="form.option == 1">
                        <div class="card-body">
                            <p><strong>Registrarme como cliente</strong></p>
                            <div class="form-group">
                                <jet-label for="name_client" value="Nombre" />
                                <jet-input type="text" name="name_client" class="mt-1 block w-full" v-model="form.name"/>
                            </div>
                            <div class="form-group">
                                <jet-label for="email_client" value="Correo" />
                                <jet-input type="email" name="email_client" class="mt-1 block w-full" v-model="form.email"/>
                            </div>
                            <div class="form-group">
                                <jet-label for="password" value="Contraseña" />
                                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" autocomplete="new-password" />
                            </div>
                            <div class="form-group">
                                <jet-label for="password_confirmation" value="Confirmar Contraseña" />
                                <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" autocomplete="new-password" />
                            </div>
                            <div class="mt-4">
                                <jet-label for="bank_id" value="Banco" />
                                <select class="form-control select2"
                                name="bank_id"
                                v-model="form.bank_id"
                                :disabled="banks > null">
                                    <option :value="bank.id" v-for="bank in banks" :key="bank.id">
                                        {{bank.name}}
                                    </option>
                                </select>
                            </div>
                            <div class="mb-4 mt-4">
                                <jet-label for="count_bank" value="Número de cuenta" />
                                <jet-input type="number" id="count_bank" class="mt-1 block w-full" v-model="form.count_bank" />
                            </div>
                            <div class="float-right mt-4">
                                <jet-button class="btn btn-success text-white" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Registrar
                                </jet-button>
                            </div>
                        </div>
                    </div>
                    <div class="card" v-if="form.option == 2">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">Inicio de sesión</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="logo-tab" data-toggle="tab" href="#logo" role="tab" aria-controls="logo" aria-selected="true">Logo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="basic-tab" data-toggle="tab" href="#basic" role="tab" aria-controls="basic" aria-selected="false">Datos básicos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="banks-tab" data-toggle="tab" href="#banks" role="tab" aria-controls="banks" aria-selected="false">Datos Bancarios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="employed-tab" data-toggle="tab" href="#employed" role="tab" aria-controls="employed" aria-selected="false">Encargado</a>
                                </li>
                            </ul>
                            <div class="tab-content pl-3 p-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                    <div class="mt-4">
                                        <jet-label for="email" value="Email" />
                                        <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                                    </div>



                                    <div class="mt-4">
                                        <jet-label for="password" value="Contraseña" />
                                        <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" autocomplete="new-password" />
                                    </div>

                                    <div class="mt-4">
                                        <jet-label for="password_confirmation" value="Confirmar Contraseña" />
                                        <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" autocomplete="new-password" />
                                    </div>
                                    <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                                        <jet-label for="terms">
                                            <div class="flex items-center">
                                                <jet-checkbox name="terms" id="terms" v-model:checked="form.terms" />

                                                <div class="ml-2">
                                                    I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Políticas de privacidad</a>
                                                </div>
                                            </div>
                                        </jet-label>
                                    </div>
                                    <div class="float-right mt-4">
                                        <a class="btn btn-success text-white" @click="tabClick(2)">Siguiente</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                                    <div>
                                        <jet-label for="name" value="Nombre" />
                                        <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                                    </div>
                                    <div class="mt-4 mb-4">
                                        <center>
                                            <img id="imageSelected" class="shadow mb-5" v-bind:src="ico_img" @click="imageClick" width="300" height="300" onclick="document.getElementById('image').click();"/>

                                            <jet-input style="display: none" id="image" type="file" accept=".png" name="image" @change="imageSelected"/>
                                            <p>Recomendado: Imagen de mismas dimensiones. Ejm: 300x300</p>
                                        </center>
                                    </div>
                                    <div>
                                        <div class="float-left mt-4">
                                            <a class="btn btn-success text-white" @click="tabClick(1)">Anterior</a>
                                        </div>
                                        <div class="float-right mt-4">
                                            <a class="btn btn-success text-white" @click="tabClick(3)">Siguiente</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="basic" role="tabpanel" aria-labelledby="basic-tab">
                                    <div>
                                        <jet-label for="direction" value="Dirección" />
                                        <textarea id="direction" class="form-control mt-1 block w-full" v-model="form.direction" autocomplete="direction" ></textarea>
                                    </div>
                                    <div>
                                        <jet-label for="name" value="Descripción" />
                                        <textarea id="description" class="form-control mt-1 block w-full" v-model="form.description" autocomplete="description" ></textarea>
                                    </div>
                                    <div class="mt-4">
                                        <jet-label for="phone" value="Teléfono" />
                                        <input id="phone" type="number" class="form-control" v-model="form.phone" />
                                    </div>
                                    <div class="float-left mt-4">
                                        <a class="btn btn-success text-white" @click="tabClick(2)">Anterior</a>
                                    </div>
                                    <div class="float-right mt-4">
                                        <a class="btn btn-success text-white" @click="tabClick(4)">Siguiente</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="banks" role="tabpanel" aria-labelledby="banks-tab">
                                    <div class="mt-4">
                                        <jet-label for="bank_id" value="Banco" />
                                        <select class="form-control select2"
                                        name="bank_id"
                                        v-model="form.bank_id"
                                        :disabled="banks > null">
                                            <option :value="bank.id" v-for="bank in banks" :key="bank.id">
                                                {{bank.name}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <jet-label for="count_bank" value="Número de cuenta" />
                                        <input type="number" id="count_bank" class="form-control" v-model="form.count_bank" />
                                    </div>
                                    <div class="float-left mt-4">
                                        <a class="btn btn-success text-white" @click="tabClick(3)">Anterior</a>
                                    </div>
                                    <div class="float-right mt-4">
                                        <a class="btn btn-success text-white" @click="tabClick(5)">Siguiente</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="employed" role="tabpanel" aria-labelledby="employed-tab">
                                    <div>
                                        <jet-label for="name_employed" value="Nombre" />
                                        <jet-input type="text" id="name_employed" class="mt-1 block w-full" v-model="form.name_employed" />
                                    </div>
                                    <div>
                                        <jet-label for="last_name_employed" value="Apellido" />
                                        <jet-input type="text" id="last_name_employed" class="mt-1 block w-full" v-model="form.last_name_employed" />
                                    </div>
                                    <div>
                                        <jet-label for="personal_email" value="Correo(Personal)" />
                                        <jet-input type="text" id="personal_email" class="mt-1 block w-full" v-model="form.personal_email" />
                                    </div>
                                    <div>
                                        <jet-label for="phone_employed" value="Teléfono(Personal)" />
                                        <input type="text" id="phone_employed" class="form-control" v-model="form.phone_employed" />
                                    </div>
                                    <div>
                                        <div class="float-left mt-4">
                                            <a class="btn btn-success text-white" @click="tabClick(4)">Anterior</a>
                                        </div>
                                        <div class="float-right mt-4">
                                            <jet-button class="btn btn-success text-white" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                                Registrar
                                            </jet-button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="items-center mt-4">
                <center>
                    <inertia-link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                        Ya está registrado?
                    </inertia-link>
                </center>
            </div>
        </form>
    </jet-authentication-card>
</template>

<style scoped>
    #imageSelected{
        border-radius: 50%;
        background-color: white;
    }
    .btn{
        border-radius: 20px !important; 
    }
</style>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from "@/Jetstream/Checkbox";
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        el: '#app',
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors
        },
        data() {
            return {
                ico_img: route('/')+'/images/ico-image.png',
                banks:[],
                
                form: this.$inertia.form({
                    option: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    //
                    image: '',
                    name: '',
                    //
                    direction:'',
                    description:'',
                    phone:'',
                    //
                    bank_id:'',
                    count_bank:'',
                    //
                    name_employed: '',
                    last_name_employed: '',
                    personal_email: '',
                    phone_employed: '',
                    terms: false,
                })
            }
        },

        methods: {
            load() {
                axios.get('get/banks')
                .then((res) => {
                    if (res.data.result == true) {
                        this.banks = res.data.banks;
                    }
                })
            },
            changeOption(event){
                this.form.option = event == 1 ? 1 : 2
            },
            imageClick(){
                $('#imageSelected').click();
            },
            tabClick(option){
                if(option == 1) {
                    $('#login-tab').click();
                }else if(option == 2){
                    $('#logo-tab').click();
                }else if(option == 3){
                    $('#basic-tab').click();
                }else if(option == 4){
                    $('#banks-tab').click();
                }else{
                    $('#employed-tab').click();
                }
            },
            imageSelected(e){
                $('.preloader').fadeIn('fast');
                //
                e.preventDefault();
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#imageSelected')
                    .attr('src', e.target.result)
                    .width(300)
                    .height(300);
                };

                reader.readAsDataURL(e.target.files[0]);
                this.form.image = e.target.files[0];
                $('.preloader').fadeOut('fast');
            },
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            },
        },
        mounted() {
            this.load();
        }
    }
</script>
