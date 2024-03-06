<script>

import { logged } from '../globalState.js';
import MainMenu from './MainMenu.svelte';
import LoginRegister from './LoginRegister.svelte';
  
</script>
  
<h3>Kanban</h3>
<MainMenu />
<hr>
  
{#if !$logged}
  <LoginRegister tab={"login"} />
{:else}
  <slot></slot>
{/if}