export default {
  install(Vue, {axios, config}){   
    let system = {
        getSettings() {
            return new Promise((resolve, reject)=> {
                axios.get(config.baseUrl + '/setting').then((response)=>{
                   return resolve(response.data.settings) 
                }).catch(err =>{
                    reject(err)
                })
            })
        }
    }
    Vue.prototype.$system = system 
    this.__proto__ = system 
  }
}