<template>   
    <Layout>        
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit"> 
            <!-- <div v-if="errors.createEmployee" class="text-red-600">{{ errors.createEmployee.name }}</div><br>
            <div v-if="errors.createEmployee" class="text-red-600">{{ errors.createEmployee.email }}</div><br> -->
            <div v-if="form.errors.name" class="text-red-600">{{ form.errors.name }}</div><br>
            <div v-if="form.errors.email" class="text-red-600">{{ form.errors.email}}</div><br>
            <Fields 
                v-model:name="form.name"
                v-model:email="form.email"                
            />
        </form>
    </Layout>   
</template>
<script>
    import Layout from '@/Pages/Employees/Layout.vue';
    import Fields from '@/Pages/Employees/Fields.vue';
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head } from "@inertiajs/inertia-vue3";
    import { useForm } from "@inertiajs/inertia-vue3";
    import axios from "axios";
    export default {
        name: 'create',
        components: {
            BreezeAuthenticatedLayout,
            Head,
            Fields,
            Layout,
        },
        setup() {
            const form = useForm({
                name: null,
                email: null,
                
            });

            return { form };
        },
        
        props: ['errors'],
        data(){
            return {
                errors:null
            }
        },
        methods: {
            submit() {
                this.form.post(route("employees.store"));
            },
        },
    };
</script>
