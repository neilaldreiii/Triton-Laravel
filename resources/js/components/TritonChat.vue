<template>
    <div class="messages mr-3 ml-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tritonChat">
            Messages <span class="badge badge-light">9</span>
            <span class="sr-only">unread messages</span>
        </button>

        <div class="modal fade" id="tritonChat" tabindex="-1" role="dialog" aria-labelledby="tritonChatCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Triton Chat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li v-for="message in messages" :key="message.id">
                        {{ message.message }}
                    </li>
                </ul>
            </div>
            <div class="modal-footer" style="width: 100%">
                <form @submit.prevent="sendMessage" style="width: 100%;">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control" v-model="message.message">
                        <button type="submit" class="btn btn-outline-primary ml-2">Send</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            messages: [],
            message: {
                message: "",
                sender: this.user.name
            },
            current_user: this.user.id
        }
    },
    created() {
        this.fetchMessages();
        console.log(this.message.sender);
    },
    methods: {
        fetchMessages(page_url) {
            page_url = page_url || "/api/messages";

            fetch(page_url)
            .then(
                res => res.json()
            )
            .then(
                res => {
                    this.messages = res.data;
                }
            )
        },
        sendMessage() {
            
            fetch("/api/message", {
                method: "post",
                body: JSON.stringify(this.message),
                headers: {
                    'content-type': 'application/json'
                }
            }).then(
                res => res.json()
            ).then(
                data => {
                    this.clearForm();
                    alert("Message sent.");
                    this.fetchMessages();
                }
            ).catch(
                err => console.log(err)
            );
            
        },
        clearForm() {
            this.message.message = null
        }
    }
}
</script>

<style>

</style>
