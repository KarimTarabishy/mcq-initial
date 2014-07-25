<body>
<div id="nav-wrapper">
            <span id="nav-left">
                <a id="nav-title" href="">
                    Courses Home
                </a>
            </span>
            <span id="nav-right">

                <a href="javascript:;" id="nav-user"
                   onclick="menuDown(this, event)">
                    <span class="fa fa-user"></span>
                    <span id="user-name" onselect=""><?= $name ?></span>
                    <span class="fa fa-caret-down caret"></span>

                </a>


            </span>
    <div id="menu" class="hidden">

        <a class="menu-item" href="logout">
            <span class="fa fa-power-off"></span>
            Log Out
        </a>
    </div>


</div>

<h1 class="page-header">
    <?= $bread_title ?>
    <small>
        <?= $bread_sub ?>
    </small>
</h1>
