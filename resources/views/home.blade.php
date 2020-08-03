@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div id="chat-container" class="row">
    <div id="guilds" class="col-12 col-md-3 col-sm-12">
      <b-card no-body>
        <template v-slot:header>
          <h4 class="mb-0">{{ __('Chats') }}</h6>
        </template>
        <b-list-group flush>
          <b-list-group-item class="flex-column align-items-start p-1">
            <div class="d-flex w-100">
              <b-input-group prepend="New Chat">
                <b-form-input></b-form-input>
              </b-input-group>
            </div>
          </b-list-group-item>
          <b-list-group-item
            v-for     ="guild in Guilds"
            href      ="#"
            v-bind:key="guild.id"
            v-bind:id ="guild.id"
            v-on:click="openGuild"
            >
            <b>@{{guild.display_name}}</b>
          </b-list-group-item>
        </b-list-group>
      </div>
      <div id="messages" class="col-12 col-md-9 col-sm-12">
        <b-card v-show="ActiveChat != null">
          <template v-slot:header>
            <h4 class="mb-0">@{{ActiveGuildName}}</h6>
          </template>
          <b-card-body>
            <div class="mb-1"
              v-for     ="message in ActiveChat"
              v-bind:key="message.id"
              v-bind:id ="message.id"
              >
              <p class="font-weight-bold text-muted">@{{ message.user.display_name }}</p>
              <p class="msg-msg">@{{ message.content }}</p>
            </div>
          </b-card-body>
          <template v-slot:footer>
            <b-input-group>
              <b-form-input placeholder="Message" id="messageComposer" v-model="messageComposer"></b-form-input>
              <b-input-group-append>
                <b-button
                  variant="primary"
                  type=submit
                  :disabled="messageComposer.length <= 0 && !messageProcessing"
                  >
                  Send
                </b-button>
              </b-input-group-append>
            </b-input-group>
          </template>
        </b-card>
      </div>
    </div>
</div>
@endsection
