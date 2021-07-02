<template>
    <jet-authentication-card>

        
        

        <form @submit.prevent="submit">
            <center><img src="images/logo_fondo_claro.png" width="140"/></center>
            <div>
                <jet-label for="email" value="Correo" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Contraseña" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
            </div>

            <jet-validation-errors class="mb-4 mt-4" />

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>
            
            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Recuérdame</span>
                </label>
                
                <inertia-link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 float-right">
                    Contraseña olvidada?
                </inertia-link>
            </div>

            <br>
            <div class="flex items-center justify-end mt-4 mb-4">
                
                <br>
                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    <center>Aceptar</center>
                </jet-button>
                
            </div>
            No tienes una cuenta?
            <inertia-link v-if="canResetPassword" :href="route('register')" class="mb-3 underline text-sm text-gray-600 hover:text-gray-900 float-right">
                Registrarse
            </inertia-link>
        </form>
    </jet-authentication-card>
</template>


<style scoped>
    a{
        text-decoration:none;
        color:red;
    }
    label{
        float : left;
    }
    button{
        width: 100%;
        margin-left: 0px !important;
    }

</style>
<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>
