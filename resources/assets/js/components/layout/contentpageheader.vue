<template>
<div>
  <header>
    <nav class="navbar navbar-expand-xl navbar-light bg-white fixed-top p-0">
      <div class="container">
        <div class="top_bar">
          <div class="top_social"> <a target="_blank" :href="setting.facebook_url"><i aria-hidden="true" class="fa fa-facebook"></i></a> <a href="javascript:void(0)" class="header_wechat"><i class="fa fa-weixin"></i></a> <a target="_blank" :href="setting.youtube_url"><i class="fa fa-youtube-play"></i></a> <a target="_blank" :href="setting.soundcloud_url"><i class="fa fa-soundcloud"></i></a> <a target="_blank" :href="setting.twitter_url"><i class="fa fa-twitter"></i></a> <a target="_blank" :href="setting.instagram_url"><i class="fa fa-instagram"></i></a> <a target="_blank" :href="setting.linkedin_url"><i class="fa fa-linkedin"></i></a>
            <div class="header_qrcode">
              <h4>WeChat</h4>
              <img :src="image(setting.wechat_img)" alt=""></div>
          </div>
          <div class="subscribe_form">
            <form class="subscribe"  @submit.prevent="subscribe">
              <div class="input-group">
                <input type="text" placeholder="Subscribe to eNews" v-model="email" class="form-control">
                <div class="input-group-prepend">
                  <button type="submit" class="input-group-text"><img src="/assets/img/paper-plane-header.svg" alt=""></button>
                </div>
              </div>
            </form>
            <div v-if="formErrors['email']" :class="['help-text error-text mt-2 header-top-error']">{{ formErrors['email'][0] }}</div>
            <div v-if="formErrors['message']" :class="['help-text error-text mt-2 header-top-error']"> {{formErrors['message']}} <a v-if="subs" @click="unsubscribe" class="unsubscribe" href="javascript:;">Click here to Unsubscribe</a> </div>
            <div v-if="success['message']" :class="['help-text success-text mt-2 header-top-success']">{{ success['message'] }} <a v-if="subs" @click="unsubscribe" class="unsubscribe" href="javascript:;">Click here to Unsubscribe</a> </div>
          </div>
        </div>
        <router-link class="navbar-brand" to="/"><img :src="setting.site_logo" alt="Chinese 1-2-Tree"></router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" href="https://beijingmandarin.com/news_updates/" target="_blank"><span style="text-transform:lowercase">e</span>news</a> </li>
            <li class="nav-item"><a class="nav-link" href="https://www.beijingmandarin.com/bookstore/" target="_blank"><i class="fa fa-shopping-cart"></i> Store</a></li>
            <!-- <li class="nav-item"> <a class="nav-link" href="#">Blog</a> </li> -->
            <!-- <li class="nav-item"> <a class="nav-link" href="#">What we Do</a> </li> -->
            <li class="nav-item"  v-for="headermenu in headermenus">
              <router-link  :to="'/page/'+headermenu.titleSlug" class="nav-link">{{ headermenu.en_title}} </router-link>
            </li>
          </ul>
        </div>
        <!-- dropdown -->
        <div class="member_login_box">
          <div class="member_login_box_inner">
            <div class="login_header">
              <h4>Welcome to Chinese 1-2-Tree!</h4>
              <span class="close view_modal"><i class="fa fa-times-circle" aria-hidden="true"></i></span> </div>
            <div class="login_body">
                  <div class="input-group">
<input type="text" class="form-control" name = "username" placeholder="Enter Username" v-model="loginData.username"  v-validate="'required'" :class="{'danger' : errors.has('username')}" >													  
														                        </div>
														<br/>
<div class="input-group">
	<input type="password" class="form-control" name="password" placeholder="* * * * *" v-model="loginData.password" v-validate="'required'" :class="{'danger' : errors.has('password')}" >
															
