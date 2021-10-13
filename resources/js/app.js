/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#userTable').delegate('#deletePost', 'click', function(){
        var url = $(this).attr('data-url');
        var q = confirm("Are you sure want to delete this?");
        if (q == true) {
            $.ajax({
                type: 'DELETE',
                url: url,
                dataType  : 'json',
                success: function(response){
                    if(response.type == "success"){
                        location.reload();
                    }
                },
                error: function (request, status, error) {
                    alert('Something went wrong, please try again later.')
                }
            }); 
        }
    });

    $('#commentTable').delegate('#deleteComment', 'click', function(){
        var url = $(this).attr('data-url');
        var q = confirm("Are you sure want to delete this?");
        if (q == true) {
            $.ajax({
                type: 'DELETE',
                url: url,
                dataType  : 'json',
                success: function(response){
                    if(response.type == "success"){
                        location.reload();
                    }
                },
                error: function (request, status, error) {
                    alert('Something went wrong, please try again later.')
                }
            }); 
        }
    });

    $('#usersTable').delegate('#deleteUser', 'click', function(){
        var url = $(this).attr('data-url');
        var q = confirm("Are you sure want to delete this?");
        if (q == true) {
            $.ajax({
                type: 'DELETE',
                url: url,
                dataType  : 'json',
                success: function(response){
                    if(response.type == "success"){
                        location.reload();
                    }
                },
                error: function (request, status, error) {
                    alert('Something went wrong, please try again later.')
                }
            }); 
        }
    });

});

