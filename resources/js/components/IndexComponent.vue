<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="people in peoples">
                <tr :class="isEdit(people.id) ? 'd-none' : ''">
                    <th scope="row">{{people.id}}</th>
                    <td>{{people.name}}</td>
                    <td>{{people.age}}</td>
                    <td>{{people.job}}</td>
                    <td><a href="#" @click.prevent="changeEditPersonId(people)" class="btn btn-success">Edit</a></td>
                    <td><a href="#" @click.prevent="deletePerson(people.id)" class="btn btn-danger">Delete</a></td>
                </tr>
                <tr :class="isEdit(people.id)?'':'d-none'">
                    <th scope="row">{{people.id}}</th>
                    <td><input v-model="name" type="text" class="form-control"></td>
                    <td><input  v-model="age" type="number" class="form-control"></td>
                    <td><input  v-model="job" type="text" class="form-control"></td>

                    <td><a href="#" @click.prevent="updatePerson(people.id)" class="btn btn-success">Update</a></td>
                    <td><a href="#" @click.prevent="deletePerson(people.id)" class="btn btn-danger">Delete</a></td>
                </tr>
            </template>


            </tbody>
        </table>
    </div>
</template>






<script>
    import axios from 'axios';
    // import EditComponent from './EditComponent';


    export default {

        name: "IndexComponent",


        data(){
            return {
                peoples: null,
                editPersonId: null,
                name:'',
                age:null,
                job:'',

            }
        },
        mounted(){
          this.getPeople();
        },
        methods:{
            getPeople: function () {
                axios.get('/api/people')
                    .then(res => {
                        console.log(res.data);
                        this.peoples = res.data;
                    });
            },
            changeEditPersonId(person){

                // console.log(this.$refs);

                this.name = person.name;
                this.job = person.job;
                this.age = person.age;
                this.editPersonId = person.id;

            },
            isEdit(id){
                return this.editPersonId === id;
            },
            updatePerson(id){

                axios.patch(`/api/people/${id}`, {name:this.name,age:this.age,job:this.job})
                    .then(res => {
                        console.log(res.data);
                        this.getPeople();
                    });
                this.editPersonId = null;
            },
            deletePerson(id){
                axios.delete(`/api/people/${id}`)
                    .then(res => {
                        console.log(res.data);
                        this.getPeople();
                    });

            }

        },
        components:{
            // EditComponent
        }


    }
</script>

<style scoped>

</style>