</div>
 <div class="col-12"><span class="forgot"><a href="/forgot-password">Forgot password?</a></span></div>
                                                    <div class="col-12 text-left">
                                                        <label for="Remember"><input name="Remember" type="checkbox" id="Remember" value="forever"> Remember me <small>(not recommended for public or shared computer)</small></label>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-sm-6 col-12">
                                                        <label for="" class="text-medium">Connect with:</label>
                                                        <div class="social">
                                                            <a href=""><img src="/assets/img/fb-icon.png" alt=""></a>
                                                            <a href=""><img src="/assets/img/chat.png" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-12 text-left">
                                                        <label for="">&nbsp;</label>
                                                        <button class="login_but12" @click="validateBeforeSubmit()">LOG IN <i aria-hidden="true" class="fa fa-chevron-right"></i></button>
                                                    </div>
                                                    </div>
                                                    <div class="col-12 no_account">
                                                        Not a member?
                                                        <a href="/free-trial" class=""><span>Free trial account <i aria-hidden="true" class="fa fa-chevron-right"></i></span></a>
													</div>
            </div>
          </div>
        </div>
        <div class="header_member_login"> <a href="javascript:void(0)" class="login_but" @click="showLoginBox = !showLoginBox" v-show="!userLoggedIn">Member LogIn <i class="fa fa-chevron-down" aria-hidden="true"></i></a>                
                <div class="dropdown logout_account"  v-show="userLoggedIn">
                  <button class="dropdown-toggle drop_down" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{name}} </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
                  <a class="dropdown-item" href="/student-listing"><i class="fa fa-user"></i>My Account</a>
                  <a class="dropdown-item" href="/profile"><i class="fa fa-user"></i>My Profile</a>  
                  <a href="javascript:void(0)" class="dropdown-item" v-show="userLoggedIn" @click="doLogout()"><i class="fa fa-power-off"></i>Logout</a>
                  </div>
                </div>
          <div class="language_box">
            <select name="" id="">
              <option value="EN">EN</option>
              <option value="简">简</option>
              <option value="繁">繁</option>
            </select>
          </div>
        </div>
        <!-- dropdown end-->
      </div>
      <section class="specialities new_top">
        <div class="container">
          <div class="row text-center">
            <div class="col-12 report_tabs">
              <div class="row">
                <div class="col-12 col-lg-3 col-md-6">
                  <div class="green specialities_box">
                    <div class="span"><img alt="" src="/assets/img/book-tree.png"></div>
                    <h3>THE RESORT</h3>
                    <ul class="specialities_box_manu">
                      <li><a href="#">BOOK TREE</a>
                        <ul class="sub_box_manu">
                          <li>
                            <div class="resort_book_popup">
                              <h3>READS STRAND</h3>
                              <ul>
                                <li><a href="#">Leveled Reads&Works</a></li>
                                <li><a href="#">IB-PYP Theme Books</a></li>
                                <li><a href="#">STEAM Field Books</a></li>
                                <li><a href="#">Topics</a></li>
                                <li><a href="#">Fictions</a></li>
                                <li><a href="#">Non-fictions</a></li>
                                <li><a href="#">Chinese Treasured Series</a></li>
                                <li><a href="#">Hanzi Land</a></li>
                                <li><a href="#">Songs, Rhyme & Poetry</a></li>
                                <li><a href="#">Stepstone Reading</a></li>
                              </ul>
                            </div>
                            <div class="resort_book_popup">
                              <h3>AIMING GRADE</h3>
                              <ul>
                                <li><a href="#">Pre K</a></li>
                                <li><a href="#">Grade 1</a></li>
                                <li><a href="#">Grade 2</a></li>
                                <li><a href="#">Grade 3</a></li>
                                <li><a href="#">Grade 4</a></li>
                                <li><a href="#">Grade 5</a></li>
                                <li><a href="#">Grade 6</a></li>
                              </ul>
                            </div>
                            <div class="resort_book_popup">
                              <h3>ACQUISITION PHASE</h3>
                              <ul>
                                <li><a href="#">Picture Reads</a></li>
                                <li><a href="#">Ladder Reads</a></li>
                                <li><a href="#">Bridge Reads</a></li>
                                <li><a href="#">Chapters Reads</a></li>
                              </ul>
                            </div>
                          </li>
                        </ul>
                      </li>
                      <li><a href="#">SKILL SET</a>
                        <ul class="sub_box_manu">
                          <li>
                            <div class="resort_book_popup">
                              <h3>COMPREHENSION</h3>
                              <ul>
                                <li><a href="#">Words & Phrases</a></li>
                                <li><a href="#">Comprehension</a></li>
                                <li><a href="#">Reading Strategy</a></li>
                              </ul>
                            </div>
                            <div class="resort_book_popup">
                              <h3>CHARACTER WORKS</h3>
                              <ul>
                                <li><a href="#">Chinese Character Alphabet</a></li>
                                <li><a href="#">Stem-Radical</a></li>
                                <li><a href="#">Stem-Characters</a></li>
                                <li><a href="#">Character Applications</a></li>
                              </ul>
                            </div>
                            <div class="resort_book_popup">
                              <h3>GRAMMAR</h3>
                              <ul>
                                <li><a href="#">For Words</a></li>
                                <li><a href="#">For Sentences</a></li>
                                <li><a href="#">For Structure</a></li>
                              </ul>
                            </div>
                            <div class="resort_book_popup">
                              <h3>PINYIN PHONIC</h3>
                              <ul>
                                <li><a href="#">About Pinyin</a></li>
                                <li><a href="#">Basic Pinyin</a></li>
                                <li><a href="#">Pinyin System</a></li>
                              </ul>
                            </div>
                          </li>
                        </ul>
                      </li>
                      <li><a href="#">ASSESSMENT</a>
                        <ul class="sub_box_manu">
                          <li>
                            <div class="resort_book_popup">
                              <h3>ASSESSMENT READS & WORKS</h3>
                              <ul>
                                <li><a href="#">Benchmark Books & Running Checks</a></li>
                                <li><a href="#">Benchmark Passages & Running Checks</a></li>
                                <li><a href="#">Retelling Rubrics</a></li>
                              </ul>
                            </div>
                            <div class="resort_book_popup">
                              <h3>ASSESSMENT CHARACTERS & APPLICATIONS </h3>
                              <ul>
                                <li><a href="#">Benchmark Characters & Running Checks</a></li>
                                <li><a href="#">Benchmark Words/Phrases & Running Checks</a></li>
                              </ul>
                            </div>
                          </li>
                        </ul>
                      </li>
                      <li><a href="#">INSTRUCTIONAL USES</a>
                        <ul class="sub_box_manu">
                          <li>
                            <div class="resort_book_popup">
                              <h3>TUTORING PACK</h3>
                              <ul>
                                <li><a href="#">Starter Worksheets</a></li>
                              </ul>
                            </div>
                            <div class="resort_book_popup">
                              <h3>TASK LEANRING PACK </h3>
                              <ul>
                                <li><a href="#">Chinese Treasures Court</a></li>
                              </ul>
                            </div>
                            <div class="resort_book_popup">
                              <h3>PROJECT-BASED LEARNING </h3>
                              <ul>
                                <li><a href="#">Project-based Learning Packs</a></li>
                                <li><a href="#">About Project-based Learning</a></li>
                              </ul>
                            </div>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6">
                  <div class="specialities_box yellow">
                    <div class="span"><img alt="" src="/assets/img/my-teaching.png"></div>
                    <h3>MY TEACHING </h3>
                    <ul class="specialities_box_manu">
                      <b>MANAGE READING ACTIVITY AND GROWTH</b>
                      <li>View your entire roster</li>
                      <li>Make practice and provide instruction</li>
                      <li>Manage assignments and assessment</li>
                      <li>Review and Track progress with reports</li>
                    </ul>
                  </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6">
                  <div class="light_red specialities_box">
                    <div class="span"><img alt="" src="/assets/img/my-resource.png"></div>
                    <h3>MY SPACE </h3>
                    <ul class="specialities_box_manu">
                      <li>
                        <p>Please Login your account to manage your resources</p>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6">
                  <div class="light_blue specialities_box">
                    <div class="span"><img alt="" src="/assets/img/teachers-land.png"></div>
                    <h3>GARDENER LAND</h3>
                    <ul class="specialities_box_manu">
                      <li>
                        <div class="book_popup">
                          <h3>Teacher to Teach</h3>
                          <ul>
                            <li><a href="#">Professional Discussions</a></li>
                            <li><a href="#">Professional Webinars</a></li>
                            <li><a href="#">Our Sharing</a></li>
                          </ul>
                        </div>
                        <div class="book_popup">
                          <h3>About Leveling</h3>
                          <ul>
                            <li><a href="#">Text Leveling System</a></li>
                            <li><a href="#">Level Correlation Chart</a></li>
                            <li><a href="#">Stage of Development</a></li>
                            <li><a href="#">Assessing a Student’s Level</a></li>
                            <li><a href="#">About Running Checks</a></li>
                          </ul>
                        </div>
                        <div class="book_popup">
                          <h3>Open Resources &amp; Tools</h3>
                          <ul>
                            <li><a href="#">Useful Links</a></li>
                            <li><a href="#">Useful Video</a></li>
                          </ul>
                        </div>
                        <div class="book_popup">
                          <h3>Instructional Tools</h3>
                          <ul>
                            <li><a href="#">Assignment Feature</a></li>
                            <li><a href="#">My Space Feature</a></li>
                            <li><a href="#">Leveled Books by Skill Chart</a></li>
                            <li><a href="#">Resource Calendar</a></li>
                            <li><a href="#">Helpful Tips</a></li>
                            <li><a href="#">Reading Pen</a></li>
                            <li><a href="#">Little Robot Companion</a></li>
                          </ul>
                        </div>
                        <div class="book_popup">
                          <h3>Engage Students</h3>
                          <ul>
                            <li><a href="#">Get Students Started</a></li>
                            <li><a href="#">Get to Know the Student Portal</a></li>
                            <li><a href="#">Get to Know the Reading Room</a></li>
                            <li><a href="#">Student Incentives & Awards</a></li>
                          </ul>
                        </div>
                        <div class="book_popup">
                          <h3>Parent to Support</h3>
                          <ul>
                            <li><a href="#">Parent Discussion</a></li>
                            <li><a href="#">Help Your Child Start</a></li>
                            <li><a href="#">How to Support Your Child</a></li>
                            <li><a href="#">Parent Access</a></li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </nav>
  </header>
