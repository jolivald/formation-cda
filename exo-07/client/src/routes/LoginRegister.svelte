<script>

export let tab = 'login';

let loginUsername = '';
let loginPassword = '';

const changeTabTo = (newTab) => () => { tab = newTab; };

const submitLoginForm = () => {
  fetch('http://localhost:3000/login', {
    method: 'POST',
    credentials: 'include',
    body: JSON.stringify({
      username: loginUsername,
      password: loginPassword
  })
  }).then(res => {
    if (res.ok){ alert('isoké'); }
  });
};

const submitRegisterForm = () => {

};

</script>

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
      <input type="text" placeholder="Username">
      <input type="password" placeholder="Password">
      <button>Register</button>
      <p>You are already registered?<br>
        <a href="#noop" on:click={changeTabTo('login')}>Proceed to login</a>
      </p>
    </fieldset>
  {/if}
</div>