<div id='loader' style='display: none; position: fixed; top:0; left:0;right:0; min-height: 100%; text-align: center; opacity: 0.5; background: black;'>
    <div class="transform  rotateY">
        <div style="position: absolute; height: 100%; top: 0; bottom:0; left: 0; right:0; font-size: 8rem; font-weight: 800">loading</div>
    </div>
</div>

<style>
    #loader {
        position: relative;
        display: inline-block;
        height: 120px;
        margin: 0 2em 2em 0;
        opacity: .7;
        border-radius: 5px;
        background: #E4E1E4;
        -webkit-perspective: 400px;
        perspective: 400px;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }

    .transform {
        position: fixed;
        width: 100%;
        top: 40%;
        -webkit-animation: notransform 3s infinite;
        animation: notransform 3s infinite;
        transform-origin: center;
    }

    .rotateY {
        -webkit-transform: rotateY(360deg);
        -ms-transform: rotateY(360deg);
        transform: rotateY(360deg);
        animation-delay: 0;
    }
    @-webkit-keyframes notransform {
        100% {transform: none;}
    }
    @keyframes notransform {
        100% {transform: none;}
    }
</style>