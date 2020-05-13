<template>
  <div class="Home-wrapper">
    <div class="page-loader" v-if="loading">
      <v-sheet :color="`grey ${theme.isDark ? 'darken-2' : 'lighten-4'}`" class="px-3 pt-3 pb-3">
        <v-list-item two-line v-for="n of 7" :key="n" class="items-list">
          <v-list-item-content>
            <v-list-item-title>
              <v-skeleton-loader max-width="150" type="card" height="18px"></v-skeleton-loader>
            </v-list-item-title>
            <v-list-item-subtitle>
              <v-skeleton-loader max-width="300" type="card" height="16px"></v-skeleton-loader>
            </v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </v-sheet>
    </div>
    <!--page-loader-->
    <div class="content-wrapper" v-else>
      <v-sheet :color="`grey ${theme.isDark ? 'darken-2' : 'lighten-4'}`" class="px-3 pt-3 pb-3">
        <v-list-item two-line v-for="n of 7" :key="n" class="items-list">
          <v-list-item-content>
            <v-list-item-title>
              <h3>Liptan Tea</h3>
            </v-list-item-title>
            <v-divider></v-divider>
            <v-list-item-subtitle>
              <div class="pro-detail">
                <div class="block">
                  <h4>
                    <i>Sales Price</i>
                  </h4>
                  <p>
                    <span class="rate rate-left">Sale Rate: Rs 20</span>
                  </p>
                  <p>
                    <span class="rate rate-right">Carton Rate (144p): Rs 4400</span>
                  </p>

                  <v-divider></v-divider>
                </div>
                <div class="block">
                  <h4>
                    <i>Whole Sale Price</i>
                  </h4>
                  <p>
                    <span class="rate rate-left">Sale Rate:Rs 20</span>
                  </p>
                  <p>
                    <span class="rate rate-right">Carton Rate (144p):4400</span>
                  </p>
                  <v-divider></v-divider>
                </div>
                <div class="block">
                  <h4>
                    <i>Purched Price</i>
                  </h4>
                  <p>
                    <span class="rate rate-left">Sale Rate: Rs 20</span>
                  </p>
                  <p>
                    <span class="rate rate-right">Carton Rate (144p): Rs 4400</span>
                  </p>

                  <v-divider></v-divider>
                </div>
              </div>
            </v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </v-sheet>
    </div>
    <!--content-wrapper-->
  </div>
  <!--home-wrapper-->
</template>

<script>
import EventBus from "../../EventBus";
export default {
  name: "Home",
  mounted() {
    setInterval(() => {
      this.loading = false;
    }, 3000);
  },
  data: function() {
    return {
      loading: true
    };
  },
  inject: ["theme"]
};
</script>

<style scoped>
.items-list {
  border-bottom: 1px solid rgba(0, 0, 0, 0.12);
}
.rate-right {
  text-align: right;
}
.rate-left {
  text-align: left;
}
.rate {
  font-weight: bold;
}
.block {
  padding: 5px;
}
h4 {
  padding-bottom: 8px;
  font-size: 0.9rem;
  text-align: center;
  text-decoration: underline;
  color: #1e1e1e;
}
</style>