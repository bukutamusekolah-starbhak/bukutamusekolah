<template>
    <div class="container">
        <h2>Dashboard Petugas</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
        <div class="card h-100">
            <div class="card-body">
            <h2>{{data_tamus.length}}</h2>
            <!-- <p>{{data_tamus.length}}</p> -->
            <h5 class="card-title">Data Tamu</h5>
            </div>
        </div>
        </div>
        <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <h2>{{ruangans.length}}</h2>
            <h5 class="card-title">Ruangan</h5>
            </div>
        </div>
        </div>
        <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <h2>{{absensis.length}}</h2>
            <h5 class="card-title">jumlah tamu hadir</h5>
            </div>
        </div>
        </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-sm-6">
            <p style="text-align: center;">
            <iframe src="https://jam.jadwalsholat.org/digitalclock/" class="w-100" style="height:70px;"></iframe>
            <iframe src="https://www.jadwalsholat.org/jadwal-sholat/monthly.php?id=67" style="height:300px;width:100%;"></iframe>
            </p>
            </div>
            <div class="col-sm-6 bg-dark text-white" style="height:375px;">
            <h3 class="pt-2 pb-2">Website ini di buat dengan :</h3>
            <div class="row">
            <div class="col-md-12 text-center pb-2 pt-2">
            <i class="fab fa-laravel red fa-4x"></i>
            <p class="text-danger">Laravel</p>
            <i class="fab fa-vuejs green fa-4x"></i>
            <p class="text-success">Vue Js</p>
            <i class="fab fa-bootstrap purple fa-4x"></i>
            <p style="color:#9561e2;">Boostrap 5</p>
            </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
import datePicker from 'vue-bootstrap-datetimepicker';
import 'bootstrap/dist/css/bootstrap.css';
import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';
import VueClock from '@dangvanthanh/vue-clock';
export default {
    components: { VueClock },
data(){
    return{
        date: new Date(),
        options: {
            format: 'DD/MM/YYYY',
            useCurrent: false       
        },
        ruangans:{},
        data_tamus:{},
        absensis:{},
    }
},
methods:{
    loadData(){
    let uri = `http://localhost:8000/api/data_tamus`;
    this.axios.get(uri).then(response => {
        this.data_tamus = response.data.data;
    });
    axios.get('api/ruangans').then(({data}) => (this.ruangans = data));
    axios.get('api/absensis').then(({data}) => (this.absensis = data));
    },
},
created(){
    this.loadData();
}
}
</script>