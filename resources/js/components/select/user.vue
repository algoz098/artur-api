<template>
<div v-bind="$attrs">
    <multiselect 
        :loading="loading"
        v-model="model"
        track-by="value"
        label="label"
        :options="options"
   />
   <input type="text" name="user_id" :value="inputValue" v-show="false">

</div>
</template>

<script>
import Multiselect from 'vue-multiselect'
    export default {
        components: {
            Multiselect
        },

        props:{
            value: null
        },

        data(){
            return{
                label: 'Usuarios',

                inputValue: '',

                loading: false,

                baseOptions: [
                    {label: '-Select a user-', value: ''},
                ],

                options: [
                    {label: 'Loading...', value: ''},
                ]
            }
        },

        created(){
            this.load()
        },

        methods:{
            async load(){
                this.loading = true

                try {
                    let response = await axios.get('/index.php/admin/web/users/select')

                    this.options = [...this.baseOptions, ...response.data]
                } catch (error) {}

                if(this.value) this.inputValue = this.value

                this.loading = false
            }
        },

        computed:{
            model:{
                get(){
                    if(!this.inputValue) return this.options[0]
                    return this.options.filter(e => e.value == this.inputValue)[0]
                },

                set(e){
                    this.inputValue = e.value
                }
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>