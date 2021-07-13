<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative min-h-screen sm:items-center py-4 sm:pt-0">
            <div class="p-4">
                <input type="button" class="rounded-lg bg-gray-300 p-2" value="Business Tasks" onclick="taskPlan('business')">

                <input type="button" class="rounded-lg bg-gray-300 p-2" value="IT Tasks" onclick="taskPlan('it')">
            </div>

            <div class="table-area mt-4 p-4">
                <p class="message"></p>

                <table class="border-collapse border border-green-800 mt-2">
                    <thead></thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    function taskPlan(type) {
        $.get('/api/tasks/planning/' + type, function (response) {
            let message = 'Planlamaya göre ' +response.max_week + ' hafta içerisinde tüm işler tamamlanacaktır.';
            let tableRows = '';
            let headerRow = '<td class="border border-green-600">Developer</td>';

            for (let i = 0; i < response.max_week; i++) {
                headerRow += '<td class="border border-green-600">Hafta '+(i + 1)+'</td>';
            }

            $(response.plan).each(function(index, plan) {
                let row = '<tr>';
                row += '<td>' + plan.title + '</td>';

                for (let i = 0; i < response.max_week; i++) {
                    const weekPlan = plan.weeks[i];
                    if (weekPlan) {
                        const tasks = Object.values(weekPlan.tasks).map((obj) => obj.title).join(', ');
                        row += '<td class="border border-green-600">' + tasks + '</td>';
                    } else {
                        row += '<td class="border border-green-600">&nbsp;</td>';
                    }
                }

                row += '</tr>';

                tableRows += row;
            });

            $('.table-area table thead').html(headerRow)
            $('.table-area table tbody').html(tableRows)
            $('.table-area .message').text(message)
        });
    }
</script>
