<template>
  <div class="mt-3">
      <!-- <div class="card-body">
          <div class="card-body">
              <div class="text-center" v-for="(active, index) in actives" :key="index">
                  <p><span class="font-weight-bold">{{ active.user }} {{ active.mode }}</span></p>
              </div>
              <div class="messages clearfix" v-for="(msg, index) in messages" :key="index">
                  <p class="float-right bg-success p-2" style="border-radius: 25px;" v-if="msg.user == user.first_name">{{ msg.message }}</p>
                  <p class="float-left p-2 bg-primary" style="border-radius: 25px;"  v-else><span class="font-weight-bold">{{ msg.user }}: </span>{{ msg.message }}</p>
              </div>

          </div>
      </div>
      <div class="card-footer">
          <form @submit.prevent="sendMessage">
              <div class="gorm-group">
                  <label for="user">User: {{user.first_name}}</label>
              </div>
              <div class="gorm-group pb-3">
                  <label for="message">Message:</label>
                  <input type="text" v-model="message" class="form-control">
              </div>
              <button type="submit" class="btn btn-success">Send</button>
          </form>
      </div> -->
    <div class="container-fluid h-100">
      <div class="row justify-content-center h-100">
        <div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
          <div class="card-header">
            <div class="input-group">
              <input type="text" placeholder="Search..." name="" class="form-control search">
              <div class="input-group-prepend">
                <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
              </div>
            </div>
          </div>
          <div class="card-body contacts_body">
            <ui class="contacts">
            <li class="active">
              <div class="d-flex bd-highlight">
                <div class="img_cont">
                  <img src="" class="rounded-circle user_img">
                  <span class="online_icon"></span>
                </div>
                <div class="user_info">
                  <span>Khalid</span>
                  <p>Kalid is online</p>
                </div>
              </div>
            </li>
            <li>
              <div class="d-flex bd-highlight">
                <div class="img_cont">
                  <img src="" class="rounded-circle user_img">
                  <span class="online_icon offline"></span>
                </div>
                <div class="user_info">
                  <span>Taherah Big</span>
                  <p>Taherah left 7 mins ago</p>
                </div>
              </div>
            </li>
            <li>
              <div class="d-flex bd-highlight">
                <div class="img_cont">
                  <img src="" class="rounded-circle user_img">
                  <span class="online_icon"></span>
                </div>
                <div class="user_info">
                  <span>Sami Rafi</span>
                  <p>Sami is online</p>
                </div>
              </div>
            </li>
            <li>
              <div class="d-flex bd-highlight">
                <div class="img_cont">
                  <img src="" class="rounded-circle user_img">
                  <span class="online_icon offline"></span>
                </div>
                <div class="user_info">
                  <span>Nargis Hawa</span>
                  <p>Nargis left 30 mins ago</p>
                </div>
              </div>
            </li>
            <li>
              <div class="d-flex bd-highlight">
                <div class="img_cont">
                  <img src="" class="rounded-circle user_img">
                  <span class="online_icon offline"></span>
                </div>
                <div class="user_info">
                  <span>Rashid Samim</span>
                  <p>Rashid left 50 mins ago</p>
                </div>
              </div>
            </li>
            </ui>
          </div>
          <div class="card-footer"></div>
        </div></div>
        <div class="col-md-8 col-xl-6 chat">
          <div class="card">
            <div class="card-header msg_head">
              <div class="d-flex bd-highlight">
                <div class="img_cont">
                  <img src="" class="rounded-circle user_img">
                  <span class="online_icon"></span>
                </div>
                <div class="user_info">
                  <span>Chat with Khalid</span>
                  <p>1767 Messages</p>
                </div>
                <div class="video_cam">
                  <span><i class="fas fa-video"></i></span>
                  <span><i class="fas fa-phone"></i></span>
                </div>
              </div>
              <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
              <div class="action_menu">
                <ul>
                  <li><i class="fas fa-user-circle"></i> View profile</li>
                  <li><i class="fas fa-users"></i> Add to close friends</li>
                  <li><i class="fas fa-plus"></i> Add to group</li>
                  <li><i class="fas fa-ban"></i> Block</li>
                </ul>
              </div>
            </div>
            <div class="card-body msg_card_body">
              <div class="d-flex mb-4" v-for="(msg, index) in messages" :key="index" v-bind:class="{ 'justify-content-start': (msg.user != user.first_name), 'justify-content-end': (msg.user == user.first_name) }">
                <div class="img_cont_msg" v-show="msg.user != user.first_name">
                  <img src="https://img.icons8.com/doodle/48/000000/user.png" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer" v-bind:class="{ 'msg_cotainer': (msg.user != user.first_name), 'msg_cotainer_send': (msg.user == user.first_name) }">
                  <b>{{ msg.user }}</b>: {{ msg.message }}
                  <span class="msg_time" v-bind:class="{ 'msg_time': (msg.user != user.first_name), 'msg_time_send': (msg.user == user.first_name) }">{{ msg.time }}</span>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <form @submit.prevent="sendMessage">
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                </div>
                <input name="chat" class="form-control type_msg" placeholder="Type your message..." v-model="message">
                <div class="input-group-append">
                  <button type="submit" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    $(document).ready(function(){
$('#action_menu_btn').click(function(){
  $('.action_menu').toggle();
});
  });
