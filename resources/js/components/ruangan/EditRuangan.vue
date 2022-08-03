<template>
<div class="container">
    <h2>Edit Ruangan</h2>
<form @submit.prevent="UpdateRuangan">
<div class="mb-3">
<label for="nama_ruangan" class="form-label">Nama Ruangan</label>
<input type="text" class="form-control" v-model="ruangans.nama_ruangan" id="nama_ruangan">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</template>

<script>
export default {
    data(){
        return{
            ruangans:{}
        }
    },
    created(){
        // let u = `http://localhost:8000/api/ruangans/${this.$route.params.id}`;
        this.axios.get(`http://localhost:8000/api/ruangans/${this.$route.params.id}`).then((response)=>{
            this.ruangans = response.data.data;
        }).catch(function (error) {
            // alert(error);
            window.location.assign("/#/404")
        })
    },
    methods:{
        UpdateRuangan(){
            let uri =  `http://localhost:8000/api/ruangans/update/${this.$route.params.id}`;
            this.axios.put(uri,this.ruangans)
            .then((response)=>{
                this.$router.push({name:'ruangan'})
            // window.location.href = "/home#/ruangan"
            })
        }
    }
}
</script>