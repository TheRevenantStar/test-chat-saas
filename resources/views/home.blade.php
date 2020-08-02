@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div id="chat-container" class="row">
        <div id="guilds" class="col-12 col-lg-4 col-md-3 col-sm-12">
          <b-card no-body header="{{ __('Chats') }}">
          <b-list-group flush>
            <b-list-group-item class="flex-column align-items-start p-1">
              <div class="d-flex w-100">
                <b-input-group prepend="New Chat">
                  <b-form-input></b-form-input>
                </b-input-group>
              </div>
            </b-list-group-item>
            <b-list-group-item v-for="guild in Guilds" href="#" v-bind:key="guild.id" v-model="guild.displayName"></b-list-group-item>
          </b-list-group>
        </div>
        <div id="messages" class="col-12 col-lg-8 col-md-6 col-sm-12">
          <b-card :header="ActiveChat" v-show="ActiveChat != null">
              <b-input-group v-slot:footer>
                <b-form-input placeholder="Message" id="messageComposer" v-model="messageComposer"></b-form-input>
                <b-input-group-append>
                  <b-button variant="primary" type=submit :disabled="messageComposer.length <= 0">Send</b-button>
                </b-input-group-append>
              </b-input-group>
          </b-card>
        </div>
    </div>
</div>
@endsection
