import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

// import './echo';

import Echo from 'laravel-echo';
 
import Pusher from 'pusher-js';

console.log('test message');


window.Pusher = Pusher;
 
window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? "mt1",
    wsHost: import.meta.env.VITE_PUSHER_HOST
        ? import.meta.env.VITE_PUSHER_HOST
        : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? "https") === "https",
    enabledTransports: ["ws", "wss"],
});

//public channel
// window.Echo.channel('new_event_channel')
// .listen('NewEventAdded', (e) => {
//     console.log(e);
  
// })


// PRIVATE CHANNEL
window.Echo.private(`new_event_channel`)
    .listen(".App\\Events\\NewEventAdded", (e) => {
        console.log(e);
        // $(".notificationsIcon").load(" .notificationsIcon > *");
        // $("#notificationsModal").load(" #notificationsModal > *");
    });
    

// PRIVATE CHANNEL
window.Echo.private(`new_course_channel`)
    .listen(".App\\Events\\NewCourseEvent", (e) => {
        console.log(e);
        
    });


