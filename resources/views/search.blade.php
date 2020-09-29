<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Access-Control-Allow-Origin" content="*" />
    </head>

    <body>
        <div class="container">
            <div v-cloak id="app" class="content">
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <h2 
                        id="title" 
                        class="text-center text-black font-weight-bold" 
                        style="margin-bottom:20px;">
                    @{{ title }}
                    </h2>
                    <fuzzy-search></fuzzy-search>
                </form>
            </div>
        </div>
        <script src="{{mix('js/app.js')}}"></script>
        <script src="{{mix('js/search.js')}}"></script>
    </body>

</html>