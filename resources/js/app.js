/*jslint browser:true*/
/*jslint esversion:6*/


require('./bootstrap');

// window.Vue = require('vue');
import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import Echo from 'laravel-echo';
window.io = require('socker-io-client');
window.EchoOpts = {
  broadcaster: 'socekt.io',
  host: window.location.hostname + ':6001'
};
// window.Echo = new Echo({});
// window.Echo.disconnect();

// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);
// Install Axios
Vue.use(VueAxios, axios);
const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

const app = new Vue({
    el: '#app',
    data: {
      MountableCollector: { //Allows this single file to be the only JS file for the whole site
        ChatApp: document.querySelector("#chat-container") == null ? false : true
      },
      ActiveUser: document.querySelector("meta[name='actveUserId']").getAttribute('content'),
      ActiveGuildId: null,
      ActiveGuildName: '',
      ActiveChat: null,
      messageComposer: '',
      messageProcessing: false,
      Guilds: [],
    },
    methods: {
      openGuild: function (event) {
        Vue.axios.get("/data/guild/"+event.target.id+"/messages").then(response=>{
          this.ActiveChat = response.data;
          this.ActiveGuildName = this.Guilds[event.target.id].display_name;
          window.Echo.join(`chat.${event.target.id}`);
        }).catch(error=>{
          // In the real world, this needs to be a better handler.
          console.log("Error", error);
        });
      },
      sendMessage: function (event) {
        Vue.axios.post("/data/guild/"+this.ActiveGuildId+"/send", {
          message: this.messageComposer
        }).then(response => {
          this.messageComposer = '';
        }).catch(error=>{
          // In the real world, this needs to be a better handler.
          console.log("Error", error);
        });
      }
    },
    mounted() {
      if (this.MountableCollector.ChatApp){
        Vue.axios.get("/data/guilds").then(response=>{
          console.log(this);
          this.Guilds = response.data;
        });
      }
    }
});
