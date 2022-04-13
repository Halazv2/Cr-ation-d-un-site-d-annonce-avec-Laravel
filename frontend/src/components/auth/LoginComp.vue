<template>
  <div class="class">
    <!-- <h1>im here</h1> -->
    <div class="login">
      <form>
        <h3>Login Here</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" id="username" />

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" />

        <button>Log In</button>
        <a href="./SignupComp.vue">Don't have an account yet? Sign Up</a>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "LoginComponent",
};
</script>

<style scoped>
.class {
  /* background-image: linear-gradient(
      rgba(0, 0, 255, 0.5),
      rgba(255, 255, 0, 0.5)
    ),
    url("../../assets/img/books.jpg"); */
  display: flex;
  justify-content: center;
  text-align: start;
  margin-top: auto;
  margin-bottom: auto;
}
form {
  height: 520px;
  width: 400px;
  background-color: #2c3e50c2;
  /* position: absolute; */
  /* transform: translate(-50%, -50%);
  top: 50%;
  left: 50%; */
  border-radius: 10px;
  backdrop-filter: blur(10px);
  border: 2px solid rgba(255, 255, 255, 0.1);
  box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
  padding: 50px 35px;
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
  text-align: center;
}

label {
  display: block;
  margin-top: 30px;
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
  margin-top: 50px;
  width: 100%;
  background-color: #ffffff;
  color: #080710;
  padding: 15px 0;
  font-size: 18px;
  font-weight: 600;
  border-radius: 5px;
  cursor: pointer;
}
</style>

