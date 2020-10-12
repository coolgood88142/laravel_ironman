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
                    模糊查詢
                    </h2>
                    <search-fuzzy></search-fuzzy>
                </form>
            </div>
        </div>
        <script src="{{mix('js/app.js')}}"></script>
        <script src="{{mix('js/search.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{mix('/css/app.css')}}">
    </body>

</html>