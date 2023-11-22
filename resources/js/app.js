import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

// import ExampleComponent from './components/ExampleComponent.vue';
// app.component('example-component', ExampleComponent);

import UserStatusUpdate from './components/UserStatusUpdate.vue';
app.component('user-status-updater', UserStatusUpdate);

import GuiaStatusUpdate from './components/GuiaStatusUpdate.vue';
app.component('guia-status-updater', GuiaStatusUpdate);

import PerfilStatusUpdate from './components/PerfilStatusUpdate.vue';
app.component('perfil-status-updater', PerfilStatusUpdate);

import datatable from './components/datatable.vue';
app.component('datatable', datatable);

import Partials from './components/Partials.vue';
app.component('partials', Partials);

import VideoModal from './components/VideoModal.vue';
app.component('video-modal', VideoModal);

app.mount('#app');
