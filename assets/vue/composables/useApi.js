import { ref } from 'vue';

const apiBaseUrl = window.location.origin;

const useApi = () => {
    const error = ref(null);

    const request = async (method, route, body = null) => {
        try {
            const options = {
                method,
                headers: {
                    "Content-Type": "application/json",
                },
            };

            if (body) {
                options.body = JSON.stringify(body);
            }

            const response = await fetch(`${apiBaseUrl}${route}`, options);

            if (response.status === 204) {
                return { success: true };
            }
            
            const data = await response.json();

            if (!response.ok) {
                error.value = data.message || 'Une erreur est survenue';
                return { success: false, ...data };
            }

            return data;
        } catch (err) {
            error.value = 'Erreur de communication avec l\'API';
            console.error("API error:", err);
            throw err;
        }
    };

    const get = async (route) => {
        return request("GET", route);
    };

    const post = async (route, body = {}) => {
        return request("POST", route, body);
    };

    const put = async (route, body = {}) => {
        return request("PUT", route, body);
    };

    const del = async (route) => {
        return request("DELETE", route);
    };

    return {
            error,
            get,
            post,
            put,
            del
    };
};

export default useApi;