<?php
include('header.php');
$title=null;
?>
    <body>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container light-style">
                <!--<div class="container-xxl flex-grow-1 container-p-y">-->
                
        <?php
        include('sindebar.php');
        ?>
        <div class="layout-page">
            <?php
        include('headerbar.php');
        ?> 
        <?php
        if (isset($content)) {
            echo $content;
        }
        ?>
         </div>
    </div>
    <script>


</script>
    <?php include('footer.php') ?>
    

 </div>
</body>
</html>