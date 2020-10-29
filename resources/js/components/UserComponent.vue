<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">email</th>
                        <th scope="col">address</th>
                        <th scope="col">phone</th>
                        <th scope="col">website</th>
                        <th scope="col">company</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in users">
                        <th scope="row">{{ item.id }}</th>
                        <td>{{ item.name }}</td>
                        <td>{{ item.username }}</td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.address.street }},{{ item.address.suite }}</td>
                        <td>{{ item.phone }}</td>
                        <td>{{ item.website }}</td>
                        <td>{{ item.company.name }}</td>
                        <td><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal" @click="fetchUsersDetail(item.id)">Detail</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal fade" tabindex="-1" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Name:</label>
                                <label class="form-control" >{{user_detail.name}}</label>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Username:</label>
                                <label class="form-control" >{{user_detail.username}}</label>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Email:</label>
                                <label class="form-control" >{{user_detail.email}}</label>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Phone:</label>
                                <label class="form-control" >{{user_detail.phone}}</label>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Website:</label>
                                <label class="form-control" >{{user_detail.website}}</label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: [],
                user_detail: [],
            }
        },
        created() {
            this.fetchUsers()
        },
        methods: {
            // Fetch Articles
            fetchUsers() {
                const url = 'api/user';
                fetch(url)
                    .then(users => users.json())
                    .then(users => {
                        console.log(users);
                        this.users = users.data
                    }).catch(err => console.log(err))
            },
            fetchUsersDetail(id){
                console.log('ok');
                const url = 'api/user/'+id
                fetch(url)
                    .then(user_detail => user_detail.json())
                    .then(user_detail => {
                        this.user_detail = user_detail.data
                        console.log(user_detail);
                    }).catch(err => console.log(err))
            }
        }
    }

</script>
