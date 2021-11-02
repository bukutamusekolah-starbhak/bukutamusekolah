<template>
    <div class="container">
        <h2>Dashboard Admin</h2>
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
    </div>
</template>

<script>
export default {
data(){
    return{
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