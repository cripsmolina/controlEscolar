<?php
require("header.php");
?>


<div class="container theme-showcase" role="main">





<div class="page-header">
    <h1>Buttons</h1>
</div>
<p>
    <button type="button" class="btn btn-lg btn-default">Default</button>
    <button type="button" class="btn btn-lg btn-primary">Primary</button>
    <button type="button" class="btn btn-lg btn-success">Success</button>
    <button type="button" class="btn btn-lg btn-info">Info</button>
    <button type="button" class="btn btn-lg btn-warning">Warning</button>
    <button type="button" class="btn btn-lg btn-danger">Danger</button>
    <button type="button" class="btn btn-lg btn-link">Link</button>
</p>
<p>
    <button type="button" class="btn btn-default">Default</button>
    <button type="button" class="btn btn-primary">Primary</button>
    <button type="button" class="btn btn-success">Success</button>
    <button type="button" class="btn btn-info">Info</button>
    <button type="button" class="btn btn-warning">Warning</button>
    <button type="button" class="btn btn-danger">Danger</button>
    <button type="button" class="btn btn-link">Link</button>
</p>
<p>
    <button type="button" class="btn btn-sm btn-default">Default</button>
    <button type="button" class="btn btn-sm btn-primary">Primary</button
    <button type="button" class="btn btn-sm btn-success">Success</button>
    <button type="button" class="btn btn-sm btn-info">Info</button>
    <button type="button" class="btn btn-sm btn-warning">Warning</button>
    <button type="button" class="btn btn-sm btn-danger">Danger</button>
    <button type="button" class="btn btn-sm btn-link">Link</button>
</p>
<p>
    <button type="button" class="btn btn-xs btn-default">Default</button>
    <button type="button" class="btn btn-xs btn-primary">Primary</button>
    <button type="button" class="btn btn-xs btn-success">Success</button>
    <button type="button" class="btn btn-xs btn-info">Info</button>
    <button type="button" class="btn btn-xs btn-warning">Warning</button>
    <button type="button" class="btn btn-xs btn-danger">Danger</button>
    <button type="button" class="btn btn-xs btn-link">Link</button>
</p>



<div class="page-header">
    <h1>Tables</h1>
</div>
<div class="row">

    <div class="col-md-6">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>




<div class="page-header">
    <h1>Carousel</h1>
</div>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img data-src="holder.js/1140x500/auto/#777:#555/text:First slide" alt="First slide">
        </div>
        <div class="item">
            <img data-src="holder.js/1140x500/auto/#666:#444/text:Second slide" alt="Second slide">
        </div>
        <div class="item">
            <img data-src="holder.js/1140x500/auto/#555:#333/text:Third slide" alt="Third slide">
        </div>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>


</div> <!-- /container -->


<?php
require("footer.php");
?>
