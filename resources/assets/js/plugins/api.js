export default {
  install(Vue, {axios, config}){   
    let api = {
        get(endpoint) {
            return new Promise((resolve, reject)=> {
                axios.get(config.baseUrl + endpoint).then((response)=>{
                   return resolve(response) 
                }).catch(err =>{
                    reject(err)
                })
            })
        },

        post(endpoint, params) {
            return new Promise((resolve, reject)=> {
                axios.post(config.baseUrl + endpoint, params).then((response)=>{
                   return resolve(response) 
                }).catch(err =>{
                    reject(err)
                })
            })
        }
    }
    Vue.prototype.$api = api 
    this.__proto__ = api 
  }
}