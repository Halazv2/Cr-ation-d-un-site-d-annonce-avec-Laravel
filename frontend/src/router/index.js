import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/Offres",
    name: "Offeres",
    // route level code-splitting
    // this generates a separate chunk (offrs.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "offrs" */ "../views/OffresView.vue"),
  },
  {
    path: "/login",
    name: "login",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/LoginView.vue"),
  },
  {
    path: "/signup",
    name: "signup",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/SignupView.vue"),
  },
  {
    path: "/Demandes",
    name: "Demandes",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/DemandesView.vue"),
  },
  {
    path: "/Profile",
    name: "Profile",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/ProfileView.vue"),
  },
  {
    path: "/:pathMatch(.*)*",
    name: "NotFound",
    component: () =>
      import(
        /* webpackChunkName: "about" */ "../components/PageNotFound404.vue"
      ),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach((to, from) => {
  // check if user is requesting login or signup pages
  // check if user is already logged in (token is in localStorage)
  const toAuth = to.name === "login" || to.name === "signup" || to.name === "home";
  const isLoggedIn = !!localStorage.getItem("token");
  if (!toAuth && !isLoggedIn) {
  // if user is not requesting login or signup pages and user is not logged in, redirect to login page
    return { name: "login" };
  }
  if (toAuth && isLoggedIn) {
  // if user is already logged in and requesting login or signup pages, redirect to source page
    return from;
  }
  // else let the user continue
  return true;
});

export default router;
