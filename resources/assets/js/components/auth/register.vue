<template>
    <div>
 <header-view :settings.sync="settings"></header-view>
      <!-- ======= SIGN IN Section ======= -->
  <section class="signin_hero signup d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row d-flex justify-content-end" data-aos="fade-up" data-aos-delay="150">
        <div class="col-lg-5 col-xs-12">
          <div class="formBox text-left">
            <h1>Sign Up</h1>
            <p>Complete your sign up with Mobile Number +91 9773561244</p>
             <form method="POST" v-on:submit.prevent="register" >
            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" v-model="first_name" name="" placeholder="">
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" v-model="last_name" name="" placeholder="">
            </div>
            <div class="form-group">
              <label>Set Password <span class="medium_pass">Medium</span></label>

              <input type="password" v-model="password" class="form-control" name="" placeholder="....">
            </div>

            <div class="form-group">
              <span class="charac form green">8 Character</span>
              <span class="charac form grey">1 Special character</span>
              <span class="charac form green">1 number</span>
            </div>

            <div class="form-group">
              <label class="reenter_pass">Re-enter Password</label>
              <input type="password" v-model="password_confirmation" class="form-control" name="" placeholder="....">
            </div>
            <div class="form-group">
              <label>Email Id</label>
              <input type="text" v-model="email" class="form-control" name="" placeholder="">
            </div>
            <button type="submit" class="login_button">Verify Email ID</button>
            <span class="login_using">Existing User?  <router-link :to="{ name: 'login' }">Login</router-link></span>
             </form>
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
                'action':'register',
                'first_name':'',
                'last_name':'',
                'email':'',
                'password':'',
                'password_confirmation':'',

            }
        },
         components: { HeaderView },
        computed: {
            authErrors(){
                return this.$store.getters.authErrors;
            }
        },
        methods: {
            register: function () {
                const { action, first_name,last_name, email, password, password_confirmation } = this;
               /* this.$store.dispatch('authRequest', { action, first_name,last_name, email, password, password_confirmation })
                    .then(() => {
                        this.$router.push('/dashboard')
                    })*/


                    this.$axios.post(this.$config.baseUrl + "/memberSignUp", { 'first_name':first_name,'last_name':last_name, 'email':email, 'password':password,'confirm_pass': password_confirmation}).then(response => {
                    this.error = "";
                    if (response.status == 200) {
                      this.$router.push('/login');
                        console.log("user_id1 2 ", response.data.user_id);
                      //  localStorage.setItem('currentUser', JSON.stringify(response.data));
                       

                    } else {
                        this.flash('Somthing went wrong please try again', 'error');
                    }

                }).catch(error => {

                 

                   
                    $(".loader-box").css("display", "none");
                })
            }

        }
    }
</script>
