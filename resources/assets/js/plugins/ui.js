import grid from '../components/common/grid'
import alert from '../components/common/alert'
import card from '../components/common/card'
import toast from '../components/common/toast'
import modal from '../components/common/modal'
import modalView from '../components/common/modalView'

export default {
    install(Vue) {
        Vue.component('grid', grid)
        Vue.component('alert', alert)
        Vue.component('card', card)
        Vue.component('toast', toast)
        Vue.component('modal', modal)
        Vue.component('modal-view', modalView)
        let ui = {
            alert(...args) {
                let modalView = this.getModalView()
                return modalView.alert(...args)
            },
            confirm(...args) {
                let modalView = this.getModalView()
                return modalView.confirm(...args)
            },
            text(...args) {
                let modalView = this.getModalView()
                return modalView.text(...args)
            },
            getModalView() {
                if (!this.modalView) {
                    this._getModalView(window.app)
                    this.modalView.destroyedCallback = () => {
                        this.modalView = undefined
                    }
                }
                return this.modalView
            },
            _getModalView(parent) {
                for (let child of parent.$children) {
                    if (child.$options.name === 'modal-view') {
                        this.modalView = child
                        return
                    }
                    this._getModalView(child)
                }
            }
        }
        ui.__proto__ = new Vue({
            data:{ disabled:false },
            watch:{
                disabled(v){
                    let loadingView = document.getElementById('loading-view')
                    loadingView.style.display = v ? 'flex' : 'none'
                }
            }
        })
        Vue.prototype.$ui = ui
        this.__proto__ = ui
    }
}