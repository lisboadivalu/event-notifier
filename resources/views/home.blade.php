<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
    <h1>
        teste
    </h1>
</body>
</html>

<script>
const PusherJS = require('pusher-js');

let client = new PusherJS('app-key', {
    wsHost: '127.0.0.1',
    wsPort: 6001,
    forceTLS: false,
    encrypted: true,
    disableStats: true,
    enabledTransports: ['ws', 'wss'],
});

client.subscribe('notification').bind('notification', (notification) => {
    console.log(`${notification.message}`);
});
</script>
