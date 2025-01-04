<script>
    $(document).ready(function(){
        $('#displaybtn').click(function(e){
            e.preventDefault();
            $.ajax({
                method: "post",
                url: "ajax.php",
                data: $('#displaydata').serialize(),
                dataType: "html",
                success: function (response){
                    $('#messagedisplay').text(response);
                }
            });
        })
    });
</script>