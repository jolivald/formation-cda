<script>

import { fetchPOST } from '$lib/fetcher';
import { goto } from '$app/navigation';

/** @type {import('./$types').PageData} */
export let data; 

const { _id, title, updatedAt } = data.board;

const handleFormSubmit = event => {
  event.preventDefault();
  const formData = Object.fromEntries(new FormData(event.target).entries());
  fetchPOST('board/update', { body: JSON.stringify(formData) })
    .then(res => res.json())
    .then(boards => {
      console.log('boards', boards);
      goto('/board', {
        //replaceState: true,
        state: boards
      })
    });
};

</script>


<form on:submit={handleFormSubmit}>
  <input type="hidden" name="id" value="{data.board._id}">
  <section>
    <label for="title">Title</label>
    <input id="title" name="title" type="text" required value="{data.board.title}">
  </section>
  <p>Last update: {data.board.updatedAt}</p>
  <button type="submit">Update</button>
</form>
