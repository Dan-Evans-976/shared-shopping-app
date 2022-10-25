<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Completed</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in listData.list_items">
                    <td>
                        {{ item.name }}
                    </td>
                    <td>
                        {{ item.description }}
                    </td>
                    <td>
                        <input
                            class="form-check-input"
                            type="checkbox"
                            v-model="item.completed"
                            v-bind:true-value="1"
                            v-bind:false-value="0"
                            @change="check(index)">
                    </td>
                    <td>
                        <div class="btn btn-danger btn-sm" @click="deleteItem(index)">Delete</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import 'axios';

    export default {
        data(){
            return {
                listData: window.listData,
            }
        },
        methods: {
            deleteItem(index){
                axios({
                    method: 'delete',
                    url: '/list/'+this.listData.id+'/list-item/'+this.listData.list_items[index].id,
                })
                .then((response) => {
                    this.listData = response.data.data;
                });
            },
            check(index){
                let listItem = this.listData.list_items[index];
                axios({
                    method: 'post',
                    url: '/list/'+this.listData.id+'/list-item/'+listItem.id+'/'+listItem.completed,
                })
                .then((response) => {
                    this.listData = response.data.data;
                });
            }
        }
    }
</script>
