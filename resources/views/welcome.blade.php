<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
    </head>
    <body>
        <h1>Welcome!</h1>
        
        <ul id="users">
            <li v-repeat="user: users">@{{ user.name  }}</li>
        </ul>

        <script src="https://js.pusher.com/3.1/pusher.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.12.9/vue.min.js"></script>
        <script>
            // (function() {
            //     var pusher = new Pusher('3975c95bee8862837bdf', {
            //         encrypted: true
            //     });

            //     var channel = pusher.subscribe('test');

            //     channel.bind('App\\Events\\UserHasRegistered', function(data) {
            //       console.log(data);
            //     });
            // })();

            new Vue({
                el: '#users',
                data: {
                    users: []
                },
                ready: function() {
                    var pusher = new Pusher('3975c95bee8862837bdf', {
                        encrypted: true
                    });

                    pusher.subscribe('test')
                          .bind('App\\Events\\UserHasRegistered', this.addUser);
                },

                methods: {
                    addUser: function(user) {
                        this.users.push(user);
                    }
                }
            });          
        </script>
    </body>
</html>
