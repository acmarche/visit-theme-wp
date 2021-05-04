import axios from '../../Axios';

/**
 * @param {string} categoryId
 * @returns {Promise}
 */
export function fetchFiltres( categoryId ) {
    const params = {};

    const url = `wp-json/hades/filtres/${categoryId}`;

    return axios.get( url, {
        params
    });
}

/**
 * @param {string} categoryId
 * @returns {Promise}
 */
export function fetchCategory( categoryId ) {
    const params = {};

    const url = `wp-json/wp/v2/categories/${categoryId}`;

    return axios.get( url, {
        params
    });
}
