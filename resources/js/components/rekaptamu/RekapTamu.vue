<template>
    <div class="container">
        <h2>Rekap tamu</h2>
        <p>Data tamu yang berkunjung ke smk taruna bhakti depok</p>

<table class="table table-hover table table-bordered">
<thead>
    <tr>
    <th scope="col">No</th>
    <th scope="col">Tanggal</th>
    <th scope="col">Nama Tamu</th>
    <th scope="col">Keperluan</th>
    <th scope="col">Tujuan Ruangan</th>
    <th scope="col">Waktu Kedatangan</th>
    <th scope="col">Waktu Kepulangan</th>
    </tr>
</thead>
<tbody>
<tr v-for="(absensi, index) in absensis" :key="absensi.id">
    <th scope="row">{{index+1}}</th>
    <td>{{absensi.tanggal}}</td>
    <td>{{absensi.data_tamus.nama}}</td>
    <td>{{absensi.keperluan}}</td>
    <td>{{absensi.ruangans.nama_ruangan}}</td>
    <td>{{absensi.waktu_kedatangan}}</td>
    <td v-if="absensi.waktu_kepulangan == null">
    <button class="btn btn-danger">di area LS</button>
    </td>
    <td v-else>{{absensi.waktu_kepulangan}}</td>
</tr>
</tbody>
</table>
</div>
</template>

<script>
export default {
    data(){
        return{
            absensis :{},
        };
    },
    methods:{
    loadData(){
    axios.get('api/absensis').then(({data}) => (this.absensis = data));
        }
    },
    created(){
        this.loadData();
    }
}
</script>