
const ajaxLoadMore = () => {

    const button = document.querySelector('.load-more');

    if (typeof (button) !== 'undefined' && button !== null) {
        button.addEventListener('click', (e) => {

            let current_page = document.querySelector('.posts-list').dataset.page;
            let max_pages = document.querySelector('.posts-list').dataset.max;

            let params = new URLSearchParams();
            params.append('action', 'load_more_posts');
            params.append('current_page', current_page);
            params.append('max_pages', max_pages);

            axios.post('/wp-admin/admin-ajax.php', params)
                .then(res =>{

                    let posts_lists = document.querySelector('.posts-list');

                    posts_lists.innerHTML += res.data.data;

                    document.querySelector('.posts-list').dataset.page++;

                    if (document.querySelector('.posts-list').dataset.page === document.querySelector('.posts-list').dataset.max) {
                        button.parentNode.removeChild(button);
                    }

                    
                })

        });
    }
}

ajaxLoadMore();

