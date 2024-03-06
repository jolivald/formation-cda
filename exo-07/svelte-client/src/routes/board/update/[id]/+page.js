
import { fetchGET } from '$lib/fetcher';

/** @type {import('./$types').PageLoad} */
export async function load({ params }) {
	return await fetchGET(`board/update/${params.id}`).then(res => res.json());
};
