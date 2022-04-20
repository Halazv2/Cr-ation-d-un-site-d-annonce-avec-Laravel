<template>
  <div class="class">
    <!-- <h1>im here</h1> -->

    <div class="login">
      <form @submit.prevent action method>
        <div class="flex gap-4 bg-red-500 p-4 rounded-md" v-if="error">
          <div class="w-max">
            <div
              class="
                h-10
                w-10
                flex
                rounded-full
                bg-gradient-to-b
                from-red-100
                to-red-300
                text-red-700
              "
            >
              <span
                class="material-icons material-icons-outlined m-auto"
                style="font-size: 20px"
              ></span>
            </div>
          </div>
          <div class="space-y-1 text-sm">
            <h6 class="font-medium text-white">Fatal error</h6>
            <p class="text-red-100 leading-tight">
              Email or password is incorrect
              <!-- {{ errorMsg }} -->
            </p>
          </div>
        </div>
        <h3>Login</h3>
        <label for="username">Username</label>
        <input
          type="text"
          placeholder="Email"
          v-model="loginForm.email"
          id="username"
        />

        <label for="password">Password</label>
        <input
          type="password"
          v-model="loginForm.password"
          placeholder="Password"
        />

        <button class="hover:bg-zinc-100" @click="Login()">Log In</button>
        <a class="cursor-pointer hover:text-zinc-300" @click="Signup()"
          >Don't have an account yet? <span class="text-blue-500">Sign Up</span>
        </a>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "LoginComponent",
  inject: ["setLoggedIn"],
  data() {
    return {
      loginForm: {
        email: "",
        password: "",
      },
      error: false,
      errorMsg: "",
      usedEmail: "",
    };
  },
  methods: {
    Signup() {
      this.$router.push("signup");
    },
    Login() {
      var myHeaders = new Headers();
      myHeaders.append("Accept", "application/json");
      myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

      var urlencoded = new URLSearchParams();
      urlencoded.append("email", this.loginForm.email);
      urlencoded.append("password", this.loginForm.password);

      var requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: urlencoded,
      };
      fetch("http://127.0.0.1:8000/api/login", requestOptions)
        .then((response) => response.json())
        .then((result) => {
          // console.log(result.user['id']);
          // console.log(result["token"]);
          localStorage.setItem("id",result.user['id'])
          if (result["token"]) {
            this.$router.push("Offres");
            localStorage.setItem("token", result["token"]);
            this.setLoggedIn(true);
          } else {
            this.error = true;
          }
        });
    },
  },
};
</script>

<style scoped>
.login {
  display: flex;
  align-items: center;
}
.class {
  background-image: linear-gradient(
      rgba(60, 60, 68, 0.5),
      rgba(69, 69, 60, 0.5)
    ),
    url("../../assets/img/books.jpg");
  height: 87vh;
  overflow-y: hidden;
  display: flex;
  justify-content: center;
  text-align: start;
}
form {
  /* height: 72%; */
  width: 100%;
  background-color: #2c3e50c2;
  backdrop-filter: blur(10px);
  box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
  padding: 50px 39px;
}
form * {
  font-family: "Poppins", sans-serif;
  color: #ffffff;
  letter-spacing: 0.5px;
  outline: none;
  border: none;
}
form h3 {
  font-size: 32px;
  font-weight: 500;
  line-height: 42px;
}

label {
  display: block;
  margin-top: 10px;
  font-size: 16px;
  font-weight: 500;
}
input {
  display: block;
  height: 50px;
  width: 100%;
  background-color: rgba(255, 255, 255, 0.07);
  border-radius: 3px;
  padding: 0 10px;
  margin-top: 8px;
  font-size: 14px;
  font-weight: 300;
}
::placeholder {
  color: #e5e5e5;
}
button {
  margin-top: 16px;
  margin-bottom: 8px;
  width: 100%;
  background-color: #ffffff;
  color: #080710;
  padding: 15px 0;
  font-size: 18px;
  font-weight: 600;
  /* border-radius: 5px; */
  cursor: pointer;
}
a {
  font-weight: 100;
  /* font-size: 13px; */
}
</style>

