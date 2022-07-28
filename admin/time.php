<div id="time" class="time">
    <?php
echo "<h2>".date("Y-m-d H:i:s")."</h2>";
?>
</div>


<script src="js/jquery.js"></script>
<script>
$(document).ready(function(){
    setInterval(function(){
        $('#time').load('time.php')
    }, 1000);
    
});

</script>

<style>
.time{
    text-align: center;
}

</style>