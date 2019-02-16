<template>
    <div class="messages mr-3 ml-3">
        <button type="button" @click="scrollLast" class="btn btn-primary" data-toggle="modal" data-target="#tritonChat">
            Messages <span class="badge badge-light">{{ messages.length }}</span>
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
            <div class="modal-body" id="msgBody">
                <ul>
                    <li v-for="message in messages" :key="message.id">
                        <div v-if="message.sender_id == current_user" class="your-message">
                            <p>{{ message.message }}</p>
                        </div>
                        <div v-else class="other-user">
                            <h1>{{ message.sender }}</h1>
                            <p>{{ message.message }}</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="modal-footer" style="width: 100%">
                <form @submit.prevent="sendMessage" style="width: 100%;">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control" v-model="newMessage.message">
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
            newMessage: {
                message: "",
                sender: this.user.name,
                sender_id: this.user.id
            },
            current_user: this.user.id,
        }
    },
    created() {
        this.fetchMessages();
    },
    methods: {
        fetchMessages(page_url) {

            // var timer = setTimeout(this.fetchMessages, 1000);

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
                body: JSON.stringify(this.newMessage),
                headers: {
                    'content-type': 'application/json'
                }
            }).then(
                res => res.json()
            ).then(
                data => {
                    this.clearForm();
                    this.fetchMessages();
                }
            ).catch(
                err => console.log(err)
            );
            
        },
        clearForm() {
            this.newMessage.message = null
        }
    }
}
</script>

<style scoped>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
li {
    margin: 10px;
}
p {
    margin: 0;
}
h1 {
    margin: 5px;
    font-size: 11pt;
}
.other-user {
    display: inline-block;
    text-align: left;
}
.other-user p {
    display: inline-block;
    background: #0066FFcc;
    border-radius: 50px;
    padding: 5px 10px;
    color: #FFF;
}
.your-message {
    text-align: right;
}
.your-message p {
    display: inline-block;
    background: rgb(153, 153, 153);
    border-radius: 50px;
    padding: 5px 10px;
    color: #FFF;
}
#msgBody {
    height: 400px; 
    overflow: auto;
}
</style>
