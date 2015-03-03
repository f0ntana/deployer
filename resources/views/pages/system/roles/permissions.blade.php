<div style="padding: 20px">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form action="" method="post">
                <ol id='checkboxes'>
                    <li class='expanded'>
                        <input type='checkbox' value='root'/> All

                        <ol>
                            <li><input type='checkbox' value='1'/> One</li>
                            <li>
                                <input type='checkbox' value='2'/> Two
                                <ol>
                                    <li>
                                        <input type='checkbox' value='3'/> Three
                                        <ol>
                                            <li><input type='checkbox' value='4' checked/> Four</li>
                                            <li><input type='checkbox' name='checkboxes' value='5'/> Five</li>
                                        </ol>
                                    </li>
                                </ol>
                            </li>
                            <li><input type='checkbox' name='checkboxes' value='5'/> Duplicate of five</li>
                        </ol>
                    </li>
                </ol>
            </form>
        </div>
    </div>
</div>