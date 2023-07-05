
<nav id="sidebar" class="sidebar" >
    <ul class="list-unstyled components" >
        <li class="active" style="margin-top: 50px;">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-shopping-cart" aria-hidden="true" style="padding:10px;"></i>Fournisseurs</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="suppliers.php?source=view">Afficher tous les fournisseurs</a>
                </li>
                <li>
                    <a href="suppliers.php?source=add">Ajouter un fournisseur</a>
                </li>
                
            </ul>
        </li>
        <li class="active" style="margin-top: 10px;">
            <a href="#Submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users" aria-hidden="true"  style="padding:10px;"></i>Clients</a>
            <ul class="collapse list-unstyled" id="Submenu">
                <li>
                    <a href="clients.php?source=view">Afficher tous les clients</a>
                </li>
                <li>
                    <a href="clients.php?source=add">Ajouter un Client</a>
                </li>
                
            </ul>
        </li>
        <li class="active" style="margin-top: 10px;">
            <a href="#home" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cubes" aria-hidden="true" style="padding:10px;"></i>Stock</a>
            <ul class="collapse list-unstyled" id="home">
                <li>
                    <a href="stock.php?source=view">Afficher tous les produits</a>
                </li>
                <li>
                    <a href="stock.php?source=add">Ajouter un produit</a>
                </li>
                
            </ul>
        </li>
        <li class="active" style="margin-top: 10px;">
            <a href="#hoenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-usd" aria-hidden="true" style="padding-left:10px;"></i><i class="fa fa-usd" aria-hidden="true" style="padding-right:10px;"></i>Factures</a>
            <ul class="collapse list-unstyled" id="hoenu">
                <li>
                    <a href="facture.php?source=view">Afficher toutes les factures</a>
                </li>
                <li>
                    <a href="facture.php?source=add">Ajouter une facture</a>
                </li>
                
            </ul>
        </li>
        <li class="active" style="margin-top: 10px;">
            <a href="#h" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-shopping-cart" aria-hidden="true" style="padding:10px;"></i>Devis</a>
            <ul class="collapse list-unstyled" id="h">
                <li>
                    <a href="devis.php?source=view">Afficher tous les devis</a>
                </li>
                <li>
                    <a href="devis.php?source=add">Ajouter un devis</a>
                </li>
                
            </ul>
        </li>
        
        
    </ul>

    
</nav>

<!-- 
<div id="layoutSidenav_nav" >
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                



                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsFournisseurs" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                    Fournisseurs
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayoutsFournisseurs" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="suppliers.php?source=view">Afficher tous les fournisseurs</a>
                        <a class="nav-link" href="suppliers.php?source=add">Ajouter un fournisseur</a>
                    </nav>
                </div>



                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsClients" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                    Clients
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayoutsClients" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Static Navigation</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                    </nav>
                </div>





                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsStocks" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa fa-cubes" aria-hidden="true"></i></div>
                    Stocks
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayoutsStocks" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Static Navigation</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                    </nav>
                </div>





     
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Fournisseurs
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Static Navigation</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                    </nav>
                </div>





        
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php //echo $user_lastname . " " . $user_firstname?>
        </div>
    </nav>
</div> -->