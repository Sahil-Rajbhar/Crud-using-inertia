<template>    
    <Layout>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center">
                            <thead class="border-b bg-gray-800">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Name
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Email
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Edit
                                    </th>                                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b" >
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ employee.name }}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="mailto:{{ employee.email}}"> {{ employee.email }}</a>
                                    </td>                                                  
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <Link :href="route('employees.edit', employee.id)" method="get" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</Link>
                                    </td>                                                    
                                </tr>      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </Layout>
</template>
<script setup>
    import { Link } from "@inertiajs/inertia-vue3";
</script>
<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import Layout from '@/Pages/Employees/Layout.vue';
    import { Head } from "@inertiajs/inertia-vue3";
    import { useForm } from "@inertiajs/inertia-vue3";
    export default {
        components: {
            BreezeAuthenticatedLayout,
            Head,
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
        },
    };
</script>
