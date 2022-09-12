<template>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Name
        </label>
        <input 
            :value="name" 
            class="shadow appearance-none border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="name" 
            type="text" 
            @input="$emit('update:name', $event.target.value)"
            placeholder="Name"
        >
        <br>
        <br>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Email
        </label>
        <input :value="email" 
            class="shadow appearance-none border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="Email" 
            type="text"
            v-on:keyup="validateEmail"
            @input="$emit('update:email', $event.target.value)" 
            placeholder="Email"
        >
        <br>
        {{ error }}
        <br>
        <div class="flex items-center justify-between">
            <Link :href="route('employees.index')"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel</Link>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Submit
            </button>
        </div>
    </div>   
</template>
<script setup>
    import { Link } from "@inertiajs/inertia-vue3";
</script>
<script>
    export default {
        props: {
            name: {
                type: String,
                default: ''
            },
            email: {
                type: [String, Number],
                default: ''
            }
        },
        data() {
            return {
                error:null
            }
        },
        methods: {
            validateEmail(e) {      
                let self = this                
                axios.post(route('employees.validate_email'), { email: this.email })
                    .then(response =>  self.error = null )
                    .catch(errors => self.error = errors.response.data.message)
            },
        },
};
</script>
