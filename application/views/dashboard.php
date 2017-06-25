<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div id="cardbox1">
            <div class="statistic-box">
                <i class="fa fa-user-plus fa-3x"></i>
                <div class="counter-number pull-right">
                    <span class="count-number"><?php if($users){ echo $users;}?></span> 
                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                    </span>
                </div>
                <h3> Active Users</h3>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div id="cardbox2">
            <div class="statistic-box">
                <i class="fa fa-shopping-cart fa-3x"></i>
                <div class="counter-number pull-right">
                    <span class="count-number"><?php if($markets){ echo $markets;}?></span> 
                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                    </span>
                </div>
                <h3>  Active Markets</h3>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div id="cardbox3">
            <div class="statistic-box">
                <i class="fa fa-shopping-basket fa-3x"></i>
                <div class="counter-number pull-right">
                    <span class="count-number"><?php if($products){ echo $products;}?></span> 
                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                    </span>
                </div>
                <h3>  Total Products</h3>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div id="cardbox4">
            <div class="statistic-box">
                <i class="fa fa-shopping-bag fa-3x"></i>
                <div class="counter-number pull-right">
                    <span class="count-number"><?php if($cat){ echo $cat;}?></span> 
                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                    </span>
                </div>
                <h3> Total Product Categories</h3>
            </div>
        </div>
    </div>
</div>