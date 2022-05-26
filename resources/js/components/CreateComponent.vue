<template>
    <div class="w-25">

            <div class="mb-3">
                <input type="text" class="form-control" v-model="name"  placeholder="name"  >
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" v-model="age"  placeholder="age"  >
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" v-model="job"  placeholder="job"  >
            </div>
            <div class="mb-3">
                <input type="submit" @click.prevent="addPerson" class="btn btn-primary" value="Add" >
            </div>



    </div>
</template>






<script>


    export default {
        name: "CreateComponent",


        data(){
            return {
                name: null,
                job: null,
                age: null
            }
        },
        methods:{

            addPerson(){
                axios.post('/api/people',{name:this.name,job:this.job,age:this.age})
                    .then(res=>{
                        this.name= null;
                        this.job= null;
                        this.age= null;

                        this.$parent.$refs.index.getPeople();
                    })
            }

        }


    }
</script>

<style scoped>

</style>