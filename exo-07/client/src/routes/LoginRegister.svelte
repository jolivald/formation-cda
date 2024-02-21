<script>

export let tab = 'login';

let loggedIn = false;
let loggedUsername = null;
let loggedRole = null;
let loginUsername = '';
let loginPassword = '';
let registerUsername = '';
let registerPassword = '';

const changeTabTo = (newTab) => () => { tab = newTab; };

const submitLoginForm = () => {
  fetch('http://localhost:3000/login', {
    method: 'POST',
    credentials: 'include',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      username: loginUsername,
      password: loginPassword
    })
  }).then(res => {
      if (!res.ok){ throw new Error(`submit login form error: ${res.status}`); }
      return res.json();
    })
    .then(json => JSON.parse(json))
    .then(data => {
      if (data.username){
        loggedIn = true;
        loggedUsername = data.username;
        loggedRole = data.role;
      }
    })
    .catch(err => console.error(err));
};

const submitRegisterForm = () => {

};

</script>

{#if loggedIn === true}
  <p>Welcome back {loggedUsername} lvl {loggedRole}</p>
{/if}
{#if loggedIn === false}
  <div id="login-register">
    {#if tab === 'login'}
      <fieldset>
        <legend>Login</legend>
        <input type="text" placeholder="Username" bind:value={loginUsername}>
        <input type="password" placeholder="Password" bind:value={loginPassword}>
        <button on:click={submitLoginForm}>Login</button>
        <p>You don't have an account?<br>
          <a href="#noop" on:click={changeTabTo('register')}>Proceed to register</a>
        </p>
      </fieldset>
    {/if}
    {#if tab === 'register'}
      <fieldset>
        <legend>Register</legend>
        <input type="text" placeholder="Username" bind:value={registerUsername}>
        <input type="password" placeholder="Password" bind:value={registerPassword}>
        <button>Register</button>
        <p>You are already registered?<br>
          <a href="#noop" on:click={changeTabTo('login')}>Proceed to login</a>
        </p>
      </fieldset>
    {/if}
  </div>
{/if}
