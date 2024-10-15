<button id="meuBotao">Clique para mostrar</button>
<div id="minhaDiv" style="display: none;">
    Este conteúdo estava escondido!
</div>
<style>
    #minhaDiv {
        padding: 20px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
    }

</style>
<script>
    document.getElementById("meuBotao").addEventListener("click", function() {
        var div = document.getElementById("minhaDiv");
        if (div.style.display === "none") {
            div.style.display = "block";
        }
    });

</script>