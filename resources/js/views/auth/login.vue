<script>

import router from "../../router";

export default {
  name: "login",

  data() {
    return{
        email: null,
        password: null,
        error: null,
    }
  },

  mounted() {
    $(document).trigger('upload')
      window.scrollTo(0,0);
  },

  methods: {
        login() {
            this.axios.post('api/auth/login', {
                email: this.email,
                password: this.password,
            })
                .then(res => {
                    localStorage.access_token = res.data.access_token
                    router.push({ name: 'account'})
                })
                .catch(error => {
                    this.error = error.response.data.error
                })
        }
    },
}
</script>

<template>
  <div>
      <main class="overflow-hidden ">
          <!--Start Breadcrumb Style2-->
          <section class="breadcrumb-area" :style="`background-image: assets/images/inner-pages/breadcum-bg.png;`">
              <div class="container">
                  <div class="row">
                      <div class="col-xl-12">
                          <div class="breadcrumb-content text-center wow fadeInUp animated">
                              <h2>Login</h2>
                              <div class="breadcrumb-menu">
                                  <ul>
                                      <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                      <li> <i class="flaticon-next"></i> </li>
                                      <li class="active">Login</li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!--End Breadcrumb Style2-->
          <!--Start Login Page-->
          <section class="login-page pt-120 pb-120 wow fadeInUp animated">
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-xl-6 col-lg-8 col-md-9">
                          <div class="login-register-form" :style="`background-image: 'assets/images/inner-pages/login-bg.png';`">
                              <div class="top-title text-center ">
                                  <h2>Login</h2>
                                  <p>Don't have an account yet? <a href="register.html">Sign up for free</a></p>
                              </div>
                              <form class="common-form">
                                  <div class="form-group">
                                      <input v-model="email" type="email" class="form-control" placeholder="Email">
                                  </div>
                                  <div class="form-group eye">
                                      <div class="icon icon-1"> <i class="flaticon-hidden"></i></div>
                                      <input v-model="password" type="password" id="password-field" class="form-control" placeholder="Password">
                                      <div class="icon icon-2 "><i class="flaticon-visibility"></i> </div>
                                  </div>
                                  <div class="checkk ">
                                      <div class="form-check p-0 m-0"> <input type="checkbox" id="remember">
                                          <label class="p-0" for="remember"> Remember Me</label>
                                      </div>
                                      <a href="#0" class="forgot"> Forgot Password?</a>
                                  </div>
                                  <button @click.prevent="login" type="submit" class="btn--primary style2">Login </button>
                                <div class="text-danger">{{ this.error }}</div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!--End Login Page-->
      </main>
  </div>
</template>

<style>

</style>
