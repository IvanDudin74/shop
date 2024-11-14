<script>
import router from "../../router";

export default {
  name: "registration",

  data() {
    return{
        name: null,
        patronymic: null,
        surname: null,
        gender: null,
        addres: null,
        email: null,
        password: null,
        password_confirmation: null,
        role: 0,
        error: null,
    }
  },

  mounted() {
    $(document).trigger('upload')
  },

  methods: {
      registration() {
          this.axios.post("/api/users", {
              name : this.name,
              patronymic : this.patronymic,
              surname : this.surname,
              gender : this.gender,
              addres : this.addres,
              email : this.email,
              password : this.password,
              password_confirmation : this.password_confirmation,
              role : this.role,
          })
              .then(res => {
                  localStorage.access_token = res.data.access_token
                  router.push({ name: 'product.index' })
              })
              .catch(error => {
                  this.error = error.response.data.message
              })
      },

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
                              <h2>Register</h2>
                              <div class="breadcrumb-menu">
                                  <ul>
                                      <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                      <li> <i class="flaticon-next"></i> </li>
                                      <li class="active">Register</li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!--End Breadcrumb Style2-->
          <!--Start Login Page-->
          <section class="login-page pt-120 pb-120">
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-xl-6 col-lg-8 col-md-9 wow fadeInUp animated">
                          <div class="login-register-form" :style="`background-image: @/assets/images/inner-pages/login-bg.png');`">
                              <div class="top-title text-center ">
                                  <h2>Register</h2>
                              </div>
                              <form class="common-form">
                                  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Your Name" name="name" v-model="name">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Your Patronymic" name="patronymic" v-model="patronymic">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Your Surname" name="surname" v-model="surname">
                                  </div>

                                  <div>
                                      Пол:<br>
                                      <input type="radio" v-model="gender" value="1" style="width:30px" checked> <label for="sort0">Мужской</label><br>
                                      <input type="radio" v-model="gender" value="2" style="width:30px"> <label for="sort1">Женский</label><br>
                                  </div>

                                  <div class="form-group">
                                      <input type="email" class="form-control" placeholder="Your Email" name="email" v-model="email">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Your Addres" name="addres" v-model="addres">
                                  </div>

                                  <div class="form-group eye">
                                      <div class="icon icon-1"> <i class="flaticon-hidden"></i></div>
                                      <input type="password" id="password-field" class="form-control" placeholder="Your Password" name="password" v-model="password">
                                      <div class="icon icon-2 "><i class="flaticon-visibility"></i> </div>
                                  </div>

                                  <div class="form-group eye">
                                      <div class="icon icon-1"> <i class="flaticon-hidden"></i></div>
                                      <input type="password" id="password-field" class="form-control" placeholder="Confirm Password" name="password_confirmation" v-model="password_confirmation">
                                      <div class="icon icon-2 "><i class="flaticon-visibility"></i> </div>
                                  </div>

                                  <div class="checkk ">
                                      <div class="form-check p-0 m-0"> <input type="checkbox" id="remember">
                                          <label class="p-0" for="remember"> Accept the Terms and Privacy Policy </label>
                                      </div>
                                  </div>
                                  <div>
                                      <input type="hidden" name="role" v-model="role">
                                  </div>
                                  <button @click.prevent="registration()" class="btn--primary style2">Register </button>
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
