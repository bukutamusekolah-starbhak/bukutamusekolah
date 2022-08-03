<template>
    <div class="container">
        <h2>Edit Tamu</h2>
<form @submit.prevent="DataTamuUpdate">
<div class="mb-3">
    <label for="nokartu" class="form-label">No Kartu</label>
    <input type="text" class="form-control" v-model="data_tamus.nokartu" id="nokartu">
</div>
<div class="mb-3">
    <label for="nama" class="form-label">Nama Tamu</label>
    <input type="text" class="form-control" v-model="data_tamus.nama" id="nama">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</template>

<script>
export default {
    data(){
        return{
            data_tamus:{},
        }
    },
    created(){
        let uri = `http://localhost:8000/api/data_tamus/${this.$route.params.id}`;
        this.axios.get(uri).then((response)=>{
            this.data_tamus = response.data.data;
        }).catch(function (error) {
            // alert(error);
            window.location.assign("/#/404")
        })
    },
    methods:{
        DataTamuUpdate(){
            let uri =  `http://localhost:8000/api/data_tamus/update/${this.$route.params.id}`;
            this.axios.post(uri,this.data_tamus)
            .then((response)=>{
                this.$router.push({name:'data_tamus'})
            })
        }
    }
}
</script>