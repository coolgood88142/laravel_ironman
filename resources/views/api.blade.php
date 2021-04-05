<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
</head>

<body>
    <div class="container">
        <form  method="POST" id="userForm">
            {{ csrf_field() }}
            <div v-cloak id="app" class="content">
                <h2 id="title" class="text-center text-black font-weight-bold" style="margin-bottom:20px;">@{{ title }}</h2>
                <div style="text-align:right">
                    <input type="button" id="btn_insert" class="btn btn-primary" @click="runApi()" value="執行" />
                </div><br/>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>標題</th>
                            <th>內容</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--用checkbox可以做到刪除多個-->
                        <tr v-for="article in articles">
                            <td>@{{ article.id }}</td>
                            <td>@{{ article.title }}</td>
                            <td>@{{ article.content }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{mix('js/api.js')}}"></script>
</body>

</html>