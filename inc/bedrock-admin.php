<?php
    // Social Settings Admin Page
    function bedrock_admin() {
?>

    <div id="bedrock-janet">

    <div class="row">
        <div class="col">
            <h1>Content Management</h1>

            <p>
                Intro blurb
            </p>
        </div>
    </div>

        <div class="row">
            <div >
                <h2>Time to get Rolling</h2>


                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        View Development Guide
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-block">
                      <pre>
                          Nothing to Show
                      </pre>
                    </div>
                </div>

            </div>
            <div>
                <h2>Style Guides and Content Size</h2>
                <p>
                    Want to add some new content to your site, but don't know the best size?
                </p>
                <p>
                    Want somw new graphics. No problem... Get in touch >>
                </p>


                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td colspan="2">
                            <span class="text-center"><strong>Homepage Hero Image Slides</strong></span>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            Location
                        </td>
                        <td>
                            Size (px)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Slider: Mobile
                        </td>
                        <td>
                            760 by 420px
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Slider: Tablet
                        </td>
                        <td>
                            950 by 260px
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Slider: Desktop
                        </td>
                        <td>
                            1920 by 400px
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>



            <div class="row">
                <div class="col">
                    <h2>Support</h2>
                    <p>Having Problems with your site?</p>
                    <p>No problem... let us know and we'll get you on your way again.</p>
                </div>
            </div>

        </div>
    </div>

    <?php
}
