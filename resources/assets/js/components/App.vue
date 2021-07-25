<template>
  <div>
    
    
   <router-view :key="$route.fullPath"></router-view>
    <footer-view :settings.sync="settings"></footer-view>
  </div>
</template>
<script>
import FooterView from "./layout/footerview";
import HeaderView from "./layout/headerview";
export default {
  data() {
    return {
      settings: [],
      room_type: ""
    };
  },
  components: { FooterView, HeaderView },
  mounted() {}
};
</script>

<style lang="scss">
.loading {
    background: rgba(0,0,0,0.4);
    position: fixed;
    width: 100vw;
    height: 100vh;
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 1080;
}
</style>

 
