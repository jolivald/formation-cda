<script>

/** @type {import('./$types').PageData} */
export let data;
import { goto } from '$app/navigation';


</script>



<dl>
  {#each data.boards as board}
    <dt><strong>{board.title}</strong> - {board.cards.length} card(s)</dt>
    <dd>
      <button on:click={() => goto(`/board/update/${board._id}`)}>Edit</button>
      <button on:click={() => goto(`/board/delete/${board._id}`)}>Delete</button>
    </dd>
    <dd>Last update: {board.updatedAt}</dd>
  {/each}
</dl>

