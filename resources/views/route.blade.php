<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style>
    .router-link-active {
        background: black;
        color: white;
    };
</style>
<body>
    <div id="app">
    <p>
        <a href="/test">Test Href</a>
    </p>
    <p>
        <router-link to="/test">Test Router</router-link>
    <p>
    <p>
        <router-link to="/bread1">Test Bread1</router-link>
    </p>
    <p>
        <router-link to="/bread2">Test Bread2</router-link>
    </p>
    vue-router想要外帶<input type="text" v-model="key">
    <p>
        <router-link :to="params">送出</router-link>
    </p>
    <br/><br/>
    <router-view></router-view>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/route.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{mix('/css/app.css')}}">
</body>

</html>