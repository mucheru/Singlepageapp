import Flash from './components/Flash.vue';
import Employee from './components/Employee.vue';

export const routes=[
    
        {
            name: 'Flash',
            path: '/userlist',
            component: Flash
        },
        {
            name: 'Employee',
            path: '/get_employeelist',
            component: Employee
        },
    

    
]