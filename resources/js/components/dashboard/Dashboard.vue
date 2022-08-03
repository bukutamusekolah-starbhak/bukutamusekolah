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
            <iframe src="https://jam.jadwalsholat.org/digitalclock/" class="w-100" style="height:70px; border: 1px solid #ddd;"></iframe>
            <iframe id="iframe" title="prayerWidget" class="widget-m-top" style=" height: 300px; width:100%; border: 1px solid #ddd;" src="https://www.islamicfinder.org/prayer-widget/6605829/shafi/11/0/20.0/18.0"></iframe>
            </p>
            </div>
            <div class="col-sm-6">
                <iframe src="https://ourworldindata.org/grapher/total-cases-covid-19?tab=map" width="100%" style="border:none;" height="376px"></iframe>
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