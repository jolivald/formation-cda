import { fetchGET } from '$lib/fetcher.js';

export const ssr = false;

/** @type {import('./$types').PageLoad} */
export async function load({ params }) {
	return await fetchGET('board').then(res => res.json());
};
