<template>
    <div class="container">
        <h2>Scan Tamu</h2>
        <p>Silahkan scan kartu di sini</p>
        <div>
        <b-card no-body>
        <b-tabs pills card>
            <b-tab title="Datang" active>
            <h2>Scan Datang</h2>
            <form @submit.prevent="SaveTamu()">
            <div class="mb-3">
                <label for="data_tamus_id" class="form-label">Pilih Nama</label>
                <select class="form-select form-control" v-model="absensis.data_tamus_id">
                    <option v-for="data_tamu in data_tamus" :key="data_tamu.id" :value="data_tamu.id">{{data_tamu.nama}}</option>
                </select>
            </div>
            <!-- <div class="mb-3">
                <label for="data_tamus_id" class="form-label">No Kartu</label>
                <select class="form-select form-control" v-model="absensis.data_tamus_id">
                    <option v-for="data_tamu in data_tamus" :key="data_tamu.id" :value="data_tamu.id">{{data_tamu.nokartu}}</option>
                </select>
            </div> -->
            <div class="mb-3">
            <label for="keperluan" class="form-label">Keperluan</label>
            <textarea class="form-control" id="keperluan" v-model="absensis.keperluan" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="data_tamus_id" class="form-label">Pilih Ruangan</label>
                <select class="form-select form-control" v-model="absensis.ruangans_id">
                <option v-for="ruangan in ruangans" :key="ruangan.id" :value="ruangan.id">{{ruangan.nama_ruangan}}</option>
                </select>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <div class="mb-3">
                <label for="data_tamus_id" class="form-label">No Kartu</label>
                <select class="form-select form-control" v-model="absensis.data_tamus_id">
                    <option v-for="data_tamu in data_tamus" :key="data_tamu.id" :value="data_tamu.id" disabled>{{data_tamu.nokartu}}</option>
                </select>
                </div>  
                </div>
                <div class="col-sm-6">
                <label for="nokartu" class="form-label">Scan No kartu</label>
                <b-form-input list="my-list-id" v-model="absensis.nokartu"></b-form-input>
                <datalist id="my-list-id">
                    <!-- <option>Manual Option</option> -->
                <option v-for="data_tamu in data_tamus" :key="data_tamu.id">{{data_tamu.nokartu}}</option>
                </datalist>
                </div>
            </div>
            <p>Note : jika data berhasil ditambahkan tetapi no kartu berbeda dari nama pengunjung maka tidak akan terdaftar di database</p>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </b-tab>
            <b-tab title="Pulang">
            <h2>Scan Pulang</h2>
            <table class="table table-bordered table table-hover">
            <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Tamu</th>
            <th scope="col">No Kartu</th>
            <th scope="col">Scan Pulang</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(absensi, index) in absensis" :key="absensi.id">
            <th scope="row">{{index+1}}</th>
            <td>{{absensi.data_tamus.nama}}</td>
            <td>{{absensi.nokartu}}</td>
            <td v-if="absensi.waktu_kepulangan == null">
            <button type="button" class="btn btn-success" @click="editTamu(absensi.id)" data-toggle="modal" data-target="#exampleModal">Scan Tamu Pulang</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Scan Tamu Pulang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form @submit.prevent="UpdateTamu">
                <div class="mb-3">
                <label for="data_tamus_id">User No kartu</label>
                <input type="text" class="form-control" v-model="editdatatamusid" id="data_tamus_id" readonly>
                </div>
                <div class="mb-3">
                <label for="nokartu">Scan No kartu</label>
                <input type="text" class="form-control" v-model="editnokartu" id="nokartu" required>
                </div>
                <button type="submit" class="btn btn-warning">Save changes</button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger w-100" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>
            </td>
            <td v-else>
            {{absensi.waktu_kepulangan}}
            </td>
            </tr>
            </tbody>
            </table>
            </b-tab>
        </b-tabs>
        </b-card>
        </div>
    </div>
</template>

<script>
export default {
data(){
    return{
        ruangans:{},
        data_tamus:{
            nokartu:''
        },
        absensis:{
            tanggal:'',
            nokartu:'',
            keperluan:'',
            waktu_kedatangan:'',
            waktu_kepulangan:'',
            data_tamus_id:'',
            ruangans_id:''
        },
        id: '',
        editdatatamusid : '',
        editnokartu:''
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
    SaveTamu(){
        axios.post('api/absensis',{
            tanggal:this.absensis.tanggal,
            nokartu:this.absensis.nokartu,
            keperluan:this.absensis.keperluan,
            waktu_kedatangan:this.absensis.waktu_kedatangan,
            data_tamus_id:this.absensis.data_tamus_id,
            ruangans_id:this.absensis.ruangans_id,
        })
    if (this.absensis.data_tamus_id == null) {
        alert("help select data guest")
    } 
    if (this.absensis.keperluan == null) {
    alert("please write your necessity")
    } 
    if (this.absensis.ruangans_id == null) {
    alert("help select ruangan")
    } 
    if (this.absensis.nokartu == null) {
    alert("please scan your card")
    }
    else {
    this.absensis.nokartu = "";
    this.absensis.keperluan="";
    this.absensis.data_tamus_id="";
    this.absensis.ruangans_id="";
    alert('data berhasil di tambahkan',window.location.href = "/home#/scantamu")
    }
    },
    editTamu(id){
        // alert(id)
        axios.get('api/absensis/'+id)
        .then(response=>{
            this.id = response.data.id
            this.editdatatamusid = response.data.data_tamus_id;
            // this.editnokartu = response.data.nokartu;
        })
    },
    UpdateTamu(){
        // alert(this.id)
        axios.put('api/absensis/update/',{
            id : this.id,
            nokartu : this.editnokartu,
            data_tamus_id:this.editdatatamusid
        })
        $("#exampleModal").modal("hide")
        alert('selamat jalan dan hati2 di jalan',window.location.assign("/home#/scantamu"))
    }
},
created(){
    this.loadData();
}
}
</script>