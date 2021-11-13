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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.0746162947407!2d106.86784151476996!3d-6.3843711953803695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ebaff005f277%3A0x9fcd41028665eea8!2sSMK%20Taruna%20Bhakti%20Depok!5e0!3m2!1sid!2sid!4v1636446534221!5m2!1sid!2sid" class="w-100 h-100" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-sm-6 bg-dark pb-3 pt-3 text-white">
            <h3>Calendar : </h3>
            <date-picker v-model="date" :config="options"></date-picker>
            <h3>Jam Hari ini : </h3>
            <vue-clock />
            <h3>Website ini di buat dengan :</h3>
            <div class="row">
            <div class="col-md-4 text-center">
                <i class="fab fa-laravel red fa-3x"></i>
                <strong class="text-danger">Laravel</strong>
            </div>
            <div class="col-md-4">
                <i class="fab fa-vuejs green fa-3x"></i>
                <strong class="text-success">Vue Js</strong>
            </div>
            <div class="col-md-4">
                <i class="fab fa-bootstrap purple fa-3x"></i>
                <strong style="color:#9561e2;">Boostrap 5</strong>
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