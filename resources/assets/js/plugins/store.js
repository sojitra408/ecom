import store from '../store'

export default {
    install(Vue) {
        for (let namespace in store.state) {
            let computed = this.createComputed(Vue, store, namespace)
            store[namespace] = new Vue({computed})
        }
        Vue.prototype.$store = store
        this.__proto__ = store
    },
    createComputed(Vue, store, namespace) {
        let computed = {}
        let items = store.state[namespace]
        for (let item in items) {
            let foundAction, setter = null
            for (let key in store._actions) {
                let [actionNamespace, actionName] = key.split('/')
                if(actionNamespace == namespace) {
                    if(actionName == 'set' + item.charAt(0).toUpperCase() + item.slice(1)) {
                        foundAction = actionName
                        break
                    }
                }
            }
            if(foundAction)
                setter = function(...args) {
                    store.dispatch(namespace + '/' + foundAction, ...args)
                }
            else
                setter = function(...args) {
                    store.commit(namespace + '/set' + item.charAt(0).toUpperCase() + item.slice(1), ...args)
                }
            computed[item] = {
                get() {
                    return store.state[namespace][item]
                },
                set: setter
            }
        }
        return computed
    }
}
