import Vue from 'vue';
import VueRouter from 'vue-router'
import {store} from '../vuex/store'

Vue.use(VueRouter);

const ifNotAuthenticated = (to, from, next) => {
    if (!store.getters.isAuthenticated) {
        next();
        return
    }
    next('/dashboard')
}

const ifAuthenticated = (to, from, next) => {
    if (store.getters.isAuthenticated) {
        next();
        return
    }
    next('/')
}
 



import FrontLayout from './../components/layout/frontlayout'
import AdminLayout from './../components/layout/layout'
import HomePage from './../components/home/index'
import fashionLifestyle from './../components/category/fashionLifestyle'
import beautyWellness from './../components/category/beautyWellness'
import foodBeverages from './../components/category/foodBeverages'
import Login from './../components/auth/login'
import Register from './../components/auth/register'
import Products from './../components/product/product'
import ProductDetails from './../components/product/productdetails'

const routes = [
    {
        path: '/',
        name: 'home',
        component: HomePage,
        beforeEnter: ifNotAuthenticated,
    }, 
	
    
	{
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            requiresAuth: false,
            hideForAuth: true,
        }
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            requiresAuth: false,
            hideForAuth: true,
        }
    },
    {
        path: '/fashion-lifestyle',
        name: 'fashion_lifestyle',
        component: fashionLifestyle,
        meta: {
            requiresAuth: false,
            hideForAuth: true,
        }
    },
    {
        path: '/beauty-wellness',
        name: 'beauty_wellness',
        component: beautyWellness,
        meta: {
            requiresAuth: false,
            hideForAuth: true,
        }
    },
    {
        path: '/food-beverages',
        name: 'food_beverages',
        component: foodBeverages,
        meta: {
            requiresAuth: false,
            hideForAuth: true,
        }
    },
    {
        path: '/products',
        name: 'products',
        component: Products,
        meta: {
            requiresAuth: false,
            hideForAuth: true,
        }
    },
    {
        path: '/productdetails/:id',
        name: 'productdetails',
        component: ProductDetails,
        meta: {
            requiresAuth: false,
            hideForAuth: true,
        },
        props: route => {
            return {
                id: route.params.id,
            }
        }
    },
    {
        path: '/*',
        name: 'error',
        component: Error,
        beforeEnter: ifNotAuthenticated,
    },
];




export const router = new VueRouter({
    mode: 'history',
    routes,
    scrollBehavior (to, from, savedPosition) {
     if (savedPosition) {
     return savedPosition
     } else {
    return { x: 0, y: 0, behavior: 'smooth' }
     }
    }
    
});

