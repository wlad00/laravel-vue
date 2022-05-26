<template>
    <div>
        <CreateComponent></CreateComponent>
        <IndexComponent ref="index"></IndexComponent>


    </div>
</template>






<script>
    // import axios from 'axios';
    import CreateComponent from "./CreateComponent";
    import IndexComponent from "./IndexComponent"

    export default {
        name: "PostComponent1",

        data(){
            return {

                persons: null

            }
        },
        methods:{
           getPosts(){

               /*axios.get(/'posts')
                   .then(function(data){
                       console.log(data);
                   });*/

               /*axios.get('/api/persons')
                   .then(res=>this.persons = res.data);*/
           }
        },
        mounted(){

            this.getPosts();
        },
        computed: {

        },
        components: {
            CreateComponent,
            IndexComponent
        }
    }
</script>

<style scoped>

</style>