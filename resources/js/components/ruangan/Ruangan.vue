<template>
<div class="container">
    <h2>Data Ruangan</h2>
    <router-link to="/createruangan" class="btn btn-primary my-3">Create Ruangan</router-link>
    <table class="table table-bordered">
<thead>
    <tr>
    <th scope="col">No</th>
    <th scope="col">Nama Ruangan</th>
    <th scope="col">Aksi</th>
    </tr>
</thead>
<tbody>
<tr v-for="(ruangan, index) in ruangans" :key="ruangan.id">
    <th scope="row">{{index+1}}</th>
    <td>{{ruangan.nama_ruangan}}</td>
    <td>
        <router-link :to="{name: 'editruangan', params: { id: ruangan.id }}" class="btn btn-success">Edit</router-link>
        <button @click="hapusRuangan(ruangan.id)" class="btn btn-danger">Hapus</button>
    </td>
    </tr>
</tbody>
</table>
</div>
</template>

<script>
export default {
    data(){
        return{
            ruangans :{},
        };
    },
    methods:{
        loadData(){
            axios.get('api/ruangans').then(({data}) => (this.ruangans = data));
        },
        hapusRuangan(id){
            axios.delete('api/ruangans/'+id)
            alert("data berhasil di hapus",window.location.href = "/ruangan")
        }
    },
    created(){
        this.loadData();
    }
}
</script>