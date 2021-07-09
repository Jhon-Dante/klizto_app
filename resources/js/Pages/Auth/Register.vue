<template>
    <jet-authentication-card>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="logo-tab" data-toggle="tab" href="#logo" role="tab" aria-controls="logo" aria-selected="true">Logo</a>
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
                                <li class="nav-item">
                                    <a class="nav-link" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">Inicio de sesión</a>
                                </li>
                            </ul>
                            <div class="tab-content pl-3 p-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                                    <div>
                                        <jet-label for="name" value="Nombre" />
                                        <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                                    </div>
                                    <div class="mt-4 mb-4">
                                        <center>
                                            <img id="imageSelected" class="shadow mb-5" src="#" @click="imageClick" width="300" height="300" />

                                            <jet-input id="image" type="file" accept=".png" name="image" @change="imageSelected" v-model="form.image" required autofocus/>
                                            <p>Recomendado: Imagen de mismas dimensiones. Ejm: 300x300</p>
                                        </center>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="basic" role="tabpanel" aria-labelledby="basic-tab">
                                    <div>
                                        <jet-label for="direction" value="Dirección" />
                                        <textarea id="direction" class="form-control mt-1 block w-full" v-model="form.direction" required autofocus autocomplete="direction" ></textarea>
                                    </div>
                                    <div>
                                        <jet-label for="name" value="Descripción" />
                                        <textarea id="description" class="form-control mt-1 block w-full" v-model="form.description" required autofocus autocomplete="description" ></textarea>
                                    </div>
                                    <div class="mt-4">
                                        <jet-label for="phone" value="Teléfono" />
                                        <jet-input id="phone" type="number" class="mt-1 block w-full" v-model="form.phone" required />
                                    </div>
                                    <div class="mt-4">
                                        <jet-label for="phone" value="Categories" />
                                        <select class="form-control select2"
                                        v-model="form.category_id"
                                        :disabled="categories > null"
                                        @change="getServices"
                                        >
                                            <option :value="category.id" v-for="category in categories" :key="category.id">
                                                {{category.name}}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <jet-label for="phone" value="Servicios" />
                                        <select class="form-control select2"
                                        v-model="form.services_id"
                                        :disabled="services > null">
                                            <option :value="service.id" v-for="service in services" :key="service.id">
                                                {{service.name}}
                                            </option>
                                        </select>
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
                                        <jet-input type="number" id="count_bank" class="mt-1 block w-full" v-model="form.count_bank" required />
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="employed" role="tabpanel" aria-labelledby="employed-tab">
                                    <div>
                                        <jet-label for="name_employed" value="Nombre" />
                                        <jet-input type="text" id="name_employed" class="mt-1 block w-full" v-model="form.name_employed" required />
                                    </div>
                                    <div>
                                        <jet-label for="last_name_employed" value="Apellido" />
                                        <jet-input type="text" id="last_name_employed" class="mt-1 block w-full" v-model="form.last_name_employed" required />
                                    </div>
                                    <div>
                                        <jet-label for="personal_email" value="Correo(Personal)" />
                                        <jet-input type="text" id="personal_email" class="mt-1 block w-full" v-model="form.personal_email" required />
                                    </div>
                                    <div>
                                        <jet-label for="phone_employed" value="Teléfono(Personal)" />
                                        <jet-input type="text" id="phone_employed" class="mt-1 block w-full" v-model="form.phone_employed" required />
                                    </div>
                                    <div class="mt-4">
                                        <jet-label for="password_personal" value="Contraseña" />
                                        <jet-input id="password_personal" type="password" class="mt-1 block w-full" v-model="form.password_personal" required autocomplete="new-password" />
                                    </div>

                                    <div class="mt-4">
                                        <jet-label for="password_confirmation_personal" value="Confirmar Contraseña" />
                                        <jet-input id="password_confirmation_personal" type="password" class="mt-1 block w-full" v-model="form.password_confirmation_personal" required autocomplete="new-password" />
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="login" role="tabpanel" aria-labelledby="login-tab">
                                    <div class="mt-4">
                                        <jet-label for="email" value="Email" />
                                        <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
                                    </div>



                                    <div class="mt-4">
                                        <jet-label for="password" value="Contraseña" />
                                        <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                                    </div>

                                    <div class="mt-4">
                                        <jet-label for="password_confirmation" value="Confirmar Contraseña" />
                                        <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <center>
                <div class="flex items-center justify-end mt-4">
                    <inertia-link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                        Ya está registrado?
                    </inertia-link>

                    <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Registrar
                    </jet-button>
                </div>
            </center>
        </form>
    </jet-authentication-card>
</template>

<style scoped>
    #imageSelected{
        border-radius: 50%;
        background-color: white;
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
        props:['categories','services'],
        data() {
            return {
                categories: [],
                services:[],
                banks:[],
                form: this.$inertia.form({
                    image: null,
                    name: '',
                    direction:'',
                    description:'',
                    email: '',
                    phone:'',
                    bank_id:'',
                    count_bank:'',
                    name_employed: '',
                    last_name_employed: '',
                    personal_email: '',
                    password_personal:'',
                    password_confirmation_personal:'',
                    phone_employed: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                    category_id:'',
                    services_id:'',
                })
            }
        },

        methods: {
            load() {
                axios.get('get/categories')
                .then((res) => {
                    if (res.data.result == true) {
                        this.categories = res.data.categories;
                    }
                });
                axios.get('get/banks')
                .then((res) => {
                    if (res.data.result == true) {
                        this.banks = res.data.banks;
                    }
                })
            },
            getServices() {
                var id_category = this.form.category_id;
                axios.get(`get/services/${id_category}`)
                .then((res) => {
                    if (res.data.result == true) {
                        this.services = res.data.services;
                    }
                })
            },
            imageClick(){
                $('#imageSelected').click();
            },
            imageSelected(event){
                $('.preloader').fadeIn('300');

                console.log(event.target.files[0]);
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#imageSelected')
                    .attr('src', e.target.result)
                    .width(300)
                    .height(300);
                };

                reader.readAsDataURL(event.target.files[0]);
                this.form.image = event.target.files[0].name;
                $('.preloader').fadeOut('slow');
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
