<div id="preloader_malc">
    <div>
        <img src="/images/Load.gif">
        <img src="/images/Loading.gif">
    </div>
</div>

<style type="text/css">
    #preloader_malc {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #FFFFFF;
        z-index: 99
    }

    #preloader_malc div {
        background: #FFFFFF;
        width: 300px;
        height: 400px;
        line-height: 40px;
        border-radius: 8px;
        font-family: arial;
        font-size: 25px;
        color: #FFFFFF;
        text-align: center;
        box-shadow: 0 2px 6px #FFFFFF;
        position: fixed;
        z-index: 999;
        top: 0;
        left: 0;
        right: 0;
        bottom: 10;
        margin: auto
    }
</style>

<script type="text/javascript">
    window.onload = function () {
        setTimeout(function () {
            document.getElementById("preloader_malc").style.display = "none";
        }, 2000);
    };
</script>
