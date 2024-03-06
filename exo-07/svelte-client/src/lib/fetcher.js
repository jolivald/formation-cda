const serverURI = 'http://localhost:3000';

const fetchOptions = {
  credentials: 'include',
  headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json'
  }
};

export const fetchGET = (endpoint, options) => fetch(
  `${serverURI}/${endpoint}`,
  Object.assign({}, fetchOptions, { method: 'GET' }, options)
);

export const fetchPOST = (endpoint, options) => fetch(
  `${serverURI}/${endpoint}`,
  Object.assign({}, fetchOptions, { method: 'POST' }, options)
);
