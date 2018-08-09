
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#surveyapp',
    data: {
        api_url:'http://localhost/curotest/public/api/surveys',
        app_url: 'http://localhost/curotest/public/',
        surveys: [],
        users: [],
        pagination:{},
    },

    methods: {
        makePagination: function(meta, links){
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page: links.next,
                prev_page: links.prev,
            }
            this.pagination = pagination;
        },
        getUsers: function () {
            axios.get(this.app_url + 'users')
                .then(res => {
                    //alert('success');
                this.users = res.data;
            })
            .catch(err => {
                alert('there was some error fetching users');
            });
        },
        fetchSurveys: function(page_url){
            page_url = page_url || this.api_url;
            axios.get(page_url).then(res => {
                res = res.data;
            this.surveys = res.data;
            this.makePagination(res.meta, res.links);
        })
            .catch(err => console.log(err));
        },
        deleteSurvey: function (id) {
            if(confirm("are you sure?")) {
                axios.delete(this.api_url + '/' + id)
                    .then(function(res){
                        //alert('deleted');
                    })
                    .catch(function(err){
                        alert('There was some problem!');
                    });
                this.fetchSurveys();
            }
        },

    },
    created:function(){
        this.fetchSurveys();
        this.getUsers();
    }
});
