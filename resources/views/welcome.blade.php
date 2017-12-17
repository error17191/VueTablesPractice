<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div id="app">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> @lang('backend.pages.all_news')
                <div class="pull-right">
                    <button class="btn btn-primary">Add</button>
                </div>
            </div>
            <div class="panel-body">
                <data-table
                        :columns="[
                            {
                                name: 'first_name',
                                title: 'الإسم الأول',
                                size: 'medium'
                            },
                            {
                                name: 'last_name',
                                title: 'الإسم الثاني',
                                size: 'medium'
                            },
                            {
                                name: 'age',
                                title: 'السن',
                                size: 'medium'
                            },
                            {
                                name: 'join_date',
                                title: 'تاريخ الإلتحاق',
                                size: 'medium'
                            },
                            {
                                name: 'country_name',
                                title: 'اسم البلد',
                                size: 'medium'
                            },
                            {
                                name: 'city_name',
                                title: 'اسم المدينة',
                                size: 'medium'
                            },
                        ]"
                        :url="'{{route('users')}}'"
                ></data-table>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
