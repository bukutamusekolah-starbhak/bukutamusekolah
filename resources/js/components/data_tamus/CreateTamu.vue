<template>
    <div class="container">
        <h2>Tambah Tamu</h2>
<form @submit.prevent="DataTamuStore">
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
            data_tamus:{}
        }
    },
    methods:{
        DataTamuStore(){
            let uri = `http://localhost:8000/api/data_tamus/store`;
            this.axios.post(uri,this.data_tamus)
            .then((response)=>{
                this.$router.push({
                    name:'data_tamus'
                });
            })
        }
    }
}
</script>