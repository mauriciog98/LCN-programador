import AllStudents from './components/AllStudents.vue';
import AddStudent from './components/AddStudent.vue';
import EditStudent from './components/EditStudent.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllStudents
    },
    {
        name: 'add',
        path: '/add',
        component: AddStudent
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditStudent
    }
];
