<script>

import { logged, username } from '../globalState.js';
import { fetchGET } from '$lib/fetcher.js';


const handleClickLogout = event => {
  fetchGET('logout').then(res => {
    $logged = false;
    $username = '';
  });

};


</script>

<ul>
  <li><a href="/">Home</a></li>
  <li><a href="/board">Boards</a></li>
  <li><a href="/card">Cards</a></li>
  {#if $logged}
  <li><a href={'#'} on:click={handleClickLogout}>Logout ({$username})</a></li>
  {/if}
</ul>
