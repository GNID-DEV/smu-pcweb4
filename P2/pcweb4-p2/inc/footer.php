<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<!-- Javascript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $("#hidebtn").click(function(){
    $("#hide").toggle(100);
    if($('#hidebtn').val() === 'Hide Pic'){
        $('#hidebtn').val("Show Pic");
    }else{
        $('#hidebtn').val("Hide Pic");
    }
    });
</script>


<!-- Footer -->
<footer class="fixed-bottom bg-primary text-muted text-center pt-2 pb-2">
    
        <small>DING JEN HAN | PCWEB04 - Project 02 </small>
    
</footer>



</body>

</html>
