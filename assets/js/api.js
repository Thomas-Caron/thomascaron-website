const apiBaseUrl = window.location.origin + '/api';

const api = {
    async get(route) {
        return api.request("GET", route);
    },

    async post(route, body = {}) {
        return api.request("POST", route, body);
    },

    async request(method, route, body = null) {
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

            if (!response.ok) {
                throw new Error(`API error : ${response.statusText}`);
            }

            return await response.json();
        } catch (error) {
            console.error("API error :", error);
            throw error;
        }
    },
};

export default api;