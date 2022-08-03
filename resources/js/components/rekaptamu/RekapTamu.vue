<template>
    <div class="container">
        <h2>Rekap tamu</h2>
        <p>Data tamu yang berkunjung ke smk taruna bhakti depok</p>
        <div class="row">
            <div class="col-sm-6">
                <div class="alert alert-danger">Tidak Valid : data yang tidak sesuai nama dan kartu nya</div>
            </div>
            <div class="col-sm-6">
                <div class="alert alert-success">Valid : data yang sah / cocok dengan nama dan juga no kartunya</div>
            </div>
        </div>
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
    <th scope="col">Keterangan</th>
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
    <button class="btn btn-danger">belum pulang</button>
    </td>
    <td v-else>{{absensi.waktu_kepulangan}}</td>
    <td v-if="absensi.keterangan_kartu == 'VALID'" class="text-success text-capitalize">valid</td>
    <td v-else class="text-danger text-capitalize">tidak valid</td>
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