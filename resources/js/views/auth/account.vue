<script>
import api from "../../api"

export default {
  name: "account",

  data() {
    return{
        currentUser: null,
        myOrders: null,
    }
  },

  mounted() {
    $(document).trigger('upload')
      window.scrollTo(0,0);
      this.getCurrentUser()
      this.getMyOrders()
  },

  methods: {
      getCurrentUser() {
          api.get('/api/auth/account')
              .then(res => {
                  this.currentUser = res.data.data
              })
      },

      logout() {
        api.post('api/auth/logout')
            .then(res => {
                localStorage.removeItem('access_token')
                this.$router.push({ name: 'login' })
            })
      },

      getMyOrders() {
          api.get('api/auth/my_orders')
              .then(res => {
                    this.myOrders = res.data.data
              })
              .catch(error => {
              })
      },
  }

}
</script>

<template>
  <div>
      <main class="overflow-hidden ">
          <!--Start Breadcrumb Style2-->
          <section class="breadcrumb-area" style="background-image: url(assets/images/inner-pages/breadcum-bg.png);">
              <div class="container">
                  <div class="row">
                      <div class="col-xl-12">
                          <div class="breadcrumb-content text-center wow fadeInUp animated">
                              <h2>My Account </h2>
                              <div class="breadcrumb-menu">
                                  <ul>
                                      <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                      <li> <i class="flaticon-next"></i> </li>
                                      <li class="active">My Account</li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!--End Breadcrumb Style2-->
          <!--Start My Account Page-->
          <section class="my-account-page pt-120 pb-120">
              <div class="container">
                  <div class="row wow fadeInUp animated">
                      <!--Start My Account Page Menu-->
                      <div class="col-xl-3 col-lg-4">
                          <div class="d-flex align-items-start">
                              <div class="nav my-account-page__menu flex-column nav-pills me-3" id="v-pills-tab"
                                   role="tablist" aria-orientation="vertical">
                                  <button class="nav-link active" id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">
                                    <span> Персональные данные</span>
                                  </button>
                                  <button class="nav-link" id="v-pills-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">
                                      <span> Мои заказы</span>
                                  </button>
                                  <button class="nav-link" id="v-pills-logout-tab" data-bs-toggle="pill" data-bs-target="#v-pills-logout" type="button" role="tab" aria-controls="v-pills-logout" aria-selected="false">
                                      <span><a href="#" @click.prevent="logout">Выйти</a></span>
                                  </button>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="tab-content " id="v-pills-tabContent">
                              <div v-if="currentUser" class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
                                  <div class="tabs-content__single">
                                      <h4><span> Персональные данные</span></h4>
                                      <h5>
                                          <table class="table">
                                              <thead>
                                              <tr>
                                                  <th scope="col">ID</th>
                                                  <th scope="col">{{ currentUser.id }}</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              <tr>
                                                  <th scope="row">em@il</th>
                                                  <td>{{ currentUser.email }}</td>
                                              </tr>
                                              <tr>
                                                  <th scope="row">name</th>
                                                  <td>{{ currentUser.name }}</td>
                                              </tr>
                                              <tr>
                                                  <th scope="row">patronymic</th>
                                                  <td>{{ currentUser.patronymic }}</td>
                                              </tr>
                                              <tr>
                                                  <th scope="row">surname</th>
                                                  <td>{{ currentUser.surname }}</td>
                                              </tr>
                                              <tr>
                                                  <th scope="row">gender</th>
                                                  <td>{{ currentUser.gender_as_text }}</td>
                                              </tr>
                                              <tr>
                                                  <th scope="row">address</th>
                                                  <td>{{ currentUser.address }}</td>
                                              </tr>
                                              </tbody>
                                          </table>
                                      </h5>
                                  </div>
                              </div>
                              <div v-if="myOrders" class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                                  <div v-if="this.myOrders.length > 0" class="tabs-content__single">
                                      <h4><span> Мои заказы</span></h4>
                                      <h5>
                                          <table class="table table-hover text-nowrap">
                                              <thead>
                                              <tr>
                                                  <th scope="col">ID</th>
                                                  <th scope="col">created_at</th>
                                                  <th scope="col">total_sum</th>
                                                  <th scope="col">is_paid</th>
                                                  <th scope="col">is_shipped</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              <tr v-for="myOrder in myOrders">
                                                  <td>{{ myOrder.id }}</td>
                                                  <td>{{ myOrder.date_in_format }}</td>
                                                  <td>{{ myOrder.total_sum }}</td>
                                                  <td>{{ myOrder.is_paid_as_text }}</td>
                                                  <td>{{ myOrder.is_shipped_as_text }}</td>
                                              </tr>
                                              </tbody>
                                          </table>
                                      </h5>
                                  </div>
                                  <div v-if="this.myOrders.length === 0">
                                      Здесь пока пусто
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!--End My Account Page-->
      </main>
  </div>
</template>

<style>

</style>