import io from 'socket.io-client';
export default {
    data() {
        return {
            user: [],
            message: '',
            messages: [],
            actives: [],
            socket : io('localhost:3001'),
        }
    },
    methods: {
        sendMessage(e) {
            var app = this;
            e.preventDefault();
            if (!app.message == '')
              app.socket.emit('SEND_MESSAGE', {
                user: app.user.first_name,
                message: app.message,
                time: new Date().toLocaleTimeString()
              });
            app.message = ''
        }
    },
    mounted() {
        var app = this;
        app.user = app.$user;
        app.socket.emit('JOIN', {
          user: app.user.first_name,
          mode: 'is joined',
        });
        app.socket.on('JOINED', (data) => {
            app.actives = [...app.actives, data];
        });
        app.socket.on('MESSAGE', (data) => {
            app.messages = [...app.messages, data];
            // you can also do this.messages.push(data)
        });
    }
}
</script>

<style>

    /*.chat{
      margin-top: auto;
      margin-bottom: auto;
    }*/
    .card{
      height: 500px;
      border-radius: 15px !important;
      background-color: rgba(0,0,0,0.4) !important;
    }
    .contacts_body{
      padding:  0.75rem 0 !important;
      overflow-y: auto;
      white-space: nowrap;
    }
    .msg_card_body{
      overflow-y: auto;
    }
    .card-header{
      border-radius: 15px 15px 0 0 !important;
      border-bottom: 0 !important;
    }
   .card-footer{
    border-radius: 0 0 15px 15px !important;
      border-top: 0 !important;
  }
    .container{
      align-content: center;
    }
    .search{
      border-radius: 15px 0 0 15px !important;
      background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color:white !important;
    }
    .search:focus{
         box-shadow:none !important;
           outline:0px !important;
    }
    .type_msg{
      background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color:white !important;
      height: 60px !important;
      overflow-y: auto;
    }
      .type_msg:focus{
         box-shadow:none !important;
           outline:0px !important;
    }
    .attach_btn{
  border-radius: 15px 0 0 15px !important;
  background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color: white !important;
      cursor: pointer;
    }
    .send_btn{
  border-radius: 0 15px 15px 0 !important;
  background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color: white !important;
      cursor: pointer;
    }
    .search_btn{
      border-radius: 0 15px 15px 0 !important;
      background-color: rgba(0,0,0,0.3) !important;
      border:0 !important;
      color: white !important;
      cursor: pointer;
    }
    .contacts{
      list-style: none;
      padding: 0;
    }
    .contacts li{
      width: 100% !important;
      padding: 5px 10px;
      margin-bottom: 15px !important;
    }
  .active{
      background-color: rgba(0,0,0,0.3);
  }
    .user_img{
      height: 70px;
      width: 70px;
      border:1.5px solid #f5f6fa;
    
    }
    .user_img_msg{
      height: 40px;
      width: 40px;
      border:1.5px solid #f5f6fa;
    
    }
  .img_cont{
      position: relative;
      height: 70px;
      width: 70px;
  }
  .img_cont_msg{
      height: 40px;
      width: 40px;
  }
  .online_icon{
    position: absolute;
    height: 15px;
    width:15px;
    background-color: #4cd137;
    border-radius: 50%;
    bottom: 0.2em;
    right: 0.4em;
    border:1.5px solid white;
  }
  .offline{
    background-color: #c23616 !important;
  }
  .user_info{
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 15px;
  }
  .user_info span{
    font-size: 20px;
    color: white;
  }
  .user_info p{
  font-size: 10px;
  color: rgba(255,255,255,0.6);
  }
  .video_cam{
    margin-left: 50px;
    margin-top: 5px;
  }
  .video_cam span{
    color: white;
    font-size: 20px;
    cursor: pointer;
    margin-right: 20px;
  }
  .msg_cotainer{
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 10px;
    border-radius: 25px;
    background-color: #82ccdd;
    padding: 10px;
    position: relative;
  }
  .msg_cotainer_send{
    margin-top: auto;
    margin-bottom: auto;
    margin-right: 10px;
    border-radius: 25px;
    background-color: #78e08f;
    padding: 10px;
    position: relative;
  }
  .msg_time{
    position: absolute;
    left: 0;
    bottom: -15px;
    color: rgba(255,255,255,0.5);
    font-size: 10px;
  }
  .msg_time_send{
    position: absolute;
    right:0;
    bottom: -15px;
    color: rgba(255,255,255,0.5);
    font-size: 10px;
  }
  .msg_head{
    position: relative;
  }
  #action_menu_btn{
    position: absolute;
    right: 10px;
    top: 10px;
    color: white;
    cursor: pointer;
    font-size: 20px;
  }
  .action_menu{
    z-index: 1;
    position: absolute;
    padding: 15px 0;
    background-color: rgba(0,0,0,0.5);
    color: white;
    border-radius: 15px;
    top: 30px;
    right: 15px;
    display: none;
  }
  .action_menu ul{
    list-style: none;
    padding: 0;
  margin: 0;
  }
  .action_menu ul li{
    width: 100%;
    padding: 10px 15px;
    margin-bottom: 5px;
  }
  .action_menu ul li i{
    padding-right: 10px;
  
  }
  .action_menu ul li:hover{
    cursor: pointer;
    background-color: rgba(0,0,0,0.2);
  }
  @media(max-width: 576px){
  .contacts_card{
    margin-bottom: 15px !important;
  }
  }
</style>