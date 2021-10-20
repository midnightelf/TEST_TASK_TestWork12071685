import {createRouter, createWebHistory} from 'vue-router'

const routes = [
    {path: '/', redirect: {name: 'index'}},
    {
        path: '/todo',
        name: 'index',
        component: () => import('../views/Home'),
    },
    {
        path: '/todo/:id',
        name: 'show',
        component: () => import('../views/Todo'),
    },
    {
        path: '/todo/create',
        name: 'create',
        component: () => import('../views/TodoCreate'),
    },
    {
        path: '/todo/:id',
        name: 'edit',
        component: () => import('../views/TodoEdit'),
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('../views/Login'),
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
