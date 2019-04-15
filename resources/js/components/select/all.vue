<template>
<input type="checkbox" id="select-all" class="prevent-submit" v-model="checked" @input="input" >
</template>

<script>
    export default {

        data(){
            return{
                checked: false,
                checking: false,

                watcherId: []
            }
        },

        mounted(){
            let els = document.querySelectorAll('table input[type=checkbox]:not(#select-all)')
            
            els.forEach(e => {
                e.addEventListener('change', this.changeCheckbox)
            })

            this.checkAll()
        },

        beforeDestroy(){
            let els = document.querySelectorAll('table input[type=checkbox]:not(#select-all)')
            
            els.forEach(e => {
                e.removeEventListener('change', this.changeCheckbox)
            })
        },

        methods:{
            changeCheckbox(e){
                if(this.checking) return
                
                if(!e.target.checked) {
                    this.checked = false
                    return
                }

                this.checkAll()
            },

            checkAll(){
                let els = document.querySelectorAll('table input[type=checkbox]:not(#select-all):not(:checked)')
                if(!els.length) this.checked = true
            },

            input(){
                let els = document.querySelectorAll('table input[type=checkbox]')
                
                this.checking = true
                
                els.forEach(e => {
                    e.checked = !this.checked
                })

                this.checking = false
            }
        },
    }
</script>
