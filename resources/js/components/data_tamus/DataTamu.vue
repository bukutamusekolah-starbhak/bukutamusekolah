<template>
<div class="container">
    <h1>Data Tamu</h1>
    <router-link :to="{ name:'createtamu' }" class="btn btn-primary my-3">Tambah Tamu</router-link>
<table class="table table-bordered">
<thead>
    <tr>
    <th scope="col">No</th>
    <th scope="col">Nama</th>
    <th scope="col">No kartu</th>
    <th scope="col">Aksi</th>
    </tr>
</thead>
<tbody>
<tr v-for="(data_tamu, index) in data_tamus" :key="data_tamu.id">
    <td>{{index + 1}}</td>
    <td>{{ data_tamu.nama }}</td>
    <td>{{ data_tamu.nokartu }}</td>
    <td>
        <router-link :to="{name:'edit',params:{id: data_tamu.id}}" class="btn btn-success">Edit</router-link>
        <button @click.prevent="DataTamuDelete(data_tamu.id,index)" class="btn btn-danger">Hapus</button>
    </td>
</tr>
</tbody>
</table>
</div>
</template>

<script>
    export default {
        data() {
            return {
                data_tamus: []
            }
        },
        created() {
            let uri = `http://localhost:8000/api/data_tamus`;
            this.axios.get(uri).then(response => {
                this.data_tamus = response.data.data;
            });
        },
        methods:{
        DataTamuDelete(id,index)
        {
            this.axios.delete(`http://localhost:8000/api/data_tamus/${id}`)
            .then(response => {
                this.data_tamus.splice(index,1);
            })
        }
        }
    }
</script>