
<template>
<div>
    <header-view :settings.sync="settings"></header-view>
   <!-- ======= SIGN IN Section ======= -->
  <section class="signin_hero d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row d-flex justify-content-end" data-aos="fade-up" data-aos-delay="150">
        <div class="col-lg-5 col-xs-12">
          <div class="formBox text-left">
            <h1>Sign in</h1>
            <form method="POST" v-on:submit.prevent="login">
            <label>Enter Email / Moble Number</label>
            <input v-model="email" type="text" class="form-control" name="" placeholder="99999 88888">
            <label>Password</label>
            <input v-model="password" type="text" class="form-control" name="" placeholder="">
            <button type="submit" class="login_button">Login via OTP</button>
            <span class="login_using">Login using Password</span>
            </form>
            <span class="or_login">or Login via</span>
            <div class="row buttonArea">
              <div class="col-lg-6 col-xs-6">
                <a href="#" class="socialButton"><img src="/front/assets/img/google.png"> Google</a>
              </div>
              <div class="col-lg-6 col-xs-6">
                <a href="#" class="socialButton"><img src="/front/assets/img/facebook.png"> Google</a>
              </div>
            </div>
            <div class="create_account">
              New to This or That? <a href="/register">Create an account</a>
            </div>
          </div>
        </div>
      </div>

      

    </div>
  </section><!-- End SIGN IN -->
    </div>
</template>

<script>
import HeaderView from "../layout/headerview";
    export default {
        data(){
            return {
                settings: [],
                'email':'',
                'password':'',
                'remember':false,
            }
        },
        computed: {
            authErrors(){
                return this.$store.getters.authErrors;
            }
        },
        components: { HeaderView },
        methods: {
            login: function () {
                const { email, password, remember } = this;
                this.$store.dispatch('authRequest', { email, password, remember })
                    .then(() => {
                        this.$router.push('/dashboard')
                    })
            }
        }
    }
</script>