</div>
</template> 




<script>
	import facebookLogin from 'facebook-login-vuejs';
	import Vue from 'vue';
	// Import component
	import Loading from 'vue-loading-overlay';
	// Import stylesheet
	import 'vue-loading-overlay/dist/vue-loading.css';
    // Init plugin
	import store from '../../store'
    Vue.use(Loading);

	export default {
		components: {
            facebookLogin,
            Loading
        },
       
		data() {
		return {
			idImage: "assets/img/fb-icon.png", 
			loginImage: "assets/img/fb-icon.png", 
			mailImage: "", 
			faceImage: "",
			setting:{},
			 headermenus:{},
			isConnected: false,
			name: '',
			email: '',
			phone: '',
			isLoading: false,
			fullPage: true,
			loader: false,
			onCancel:'',
			personalID: '',
			FB: undefined,
			success_response:"",
			loading: true,
			//errors : [],
			formErrors: [],
			success: [],
			subs:false,
			formData: {
				friend_email:"",
				friend_name:"",
				your_email:"",
				your_name:"",
				friend_message:"",
			},  
			settings: {
				/*app: {
					logo: null
				}*/
			},
			showLoginBox: false,
			loginData: {},
			headerMenu: [
				{
				  title: "Enews",
				  url: "#"
				},
				{
				  title: '<i aria-hidden="true" class="fa fa-shopping-cart"></i> Store',
				  url: "#"
				},
				{
				  title: "Blog",
				  url: "#"
				},
				{
				  title: "Contact Us",
				  url: "#"
				}
			]
		};
	},
  
  methods: {
   image(image)
    {
      return "/storage/"+image;
    },

    imageLogo(image)
    {
      return "/updates/"+image;
    },
  getHeaderPageList()
            {
              axios.get(this.$config.baseApiUrl + "/get-page-contact/")
              .then(response => {
                if(response.data.status == 0)
          {

          }else if(response.data.status == 1)
          {
              this.headermenus = response.data.data;
             console.log(this.headermanus);
          }
              })
              .catch(error => {});
            },
          getSetting()
            {
              axios.get(this.$config.baseApiUrl + "/setting")
              .then(response => {
                if(response.data.status == 0)
          {

          }else if(response.data.status == 1)
          {
          console.log(response.data.setting);
              this.setting = response.data.setting;
          }
              })
              .catch(error => {});
            },
    /*Facebook Login*/
    render() {
      const dict = {
        custom: {
          friend_email: {
            required: 'Friend email field is required',
            email: "Enter valid friend's email"
          },
           your_email: {
            required: 'Your email field is required',
            email: "Enter valid your email"
          },
           your_name : {
            required: () => 'Your name is required'
          },
          friend_name : {
            required: () => "Friend's name is required"
          },
        }
      };
      this.$validator.localize('en', dict);
    },
	
  linkRedirect(){
    const link = this.$refs['links'].value;
    if(link){
      window.location.href = link;
    }
  },
	fbLogin() {
		window.FB.login(function (response) {
			if (response.authResponse) {
				getUserData();
			} else {
				document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
			}
		}, {scope: 'email'});
	},
	getUserData() {
		
        return new Promise((resolve, reject) => {
			window.fbAsyncInit = function() {
				window.FB.init({
				  appId      : 2248379318748808,
				  xfbml      : true,
				  version    : 'v2.0'
				});
			};
			(function(d, s, id){
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			
			window.FB.api('/me', 'GET', { fields: 'id,name,email' },
            userInformation => {
				console.warn("data api",userInformation)
				this.personalID = userInformation.id;
				this.email = userInformation.email;
				this.name = userInformation.name;
				return resolve()
            })
        })
	},

	sdkLoaded(payload) {
		this.isConnected = payload.isConnected
		this.FB = payload.FB
		if (this.isConnected) this.getUserData()
	},
	onLogin() {
		let instance = this;
		this.isConnected = true
		this.getUserData().then(()=>{
			this.$api.post('/authenticate', {
				'name':  this.name,
				'email':  this.email,
				'facebook_id':  this.personalID,
			}).then(function(response) {
				//if (response.data.status) {
				  //console.log(response);
				instance.$store.dispatch('global/fbLoginData', response)
				instance.showLoginBox = false
					// console.log(response.data)
				   // localStorage.setItem('user', response.data.user);
				   // localStorage.setItem('token', response.data.token);
				instance.authenticated = true;
				instance.user = response.data.user;
			});
		});
	  
	},
	onLogout() {
	  this.isConnected = false;
	},

    /*Facebook Logout*/
    unsubscribe() {
      this.loading = true;
      this.formErrors = [];
      this.success = [];
      this.subs = false;
      this.$axios
        .post(this.$config.baseUrl + "/unsubscribe", { email: this.email })
        .then(response => {
          //this.email = response.data.data
          setTimeout(() => {
            this.loading = false;
          }, 200);
          if (response.data.status == 1) {
            this.success = { message: response.data.message };
            setTimeout(() => {
              this.formErrors = [];
              this.success = [];
              this.subs = false;
            }, 5000);
         
          } else {
            setTimeout(() => {
              this.loading = false;
            }, 200);

            this.formErrors = { message: response.data.message };
            setTimeout(() => {
              this.formErrors = [];
              this.success = [];
              this.subs = false;
            }, 5000);
            // this.$toasted.error(response.data.message, {
            //   duration: 5000
            //   onComplete : () => this.$router.push('/newsletter')
            // });
          }
        })
        .catch(error => {
          this.formErrors = error.response.data.errors;
          setTimeout(() => {
            this.loading = false;
          }, 200);
        });
    },
    subscribe() {
		this.loading = true;
		this.formErrors = [];
		this.success = [];
		this.subs = false;
		this.$axios
        .post(this.$config.baseUrl + "/subscribe", { email: this.email })
        .then(response => {
          //this.email = response.data.data
          setTimeout(() => {
            this.loading = false;
          }, 200);
          if (response.data.status == 1) {
            this.success = { message: response.data.message };
             this.subs = true;
            setTimeout(() => {
              this.formErrors = [];
              this.success = [];
            }, 5000);

          } else {
            setTimeout(() => {
              this.loading = false;
            }, 200);
            if (response.data.status == 2) {
              this.subs = true;
            }
            this.formErrors = { message: response.data.message };
            setTimeout(() => {
              this.formErrors = [];
              this.success = [];
              this.subs = false;
            }, 5000);

          }
        })
        .catch(error => {
          this.formErrors = error.response.data.errors;
          setTimeout(() => {
            this.loading = false;
          }, 200);
        });
    },
    validateBeforeSubmit() {
		this.$validator.validateAll().then(result => {
			//console.log(result);
			if (result) { 
				// eslint-disable-next-line
				this.doLogin();
				return;
			}
		});
    },
    doLogin()
    {
	
		this.$session.start();
		//console.log(this.loginData);
		if(this.loginData.username){
		   this.$axios.post(this.$config.baseUrl + "/login", { username: this.loginData.username,password: this.loginData.password }).then(response => {
			if(response.data.status==1){ 
				this.showLoginBox = false
				this.$toasted.success("Logged In as: "+ response.data.user.firstname +" "+response.data.user.lastname, {
					duration: 2000,
				})
				this.$router.push({ path: '/profile'})
				//console.log(JSON.stringify(response.data.user));
				localStorage.setItem('user',JSON.stringify(response.data.user));
				localStorage.setItem('currentUser',JSON.stringify(response.data.user));
				localStorage.setItem('user_email', response.data.user.email);
				localStorage.setItem('user_id', response.data.user.id);
				localStorage.setItem('user_name', response.data.user.firstname +" "+response.data.user.lastname);
			//	console.log("============ loged in ========="+response.data.user.firstname +" "+response.data.user.lastname);

				store.dispatch('global/userLoginData', response);
                
			}else if(response.data.status==2){
				
			}else{
				//this.showLoginBox = false
				this.$toasted.error(response.data.error, {
					duration: 2000,
				})

			}
			
			
			//router.push({name: loginOtpRoute, params: {type: response.otpTransport}})
			//return resolve(response.data.user)
		}).catch((err)=>{
          this.$toasted.error(err, {
              duration: 2000,
          });
        }) 
		}else{
		   this.$axios.post(this.$config.baseUrl + "/login", { email: this.loginData.email,password: this.loginData.password }).then(response => {
			if(response.data.status==1){
				this.showLoginBox = false
				this.$toasted.success("Logged In as: "+ response.data.user.firstname +" "+response.data.user.lastname, {
					duration: 2000,
				})
				this.$router.push({ path: '/profile'})
			//	console.log(JSON.stringify(response.data.user));
				localStorage.setItem('user',JSON.stringify(response.data.user));
				localStorage.setItem('currentUser',JSON.stringify(response.data.user));
				localStorage.setItem('user_email', response.data.user.email);
				localStorage.setItem('user_id', response.data.user.id);
				localStorage.setItem('user_name', response.data.user.firstname +" "+response.data.user.lastname);
			//	console.log("============ loged in ========="+response.data.user.firstname +" "+response.data.user.lastname);

				store.dispatch('global/userLoginData', response)
			}else if(response.data.status==2){
				
			}else{
				//this.showLoginBox = false
				this.$toasted.error(response.data.error, {
					duration: 2000,
				})

			}
			
			
			//router.push({name: loginOtpRoute, params: {type: response.otpTransport}})
			//return resolve(response.data.user)
		}).catch((err)=>{
          this.$toasted.error(err, {
              duration: 2000,
          });
        }) 
		}
	   
		//console.log(this.$session);
      /* this.session.login(this.loginData.email, this.loginData.password).then((response)=> {
        this.showLoginBox = false
        this.$toasted.success("Logged In as: "+ response.name, {
            duration: 2000,
        })
      })
      .catch((err)=>{
          this.$toasted.error(err, {
              duration: 2000,
          });
        }) */
    },
    doLogout()
    {
		this.$store.dispatch("global/logout", {});
		//this.logout()
		
		this.isConnected = false;
		//this.$refs.fb.$el.click()
        this.$toasted.success("Logged out Successfully !", {
            duration: 1100,
			      onComplete : () => this.$router.push({ path: '/'})
        })
    },
    validateBeforeFriendsSubmit(scope)
	  {
      this.$validator.validateAll(scope).then(result => {
        if (result) {
          // eslint-disable-next-line
          this.isLoading = true;
          this.friendSubmit();
          return;
        }
      });
    },
    friendSubmit() {
      this.$api.post("/friendSubmit", this.formData).then(response => {
        //console.log(response);
        this.$validator.reset(this.formData);
         if (response.data.status == 1) {
              this.formData.friend_email = this.formData.friend_name = this.formData.your_email = this.formData.your_name = this.formData.friend_message = '';
              this.success_response = 1
              this.isLoading = false
        }
        //this.$router.push({'name': 'selfEvaluationComplete'})
      });
      // console.log('here')
    },
    checkSelfLoginUser(){
      this.$api.get('/is-user-login').then(response => {
       // console.log('<========================================>');
        //console.log(response);
      })
    },
   
  },
  
  async mounted() {
    this.checkSelfLoginUser();
    const response = await this.$system.getSettings();
    this.settings = response;
    //console.log("here", this.$store);
     this.render();
    
			 this.getSetting();
          this.getHeaderPageList();
       
    
  },
  
  computed: {
    rulesphone() {
      return this.email.length ? 'required' : '';
    },
	rulesemail() {
      return this.phone.length ? 'required' : '';
    },
    userLoggedIn: function () {
        this.name = this.$store.global.userData.firstname;
       
	    return this.$store.global.isLoggedIn
    },    
  }
};
</script>

<style>

.danger{
  border-color: #e36d6d;
}
.wechat{cursor: pointer;}
.social button img{
    position: absolute;
    top: 7px;
    left: 10px;
    width: 35px !important;
    background: #3b5998 !important;
}
.logout_account button {
    background-image: linear-gradient(#ab77e3, #592ac5);
    border-color: #985dd0;
    border-radius: 15px;
    line-height: 50px;
    width: 205px;
    font-size: 18px;
    font-weight: 500;
    color: #fff;
    cursor:pointer;
    margin-left:20px;
}
.logout_account .dropdown-menu.show {
    box-shadow: 0 0 13px rgba(0, 0, 0, 0.1);
    border-radius: 0 0 5px 5px;
    margin: 0;
    border-color: #ededed;
    padding:10px;
}
.logout_account .dropdown-menu.show a{ font-size:15px; border-bottom:1px dashed #828282;color:#000; font-weight:500; padding:10px;}
.logout_account .dropdown-menu.show a:last-child{ border-bottom:0}
.logout_account .dropdown-item.active, .dropdown-item:active {
    background-color: #6a3acb;
    color: #fff !important;
}
a.wechat2{ cursor:pointer;}
a.wechat{ cursor:pointer;}
</style>
