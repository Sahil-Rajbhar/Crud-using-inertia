<template>
    <Layout>
        <div v-if="$page.props.flash.message" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            <span class="font-medium">
               <center>{{ $page.props.flash.message }}</center> 
            </span>
        </div>    
        <Link :href="route('employees.create')" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Add Employee</Link>
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
                                        View
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Edit
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(employee,i) in employees" :key=i class="bg-white border-b" >
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ employee.name }}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="mailto:{{ employee.email}}"> {{ employee.email }}</a>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <Link :href="route('employees.show', employee.id)" method="get" class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">View</Link>           
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <Link :href="route('employees.edit', employee.id)" method="get" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</Link>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <Link @click="destroy(employee.id)" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Delete</Link>
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
<script>
    import Layout from '@/Pages/Employees/Layout.vue';
    import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
    import { Head } from "@inertiajs/inertia-vue3";
    import { Link } from "@inertiajs/inertia-vue3";
    import Swal from 'sweetalert2';
    export default {  
        components: {
            BreezeAuthenticatedLayout,
            Head,
            Link,
            Layout,
        },
        props: {
            employees: Object,
        },        
        methods: {
            destroy(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        this.$inertia.delete(route("employees.destroy", id));
                        }
                    })
            },
        },
    };
</script>

    