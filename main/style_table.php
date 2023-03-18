<style>
    table {
        border: 1px solid black;
        font-size: 12px;
        font-family: Arial;
    }

    th {
        background:darkslategrey;
        padding: 10px;
        color:white;
    }

    td {
        padding: 10px;
    }

    .current-row {
        background-color: coral;
    }

    .current-col {
        /* background-color: cyan; */
    }
</style>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $('.table-row').hover(function() {
                $(this).addClass('current-row');
            },
            function() {
                $(this).removeClass('current-row');
            });

        $("th").hover(function() {
            var index = $(this).index();
            $("th.table-header, td").filter(":nth-child(" + (index + 1) + ")")
                .addClass("current-col");
        }, function() {
            var index = $(this).index();
            $("th.table-header, td").removeClass("current-col");
        });
    });
</script>