<script>
    $(document).ready(function(){
        $("#open_add").click(function(){
            $("#accept_add").show();
            $("#accept_edit").hide();
        })

        $("body").on("click","#open_edit",function(){
            $("#accept_add").hide()
            $("#accept_edit").show();
            var id = $(this).parents('tr').find('td').eq(0).text();
            var name = $(this).parents('tr').find('td').eq(1).text();
            var category = $(this).parents('tr').find('td').eq(2).text();
            var price = $(this).parents('tr').find('td').eq(3).text();
            $("#id").val(id);
            $('#name').val(name);
            $('#category').val(category);
            $('#price').val(price);
        })
    })
</script>
