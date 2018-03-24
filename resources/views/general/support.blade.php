@extends('general.master')
@section('body')
<div class="knowledge-header-section"></div>
<!-- know header section markup start -->
<div class="know-page-header-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-header-item text-center">
                    <div class="know-icon">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                    <h3>Knowledge Base</h3>
                    <p>A fully fledged Knowledge Base to help users find solutions.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-header-item text-center">
                    <div class="know-icon">
                        <i class="fa fa-comment-o"></i>
                    </div>
                    <h3>Feed Back</h3>
                    <p>A community forum powered by BBPress, perfect for staff to customer interaction</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-header-item text-center">
                    <div class="know-icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <h3>Contact Us</h3>
                    <p>Not found what you needed? Speak to us directly,</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- know header section markup end -->
<!-- knowledge search bar markup start-->
<!-- <div class="know-page-search-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="know-search">
                    <div class="form">
                        <div class="form-search-design">
                            <input type="search" class="search-control" placeholder="search here...............">
                            <button type="button" class="search-btn"><i class="fa fa-search"></i><span>SEARCH</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- knowledge search bar markup end-->
<!-- knowledge main content css start-->
<div class="knowledge-main-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="know-main-condent">
                    <h3>Article Categories</h3>
                    <div class="categories-section">
                        <div class="knowledge-service">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="know-single-item">
                                        <div class="file">
                                            <i class="fa fa-folder"></i>Account Settings <span>3</span>
                                        </div>
                                        <ul class="folder">
                                            <li><i class="fa fa-file-text-o"></i><a href="">How Secure Is My Password?</a></li>
                                            <li><i class="fa fa-file-text-o"></i><a href="">Can I Change My Username?</a></li>
                                            <li><i class="fa fa-file-text-o"></i><a href="">Where Can I Upload My Avatar?</a></li>
                                        </ul>
                                    </div>
                                </div><!-- 
                                <div class="col-md-6">
                                    <div class="know-single-item">
                                        <div class="file">
                                            <i class="fa fa-folder"></i>Api Question <span>(6)</span>
                                        </div>
                                        <ul class="folder">
                                            <li><i class="fa fa-file-text-o"></i>How Secure Is My Password?</li>
                                            <li><i class="fa fa-file-text-o"></i>Can I Change My Username?</li>
                                            <li><i class="fa fa-file-text-o"></i>Where Can I Upload My Avatar?</li>
                                            <li><i class="fa fa-file-text-o"></i>How Do I Change My Timezone?</li>
                                            <li><i class="fa fa-file-text-o"></i>How Do I Change My Password?</li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!-- <div class="knowledge-service">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="know-single-item">
                                        <div class="file">
                                            <i class="fa fa-folder"></i>Billing <span>(6)</span>
                                        </div>
                                        <ul class="folder">
                                            <li><i class="fa fa-file-text-o"></i>How Secure Is My Password?</li>
                                            <li><i class="fa fa-file-text-o"></i>Can I Change My Username?</li>
                                            <li><i class="fa fa-file-text-o"></i>Where Can I Upload My Avatar?</li>
                                            <li><i class="fa fa-file-text-o"></i>How Do I Change My Timezone?</li>
                                            <li><i class="fa fa-file-text-o"></i>How Do I Change My Password?</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="know-single-item">
                                        <div class="file">
                                            <i class="fa fa-folder"></i>Copyright & Legal <span>(6)</span>
                                        </div>
                                        <ul class="folder">
                                            <li><i class="fa fa-file-text-o"></i>How Secure Is My Password?</li>
                                            <li><i class="fa fa-file-text-o"></i>Can I Change My Username?</li>
                                            <li><i class="fa fa-file-text-o"></i>Where Can I Upload My Avatar?</li>
                                            <li><i class="fa fa-file-text-o"></i>How Do I Change My Timezone?</li>
                                            <li><i class="fa fa-file-text-o"></i>How Do I Change My Password?</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- <div class="side-bar">
                    <div class="sidebar-single-item">
                        <div class="side-bar-heading">
                            <h4>Categories</h4>
                        </div>
                        <ul class="folder">
                            <li><i class="fa fa-file-text-o"></i>How Secure Is My Password?</li>
                            <li><i class="fa fa-file-text-o"></i>Can I Change My Username?</li>
                            <li><i class="fa fa-file-text-o"></i>Where Can I Upload My Avatar?</li>
                            <li><i class="fa fa-file-text-o"></i>How Do I Change My Timezone?</li>
                            <li><i class="fa fa-file-text-o"></i>How Do I Change My Password?</li>
                        </ul>
                    </div>
                    
                    <div class="sidebar-single-item">
                        <div class="side-bar-heading">
                            <h4>Popular Articles</h4>
                        </div>
                        <ul class="folder">
                            <li><i class="fa fa-file-text-o"></i>How Secure Is My Password?</li>
                            <li><i class="fa fa-file-text-o"></i>Can I Change My Username?</li>
                            <li><i class="fa fa-file-text-o"></i>Where Can I Upload My Avatar?</li>
                            <li><i class="fa fa-file-text-o"></i>How Do I Change My Timezone?</li>
                            <li><i class="fa fa-file-text-o"></i>How Do I Change My Password?</li>
                        </ul>
                    </div>
                    <div class="sidebar-single-item">
                        <div class="side-bar-heading">
                            <h4>Latest Articles</h4>
                        </div>
                        <ul class="folder">
                            <li><i class="fa fa-file-text-o"></i>How Secure Is My Password?</li>
                            <li><i class="fa fa-file-text-o"></i>Can I Change My Username?</li>
                            <li><i class="fa fa-file-text-o"></i>Where Can I Upload My Avatar?</li>
                            <li><i class="fa fa-file-text-o"></i>How Do I Change My Timezone?</li>
                            <li><i class="fa fa-file-text-o"></i>How Do I Change My Password?</li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- knowledge main content css start-->
<!-- Footer area markup start-->
@endsection