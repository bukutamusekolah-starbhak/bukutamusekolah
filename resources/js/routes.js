import DataTamu from './components/data_tamus/DataTamu.vue';
import CreateTamu from './components/data_tamus/CreateTamu.vue';
import EditTamu from './components/data_tamus/Edit.vue';
import Ruangan from './components/ruangan/Ruangan.vue';
import CreateRuangan from './components/ruangan/CreateRuangan.vue';
import EditRuangan from './components/ruangan/EditRuangan.vue';
import ScanTamu from './components/scantamu/ScanTamu.vue';
import RekapTamu from './components/rekaptamu/RekapTamu.vue';

// export const routes = [
//     {path:'/data_tamus',component:require('./components/data_tamus/DataTamu.vue').default},
//     {path:'/ruangan',component:require('./components/ruangan/Ruangan.vue').default},
//     {path:'/createruangan',component:require('./components/ruangan/CreateRuangan.vue').default},
//     {name: 'ruanganedit',path:'/ruangans/:id',component:require('./components/ruangan/EditRuangan.vue').default}
// ]

export const routes = [
{
    name:'data_tamus',
    path:'/data_tamus',
    component: DataTamu
},
{
    name:'createtamu',
    path:'/createtamu',
    component:CreateTamu
},
{
    name:'edit',
    path:'/edit/:id',
    component:EditTamu
},
{
    name:'ruangan',
    path:'/ruangan',
    component:Ruangan
},
{
    name:'createruangan',
    path:'/createruangan',
    component:CreateRuangan
},
{
    name: 'editruangan',
    path: '/ruangan/:id',
    component:EditRuangan
},
{
    name:'scantamu',
    path:'/scantamu',
    component:ScanTamu
},
{
    name:'rekaptamu',
    path:'/rekaptamu',
    component:RekapTamu
}
]