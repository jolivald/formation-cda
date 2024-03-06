<script>

import { slide } from 'svelte/transition';
import { logged, username } from '../globalState.js';
import { fetchPOST } from '$lib/fetcher.js';

export let tab = 'login';

let loginUsername = '';
let loginPassword = '';
let registerUsername = '';
let registerPassword = '';

const changeTabTo = (newTab) => () => { tab = newTab; };

const submitLoginForm = () => {
  fetchPOST('login', {
    body: JSON.stringify({
      username: loginUsername,
      password: loginPassword
    })
  }).then(res => {
      if (!res.ok){ throw new Error(`submit login form error: ${res.status}`); }
      return res.json();
    })
    .then(data => {
      if (data.username){
        $logged =true;
        $username = data.username;
      }
    })
    .catch(err => console.error(err));
};

//TODO: implement submit register form
const submitRegisterForm = () => {

};

</script>


{#if $logged === false}
  <div id="login-register">
    {#if tab === 'login'}
      <fieldset transition:slide>
        <legend>Login</legend>
        <input type="text" placeholder="Username" bind:value={loginUsername}>
        <input type="password" placeholder="Password" bind:value={loginPassword}>
        <button on:click={submitLoginForm}>Login</button>
        <p>You don't have an account?<br>
          <a href={'#'} on:click={changeTabTo('register')}>Proceed to register</a>
        </p>
      </fieldset>
    {/if}
    {#if tab === 'register'}
      <fieldset transition:slide>
        <legend>Register</legend>
        <input type="text" placeholder="Username" bind:value={registerUsername}>
        <input type="password" placeholder="Password" bind:value={registerPassword}>
        <button>Register</button>
        <p>You are already registered?<br>
          <a href={'#'} on:click={changeTabTo('login')}>Proceed to login</a>
        </p>
      </fieldset>
    {/if}
  </div>
{/if}
