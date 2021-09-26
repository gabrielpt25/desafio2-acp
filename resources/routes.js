const Welcome = () => import('./js/components/Welcome.vue' /* webpackChunkName: "resource/js/components/welcome" */)
const UsuarioList = () => import('./js/components/usuario/List.vue' /* webpackChunkName: "resource/js/components/category/list" */)
const UsuarioCreate = () => import('./js/components/usuario/Add.vue' /* webpackChunkName: "resource/js/components/category/add" */)
const UsuarioEdit = () => import('./js/components/usuario/Edit.vue' /* webpackChunkName: "resource/js/components/category/edit" */)

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'usuarioList',
        path: '/usuario',
        component: UsuarioList
    },
    {
        name: 'usuarioEdit',
        path: '/category/:id/edit',
        component: UsuarioEdit
    },
    {
        name: 'usuarioAdd',
        path: '/usuario/add',
        component: UsuarioCreate
    }
]