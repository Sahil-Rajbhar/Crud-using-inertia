<template>   
    <Layout>
        <center>Update employee data</center>
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
            <!-- <div v-if="errors.UpdateEmployee" class="text-red-600">{{ errors.UpdateEmployee.name }}</div><br>                                                                                                
            <div v-if="errors.UpdateEmployee" class="text-red-600" id="email-error">{{ errors.UpdateEmployee.email }}</div><br> -->
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
    export default {
        components: {
            BreezeAuthenticatedLayout,
            Head,
            Fields,
            Layout,
        },
        setup(props) {
            const form = useForm({
                name: props.employee.name,
                email: props.employee.email,
            });
    
            return { form };
        },        
        props: {
            employee: Object,
            // errors:Array,
        },
        data(){
            return {
                error: null
            }
        },
        methods: {
            submit() {
                this.form.put(route("employees.update", this.employee.id));
            },
        },
    };
</script>
