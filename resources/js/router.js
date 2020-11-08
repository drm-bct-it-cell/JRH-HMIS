import Vue from 'vue';
import router from 'vue-router';
Vue.use(router);
import appointment from './components/pages/appointment';
//import mainapp from './components/mainapp';
import doctorpage from './components/pages/doctorPage';


const routes = [
    {
        path:'/make-appointment',
        component:appointment,
        name:'appointmentPage',
    },
    {
        path:'/doctor-page',
        name : 'doctorDetailsPage',
        component:doctorpage,
    }

];

export default new router({
    mode:'history',
    routes
});