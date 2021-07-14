	<div id="master-topbg" ng-controller="gameHeaderController" class="ng-scope">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="/index">
                    <div id="master-logo" style="background: url(https://habbofont.net/font/habbo_new_big/<?php echo $Holo['name']; ?>.gif) left center no-repeat;"></div>
                </a>
            </div>
            <div class="col-md-6">
                <div class="pull-right">
                    <div style="float:right; margin-top: 10px; padding:10px; text-align: center; background-color: #fff; border-radius: 5px;">
                        <div style="padding: 6px; width: 60px;  line-height: 80%;">
                            <span class="onlineUsersNumber ng-binding"><?php echo Onlines(); ?></span>
                            <small ng-show="usersOnStatus !== 0" class="" style="">
                                <i ng-show="usersOnStatus > 0" style="color:#459b4a" class="fas fa-level-up ng-hide" aria-hidden="true"></i>
                                <i ng-show="usersOnStatus < 0" style="color:#c43c3c" class="fas fa-level-down ng-hide" aria-hidden="true"></i>
                            </small>
                            <br>
                            <small>onlines</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>