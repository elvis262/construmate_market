<div id="header-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @for($i=0;$i<count($informations);$i++)
            <div @class(['carousel-item', 'active' => $i == 0]) style="height: 410px;">
                <img class="img-fluid" src="{{env("ADMIN_LOCATION")."storage/".$informations[$i]['image']}}" alt="Image">
            </div>
        @endfor
    </div>
    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
        </div>
    </a>
    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
        </div>
    </a>
</div> 