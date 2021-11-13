<template>
<div class="container">
<h2>Create Ruangan</h2>
<form @submit.prevent="saveRuangan()">
<div class="mb-3">
<label for="nama_ruangan" class="form-label">Nama Ruangan</label>
<input type="text" class="form-control" v-model="nama_ruangan" id="nama_ruangan">
</div>
<button type="submit" class="btn btn-primary" @click.prevent="saveRuangan">Submit</button>
</form>
</div>
</template>

<script>
export default {
    data(){
        return{
            nama_ruangan : ''
        }
    },
    methods : {
    saveRuangan(){
    // alert(this.nama_ruangan)
    axios.post('api/ruangans',{
        nama_ruangan:this.nama_ruangan,
    })
    if (this.nama_ruangan == '') {
        alert('tolong masukan nama ruangan terlebih dahulu   ',window.location.href = "/createruangan")
    }else{
    alert(this.nama_ruangan,window.location.href = "/home#/ruangan")
    this.nama_ruangan = "";
    }
    }
}
}
</script>