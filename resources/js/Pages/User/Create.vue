<template>   
    <Layout>        
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
            <div v-if="form.errors.name" class="text-red-600">{{ form.errors.name }}</div><br>
            <div v-if="form.errors.email" class="text-red-600">{{ form.errors.email}}</div><br>          
            <div v-if="status" class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">{{ status }}</div>
            <div v-if="errors" class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">{{ errors }}</div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Username
                </label>
                <input 
                    class="shadow appearance-none border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="name" 
                    type="text" 
                    placeholder="Name"
                    v-model="form.name"
                >
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input 
                    class="shadow appearance-none border border-blue-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" 
                    id="email"  
                    placeholder="Email"
                    v-model="form.email"
                    v-on:keyup="validate"
                >                
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" @submit.prevent="submit">
                    Submit
                </button>
               
            </div>
        </form>
    </Layout>   
</template>
<script>
    import Layout from '@/Pages/Employees/Layout.vue';
    import Fields from '@/Pages/Employees/Fields.vue';
    import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from "@inertiajs/inertia-vue3";
    import { useForm } from "@inertiajs/inertia-vue3";
    import axios from "axios";
    export default {
        components: {
            BreezeAuthenticatedLayout,
            Head,
            Fields,
            Layout,
        },
        setup(props) {
            const form = useForm({
                name: props.user.name,
                email: props.user.email,
                id:props.user.id,
                
            });
            return { form };
        },
        
        props: {
            user:Object,
        },
        data(){
            return {
                errors:false,
                status:false,
            }
        },
        methods: {
            validate(e){
                let self = this;
                axios.post(route('users.validate_email', this.user.id), { email: this.form.email })
                    .then(response =>  self.errors = null)
                    .catch(errors => self.errors = errors.response.data.message)
            },
            submit() {
                let self = this;
                axios.post(route('users.update', this.user.id), { name:this.form.name, email: this.form.email })
                    .then(function (response){
                        self.status = "updated";
                    })
                    .catch(function (error){
                        self.status = "not updated";
                    })
            },
        },
    };
</script>
