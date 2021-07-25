

import {
    LocalStorage as ls
} from '../storage'

const globalStore = {
    namespaced: true,
    state: {
        isLoggedIn: ls.get('isLoggedIn') || false,
        token: ls.get('token') || false,
        userData: ls.get('userData') || {},
        classCapacity: ls.get('classCapacity') || false,
        classRemaining: ls.get('classRemaining') || false,
    },
    mutations: {
        setUserToken(state, token) {
            ls.set('token', token)
            state.selectedLang = token
        },
        setIsLoggedIn(state, value) {
            ls.set('isLoggedIn', value)
            state.isLoggedIn = value
        },
        setUserData(state, user) {
            ls.set('userData', user)
            state.userData = user
        },
        setClassCapacity(state, value) {
            ls.set('classCapacity', value)
            state.classCapacity = value
        },
        setClassRemaining(state, value) {
            ls.set('classRemaining', value)
            state.classRemaining = value
        }
    },
    actions: {
        userLoginData (context, loginData) {
            context.commit('setUserToken', loginData.data.token)
            context.commit('setUserData', loginData.data.user)
            context.commit('setIsLoggedIn', true)
            context.commit('setClassCapacity', loginData.data.capacity)
            context.commit('setClassRemaining', loginData.data.remaining)
        },

        fbLoginData (context, loginData) {
            context.commit('setUserToken', loginData.data.token)
            context.commit('setUserData', loginData.data.user)
            context.commit('setIsLoggedIn', true)
            context.commit('setClassCapacity', loginData.data.capacity)
            context.commit('setClassRemaining', loginData.data.remaining)
        },
        logout(context) {
            context.commit('setUserToken', false)
            context.commit('setUserData', false)
            context.commit('setIsLoggedIn', false)
            context.commit('setClassCapacity', false)
            context.commit('setClassRemaining', false)
        }
    },
    getters: {}
}

export default globalStore
