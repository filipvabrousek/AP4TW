```html
<div id="group">


<div id="front">

</div>

<div id="back">

</div>
</div>



```


```css


    #group {
        display: grid;
        justify-items: center;
        margin-top: 180px;
    }

    #front {
        grid-area: 1/1;
       
    }

    #back {
        grid-area: 1/1;
    }

    #front, #back {
        width: 200px;
        height: 200px;
        background: linear-gradient(blue, green);
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 50%, rgba(0,212,255,1) 60%);
        background: radial-gradient(blue, #3498db);
        border-radius: 50%;
    }

    #back {
        background: transparent;
        box-shadow: 3px 3px 17px rgb(0, 0, 0);
    }

    #front {
        animation: rotate 3s infinite;
    }


    @keyframes rotate {
        0% {
            transform: rotate(0deg);
            border-radius: 20%;
            outline: 6px solid  rgb(0, 98, 128);
            outline-offset: 10px;
        }

        50% {
            transform: rotate(180deg);
            border-radius: 50%;
            outline: 6px dotted rgb(0, 98, 128);
            outline-offset: 60px;
        }

        100% {
            transform: rotate(360deg);
            border-radius: 20%;
            outline: 6px solid rgb(0, 98, 128);
            outline-offset: 10px;
        }
    }


    #back {
        animation: rotateBack 3s infinite;
    }


    @keyframes rotateBack {
        0% {
            transform: rotate(0deg);
            border-radius: 50%;
            outline: 10px dotted  rgb(54, 4, 182);
            outline-offset: 60px;
        }

        50% {
            transform: rotate(180deg);
            border-radius: 20%;
            outline: 10px solid rgb(64, 8, 160);
            outline-offset: 10px;
        }

        100% {
            transform: rotate(360deg);
            border-radius: 50%;
            outline: 10px dotted rgb(101, 10, 205);
            outline-offset: 60px;
        }
    }



     /*  @keyframes rotate {
        from {
            transform: rotate(0deg) skew(50deg);
        }

        to {
            transform: rotate(360deg) skew(50deg);
        }
    }*/

```

