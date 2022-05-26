<template>
    <div>

                <tr :class="this.$parent.isEdit(person.id)?'':'d-none'">
                    <th scope="row">{{person.id}}</th>
                    <td><input v-model="name" type="text" class="form-control"></td>
                    <td><input  v-model="age" type="number" class="form-control"></td>
                    <td><input  v-model="job" type="text" class="form-control"></td>

                    <td><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-success">Update</a></td>
                    <td><a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">Delete</a></td>
                </tr>

    </div>
</template>






<script>
    import axios from 'axios';



    export default {

        name: "EditComponent",

        props:[

            'person'
        ],

        data(){
            return {

                name:'',
                age:null,
                job:'',

            }
        },
        mounted(){

        },
        methods:{

            updatePerson(id){

                axios.patch(`/api/people/${id}`, {name:this.name,age:this.age,job:this.job})
                    .then(res => {
                        console.log(res.data);
                        this.$parent.getPeople();
                    });
                this.$parent.editPersonId = null;
            }

        }


    }
</script>

<style scoped>

</style>