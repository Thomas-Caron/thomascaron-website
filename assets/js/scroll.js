const scroll = {
    toTop() {
        window.scrollTo({ top: 0});
    },

    toSection(id) {
        const navbarHeight = 80;
        const element = document.getElementById(id);
        if (element) {
            const elementPosition = element.getBoundingClientRect().top + window.scrollY;
            window.scrollTo({ top: elementPosition - navbarHeight });
        }
    },
};

export default scroll;